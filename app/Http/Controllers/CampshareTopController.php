<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\VwArticleList;

class CampshareTopController extends Controller
{
  //Getアクセスの場合の処理
  //エリア指定がない場合、デフォルトはallで表示する
  public function getIndex(Request $request)
  {
    $erea = $request->input('erea');
    if(empty($erea)){
      $erea = 'all';
    }
    
    //検索結果の一括表示件数：10件
    $perPage = 10;

    //最新記事の取得件数：100件
    $record_limit = 100;
  
    //クエリ作成
    $query = VwArticleList::query();
    $query->orderBy('subNo', 'desc');
    
      if ($erea != "all") {
        // 県名が一致するもののみ抽出
        $query->where('prefName_en', $erea);
      } else {
        //件名の指定が無い場合、取得上限を設定
        $query->limit($record_limit);
      }
      
      //取得した件数
      $count = $query->count();
      
      //ページネーション
      $post = $query->paginate($perPage);

      // 2019-05-14 詳細検索機能追加対応 -- START -- 
      // DBから県都道府県を取得
        $prefs = DB::table('mst_pref')
          ->orderBy('fukenCD', 'asc')
          ->get();
  
      // DBからキャンプ場情報を取得
        $sites = DB::table('mst_campsite')
          ->orderBy('campSiteID', 'asc')
          ->get();
  
      // 2019-05-14 詳細検索機能追加対応 -- END -- 


      // errorなし
      $error = array();

      // 画面を返す
      return view('campsharetop2')->with(['posts' => $post, 'error' => $error, 'erea' => $erea, 'prefs' => $prefs, 'sites' => $sites, 'count' => $count ]);

  }
}
