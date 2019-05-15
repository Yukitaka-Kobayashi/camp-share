<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;
use Abraham\TwitterOAuth\TwitterOAuth;

class CampshareEntryController extends Controller
{
  //Getアクセスの場合の処理
  public function getIndex()
  {
    // DBから県都道府県を取得
      $prefs = DB::table('mst_pref')
        ->orderBy('fukenCD', 'asc')
        ->get();

    // DBからアイテム名を取得
      $items = DB::table('mst_item')
        ->orderBy('itemID', 'asc')
        ->get();

    // DBからキャンプ場情報を取得
      $sites = DB::table('mst_campsite')
        ->orderBy('campSiteID', 'asc')
        ->get();

    //errorなし
    $error = array();
    
    //引継ぎ項目なし
      $subItems = array(
        'eventDate' => NULL,
        'subType' => NULL,
        'itemID' => NULL,
        'title' => '',
        'nickName' => '',
        'detail' => '',
        'email' => '',
        'campSiteID' => NULL,
        'fukenCD' => NULL);
    
    // entry画面を返す
    //return view('campshareentry')->with(['prefs' => $prefs, 'items' => $items, 'sites' => $sites, 'error' => $error, 'subItems' => $subItems ]);
    return view('campshareentry2')->with(['prefs' => $prefs, 'items' => $items, 'sites' => $sites, 'error' => $error, 'subItems' => $subItems ]);
  }
  
  //Postアクセスの場合の処理
  public function postIndex()
  {

    //変数の初期化
    $page_flag = 0;
    $error = array();
    
    // Postデータを受け取ってDBにInsert
    // IDの取得
    $a_subNo = DB::table('tbl_article')
        ->max('subNo');
    $a_subNo = $a_subNo + 1;
    

    // サニタイズ(HTML+SQL)
    $a_eventDate = Request::input('eventDate');
    $a_subType = Request::input('subType');
    $a_fukenCD = Request::input('fukenCD');
    $a_campSiteID = Request::input('campSiteID');
    $a_itemID = Request::input('itemID');
    $a_nickName = htmlspecialchars(Request::input('nickName'), ENT_QUOTES);
    $a_email = htmlspecialchars(Request::input('email'), ENT_QUOTES);
    $a_title = htmlspecialchars(Request::input('title'), ENT_QUOTES);
    $a_detail = htmlspecialchars(Request::input('detail'), ENT_QUOTES);
    

    //未入力チェック：忘れ物
    $error = array();
  	// バリデーション
  	if( empty($a_eventDate) ) {
  		$error[] = "無効な日付です。";
  	} else {
    	$ymd = explode('-', $a_eventDate);
    	if( checkdate($ymd[1], $ymd[2], $ymd[0]) === FALSE ) {
    		$error[] = "無効な日付です。";
    	}
  	}
	  
  	if( empty($a_subType) ) {
  		$error[] = "種別を選択して下さい。";
	  }

  	if( empty($a_fukenCD) ) {
  		$error[] = "地域を選択して下さい。";
	  }

  	if( empty($a_campSiteID) ) {
  		$error[] = "キャンプ場を選択して下さい。";
	  }
	  
  	if( empty($a_nickName) ) {
  		$error[] = "名前を入力して下さい。";
	  }
	    	 	
  	if( empty($a_title) ) {
  		$error[] = "件名を入力して下さい。";
	  }

    // Error有無判定
  	if( empty($error) ) {
		  $page_flag = 1;
  	}

    // PageFlg次第で振り分け
    if($page_flag === 1){
      //DB Insert
      DB::table('tbl_article')->insert(
      ['subNo' => $a_subNo,
      'eventDate' => $a_eventDate,
      'subType' => $a_subType,
      'itemID' => $a_itemID,
      'title' => $a_title,
      'detail' => $a_detail,
      'nickName' => $a_nickName,
      'email' => $a_email,
      'campSiteID' => $a_campSiteID,
      'fukenCD' => $a_fukenCD,
      'insertDate' => now()
      ]
      );
      
      // 投稿成功 Twitter投稿⇒成功画面表示
      
      // Twitter投稿用に名称取得
      $d_siteName = DB::table('mst_campsite')
                      ->where('campSiteID', $a_campSiteID)
                      ->value('siteName');
      $d_itemName = DB::table('mst_item')
                      ->where('itemID', $a_itemID)
                      ->value('itemName');

      if($a_subType == 1){
        $d_subtype = '欲しい';
      } else {
        $d_subtype = 'あげる';
      }
      
      $twitter_config = config('twitter');
      
      $twitter = new TwitterOAuth(
            $twitter_config["api_key"], 
            $twitter_config["secret_key"], 
            $twitter_config["access_token"], 
            $twitter_config["token_secret"]
            );
            
            $tw_result = $twitter->post("statuses/update", [
            "status" =>
                '新しい記事が投稿されました!' . PHP_EOL .
                '種別：' . $d_subtype . PHP_EOL .
                'アイテム：' . $d_itemName . PHP_EOL .
                '#キャンプ #薪シェア #' . $d_siteName  . PHP_EOL .
                '(URLを表示)'
            ]);
      
      $msg = '投稿が正常に完了しました。';
      
      //return view('campshareentryconf')->with(['msg' => $msg ]);
      return view('campshareentryconf2')->with(['msg' => $msg ]);
      }
    else{
      // DBから県都道府県を取得
        $prefs = DB::table('mst_pref')
          ->orderBy('fukenCD', 'asc')
          ->get();
  
      // DBからアイテム名を取得
        $items = DB::table('mst_item')
          ->orderBy('itemID', 'asc')
          ->get();
  
      // DBからキャンプ場情報を取得
        $sites = DB::table('mst_campsite')
          ->orderBy('campSiteID', 'asc')
          ->get();
          
      // 投稿前の内容を引き継ぎ
      $subItems = array(
      'eventDate' => $a_eventDate,
      'subType' => $a_subType,
      'itemID' => $a_itemID,
      'title' => $a_title,
      'detail' => $a_detail,
      'nickName' => $a_nickName,
      'email' => $a_email,
      'campSiteID' => $a_campSiteID,
      'fukenCD' => $a_fukenCD);

      // entry画面を返す
      //return view('campshareentry')->with(['prefs' => $prefs, 'items' => $items, 'sites' => $sites, 'error' => $error, 'subItems' => $subItems ]);
      return view('campshareentry2')->with(['prefs' => $prefs, 'items' => $items, 'sites' => $sites, 'error' => $error, 'subItems' => $subItems ]);
    }
  }
  
  //Getアクセスの場合の処理
  public function whatmakishare()
  {
    // // DBから県都道府県を取得
    //   $prefs = DB::table('mst_pref')
    //     ->orderBy('fukenCD', 'asc')
    //     ->get();

    // // DBからアイテム名を取得
    //   $items = DB::table('mst_item')
    //     ->orderBy('itemID', 'asc')
    //     ->get();

    // // DBからキャンプ場情報を取得
    //   $sites = DB::table('mst_campsite')
    //     ->orderBy('campSiteID', 'asc')
    //     ->get();

    // //errorなし
    // $error = array();
    
    // //引継ぎ項目なし
    //   $subItems = array(
    //     'eventDate' => NULL,
    //     'subType' => NULL,
    //     'itemID' => NULL,
    //     'title' => '',
    //     'nickName' => '',
    //     'detail' => '',
    //     'email' => '',
    //     'campSiteID' => NULL,
    //     'fukenCD' => NULL);
    
    // entry画面を返す
    //return view('campsharewhat');
    return view('campsharewhat2');
  }
}

