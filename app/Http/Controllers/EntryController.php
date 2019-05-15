<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
require "SummaryController.php";

class EntryController extends Controller
{
  //ルーティングはroutes/web.phpに記載されている
  
  //Getアクセスの場合の処理
  public function getIndex()
  {
    // DBからカテゴリを取得
      $dataCate = DB::table('m_combobox')
        ->orderBy('dispnum', 'asc')
        ->get();
    //errorなし
    $error = array();
    
    // entry画面を返す
    return view('entry')->with(['dataCate' => $dataCate, 'error' => $error ]);
  }
  
  //Postアクセスの場合の処理
  public function postIndex(Request $request)
  {

    //変数の初期化
    $page_flag = 0;
    $error = array();
    
      // Postデータを受け取ってDBにInsert
    $l_insnum = DB::table('t_lostitem')
        ->max('insertnum');
    $l_insnum = $l_insnum + 1;
    

    // サニタイズ(HTML+SQL)
    $l_what = htmlspecialchars($request->lost_what, ENT_QUOTES);
    //$l_what = mysqli_escape_string($l_what);
    $l_where = htmlspecialchars($request->lost_where, ENT_QUOTES);
    $l_cate = $request->lost_cate;

    //未入力チェック：忘れ物
    $error = array();
    	// バリデーション
    	if( empty($l_what) ) {
    		$error[] = "早速忘れ物の入力を忘れています..";
  	  }

  	if( empty($error) ) {
		  $page_flag = 1;
  	}

    $l_cate_n = DB::table('m_combobox')
        ->where('dispname', $l_cate)
        ->value('category_id');
    
    // Summary画面を返す
    // return view('/summary');

    // PageFlg次第で振り分け
    if($page_flag === 1){
      //DB Insert
      DB::table('t_lostitem')->insert(
      ['insertnum' => $l_insnum,
      'insertdate' => Now(),
      'itemname' => $l_what,
      'location' => $l_where,
      'dispflg' => True,
      'category_id' => $l_cate_n
      ]
      );
      
      
      //忘れ物表示画面のコントローラーを呼ぶ
      return redirect()->action('SummaryController@index');
      //以下は不要であるヤマグチ→ゆっきーへ
      
      
     //最終手段(全貼り付け)
     //直近の投稿データを取得
     $dataLostitems = DB::table('t_lostitem')
          ->join('m_combobox', 't_lostitem.category_id', '=', 'm_combobox.category_id')
          ->select('t_lostitem.*', 'm_combobox.dispname')
          ->orderBy('t_lostitem.insertnum', 'desc')
          ->take(10)
          ->get();
              
      }
    else{
       // DBからカテゴリを取得
      $dataCate = DB::table('m_combobox')
        ->orderBy('dispnum', 'asc')
        ->get();

      // errorを渡してentry画面を返す
      return view('entry')->with( ['dataCate' => $dataCate, 'error' => $error]);
    }
  }
}

