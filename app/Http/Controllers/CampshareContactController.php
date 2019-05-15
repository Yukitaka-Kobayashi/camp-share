<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;
use App\Mail\SampleNotification;
use Illuminate\Support\Facades\Mail;

class CampshareContactController extends Controller
{
  //Getアクセスの場合の処理
  public function getIndex()
  {
    //errorなし
    $error = array();
    
    //引継ぎ項目なし
      $subItems = array(
        'nickName' => '',
        'detail' => '',
        'email' => ''
        );
    
    // contact画面を返す
    //return view('campsharecontact')->with(['error' => $error, 'subItems' => $subItems ]);
    return view('campsharecontact2')->with(['error' => $error, 'subItems' => $subItems ]);
  }
  
  //Postアクセスの場合の処理
  public function postIndex()
  {

    //変数の初期化
    $page_flag = 0;
    $error = array();
    
    $a_nickName = Request::input('nickName');
    $a_email = Request::input('email');
    $a_detail =  Request::input('detail');
    
    // サニタイズ(HTML+SQL)
    $a_nickName = htmlspecialchars($a_nickName, ENT_QUOTES);
    $a_email = htmlspecialchars($a_email, ENT_QUOTES);
    $a_detail = htmlspecialchars($a_detail, ENT_QUOTES);
    

    //未入力チェック：忘れ物
    $error = array();
  	// バリデーション
  	if( empty($a_nickName) ) {
  		$error[] = "お名前を入力して下さい。";
	  }
	    	 	
  	if( empty($a_email) ) {
  		$error[] = "メールアドレスを入力して下さい。";
	  }

  	if( empty($a_detail) ) {
  		$error[] = "お問い合わせ内容を入力して下さい。";
	  }

    // Error有無判定
  	if( empty($error) ) {
		  $page_flag = 1;
  	}

    // PageFlg次第で振り分け
    if($page_flag === 1){
      
      //メールを送信
      $title = '【薪シェア】お問い合わせ通知';
      $text = 'お名前：' .$a_nickName. "\n". 'E-mail：' .$a_email. "\n". 'お問い合わせ内容：' .$a_detail;
      $to = 'y.kobayashi.recruit@gmail.com';
      $link = '';
      Mail::to($to)->send(new SampleNotification($title, $text, $link));
      
      $msg = 'お問い合わせを正常に受付けました。';
      
      return view('campshareentryconf2')->with(['msg' => $msg]);

    }else{
      // 投稿前の内容を引き継ぎ
      $subItems = array(
      'detail' => $a_detail,
      'nickName' => $a_nickName,
      'email' => $a_email);

    // contact画面を返す
    //return view('campsharecontact')->with(['error' => $error, 'subItems' => $subItems ]);
    return view('campsharecontact2')->with(['error' => $error, 'subItems' => $subItems ]);
    }
  }
}

