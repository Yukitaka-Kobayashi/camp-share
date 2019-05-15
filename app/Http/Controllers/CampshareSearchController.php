<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\VwArticleList;
use Carbon\Carbon;

class CampshareSearchController extends Controller
{
  //Getアクセスの処理
  //リクエストから項目を取り出す
  public function getIndex(Request $request)
  {
    //検索結果の一括表示件数：10件
    $perPage = 10;
    $pagenate_params = array(); /* パラメータ追加用 */
  
    //クエリ作成
    $query = VwArticleList::query();
    $query->orderBy('subNo', 'desc');

    //検索処理：状況
    if (isset($_GET['status']) && is_array($_GET['status'])) {

      //適切な入力がある場合のみ処理を行う
      $status = $_GET['status'];
      $pagenate_params['status'] =  $status;

      //検索用配列作成
      $conditions = array();
      
      foreach($status as $state){
        if (isset($state)) {
          $conditions[] = $state;
        }
      }
      
      //配列に含まれるアイテム名で抽出
      $query->whereIn('status', $conditions);
    }
    
    //検索処理：種別
    if (isset($_GET['subType'])) {

      //適切な入力がある場合のみ処理を行う
      $subType = $_GET['subType'];
      $pagenate_params['subType'] =  $subType;


      //単純にsubTypeで抽出
      $query->where('subType', $subType);
    }
    
    //検索処理：FROM日付、TO日付
    if (isset($_GET['fromDate']) && !empty($_GET['fromDate'])) {

      //適切な入力がある場合のみ処理を行う
      $fromDate = $_GET['fromDate'];
      $pagenate_params['fromDate'] =  $fromDate;
      $fromDate = new Carbon($fromDate);
      $fromDate = $fromDate -> format('Y/m/d');

      //From日付で抽出
      $query->where('eventDate', '>=', $fromDate);
    }
    
    if (isset($_GET['toDate']) && !empty($_GET['toDate'])) {

      //適切な入力がある場合のみ処理を行う
      $toDate = $_GET['toDate'];
      $pagenate_params['toDate'] =  $toDate;
      $toDate = new Carbon($toDate);
      $toDate = $toDate -> format('Y/m/d');

      //To日付で抽出
      $query->where('eventDate', '<=', $toDate);
    }

    //検索処理：地域 (*直接県名をとれないため、mstから持ってくる)
    if (isset($_GET['fukenCD'] ) && !empty($_GET['fukenCD'])) {

      //適切な入力がある場合のみ処理を行う
      $fukenCD = $_GET['fukenCD'];

      //府県CDを持ちまわる
      $pagenate_params['fukenCD'] =  $fukenCD;
      
      // DBから県都道府県を取得
      $prefName = DB::table('mst_pref')
        ->where('fukenCD', $fukenCD)
        ->value('prefName');

      //単純に県名で抽出
      $query->where('prefName', $prefName);
    }

    //検索処理：キャンプ場
    if (isset($_GET['siteName']) && !empty($_GET['siteName'])) {

      //適切な入力がある場合のみ処理を行う
      $siteName = $_GET['siteName'];
      $pagenate_params['siteName'] =  $siteName;

      //単純にsiteNameで抽出
      $query->where('siteName', $siteName);
    }

    //検索処理：アイテム
    if (isset($_GET['itemName']) && is_array($_GET['itemName'])) {

      //適切な入力がある場合のみ処理を行う
      $itemName = $_GET['itemName'];
      $pagenate_params['itemName'] =  $itemName;

      //検索用配列作成
      $conditions = array();
      
      foreach($itemName as $item){
        if (isset($item)) {
          $conditions[] = $item;
        }
      }
      
      //配列に含まれるアイテム名で抽出
      $query->whereIn('itemName', $conditions);
    }
    
      //取得した件数
      $count = $query->count();
      
      //ページネーション
      $post = $query->paginate($perPage);

      // DBから県都道府県を取得
        $prefs = DB::table('mst_pref')
          ->orderBy('fukenCD', 'asc')
          ->get();
  
      // DBからキャンプ場情報を取得
        $sites = DB::table('mst_campsite')
          ->orderBy('campSiteID', 'asc')
          ->get();

      // errorなし
      $error = array();
  
      // 画面を返す
      return view('campsharesearch')->with(['posts' => $post, 'pagenate_params' => $pagenate_params, 'error' => $error, 'prefs' => $prefs, 'sites' => $sites, 'count' => $count ]);

  }
}