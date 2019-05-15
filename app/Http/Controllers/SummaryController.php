<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SummaryController extends Controller
{
  
  //ルーティングはroutes/web.phpに記載されている
  public function index()
  {
   
   
   //直近の投稿データを取得
   $dataLostitems = DB::table('t_lostitem')
        ->join('m_combobox', 't_lostitem.category_id', '=', 'm_combobox.category_id')
        ->select('t_lostitem.*', 'm_combobox.dispname')
        ->orderBy('t_lostitem.insertnum', 'desc')
        ->take(10)
        ->get();
            
   //忘れ物ランキングトップ10取得
      $dataLostitemRank = DB::table('t_lostitem')
        ->select(DB::raw('count(*)as count, t_lostitem.itemname'))
        ->groupBy('t_lostitem.itemname')
        ->orderBy('count', 'desc')
        ->take(10)
        ->get();
        
   
    //カテゴリ別の集計データを取得
$dataLostitemSummary = DB::select("select m_combobox.dispname,a.count from m_combobox left join (select category_id,count(*) as count from t_lostitem group by category_id) as a on m_combobox.category_id=a.category_id order by a.count desc;");
    //   $dataLostitemSummary = DB::table('m_combobox')
    //     ->leftjoin('t_lostitem', 't_lostitem.category_id', '=', 'm_combobox.category_id')
    //     ->select(DB::raw('count(*)as count, m_combobox.dispname'))
    //     ->groupBy('m_combobox.category_id')
    //     ->orderBy('count', 'desc')
    //     ->get();
    
    
    
//          $dataLostitemSummary = DB::table('t_lostitem')
//        ->join('m_combobox', 't_lostitem.category_id', '=', 'm_combobox.category_id')
//        ->select(DB::raw('count(*)as count, m_combobox.dispname'))
//        ->groupBy('t_lostitem.category_id')
//        ->orderBy('count', 'desc')
//        ->get();
        
   
    return view('summary')->with( ['dataLostitems' => $dataLostitems,
    'dataLostitemSummary' => $dataLostitemSummary,
    'dataLostitemRank' => $dataLostitemRank]);
        
        
  }
  
}
