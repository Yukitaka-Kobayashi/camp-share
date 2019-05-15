<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class IotController extends Controller
{
  
    //ルーティングはroutes/web.phpに記載されている
  public function index()
  {
   
//         // 送信データ
//         $data = array(
//         "value1" => 1,
//         "value2" => 2,
//         "valuestr" => "XXXtype"
//         );
        
//         // JSON形式に変換
//         $data = json_encode($data);
        
//         // ストリームコンテキストのオプションを作成
//         $options = array(
//         // HTTPコンテキストオプションをセット
//         'http' => array(
//         'method'=> 'POST',
//         'header'=> 'Content-type: application/json; charset=UTF-8', //JSON形式で表示
//         'content' => $data
//         )
//         );
        
//         // ストリームコンテキストの作成
//         $context = stream_context_create($options);
        
//         // POST送信先URL（WebAPIのアドレス）
//         $url = 'http://localhost:8080/api/owners';
        
//         // POST送信
//         $raw_data = file_get_contents($url, false, $context);
   
//   //---------------------------------------------------
   
   
   //iotdata
  $iotDataItems = DB::table('t_iotdata')
    ->orderBy('insert_id', 'desc')
    ->take(60)
    ->get();
        
    return view('iot')->with( ['iotDataItems' => $iotDataItems]);
        
  }
}
