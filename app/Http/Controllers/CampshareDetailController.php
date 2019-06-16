<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
//use Illuminate\Http\Request;
use Illuminate\Http\Request; //修正

use App\Http\Controllers\Controller;
//use Request;
use App\Mail\SampleNotification;
use Illuminate\Support\Facades\Mail;
use App\VwArticleList;
use Illuminate\Support\Facades\Storage;
use Validator;

class CampshareDetailController extends Controller
{
  //ルーティングはroutes/web.phpに記載されている
  
  //Getアクセスの場合の処理
  public function getIndex(Request $request)
  {
      $subNo = $request->subNo;
      if(empty($subNo)){
        // 無効なアクセスの場合Topへ返す
        return view('campsharetop');
      }
    
      //投稿データ取得
      //2019.05.09 yk:テーブル⇒ビューへ取得元を変更
      $data = VwArticleList::where('subNo', $subNo)->get();


      //コメントデータ取得
      $data_comment = DB::connection('maki_share')->table('trn_comment')
      ->where('subNo', $subNo)
      ->orderBy('subBr','asc')
      ->get();
      
      
      
    // entry画面を返す
    //return view('campsharedetail')->with(['data' => $data[0] ,'data_comment' => $data_comment]);
    return view('campsharedetail2')->with(['data' => $data[0] ,'data_comment' => $data_comment]);
  }
  
  //Postアクセスの場合の処理
  public function postIndex(Request $request)
  {
    $filename = "";
    if(isset($request->image_url))
    {
      // バリデーションルール
      $rules = [
          'image_url' => 'image|max:6000',
          'nickName' => 'required|max:20',
          'comment' => 'required|max:300',
      ];
      // バリデーターにルールとインプットを入れる
      $validation = Validator::make($request->all(), $rules);

      // バリデーションチェックを行う
      if ($validation->fails()) {
             return back()->withErrors($validation)->withInput();
          // return back()->with('message', '戻りました！');
      }
      $date = date( "Ymd" );
      $directory_path_full = storage_path()."/app/public/makishare/".$date."/";
      $directory_path_short = "public/makishare/".$date."/";
      
      //フォルダを作成する
      //「$directory_path」で指定されたディレクトリが存在するか確認
      if(file_exists($directory_path_full)){
          //存在したときの処理
          echo "作成しようとしたディレクトリは既に存在します";
      }else{
          //存在しないときの処理（「$directory_path」で指定されたディレクトリを作成する）
          if(mkdir($directory_path_full, 0777)){
              //作成したディレクトリのパーミッションを確実に変更
              chmod($directory_path_full, 0777);
              //作成に成功した時の処理
              echo "作成に成功しました";
          }else{
              //作成に失敗した時の処理
              echo "作成に失敗しました";
          }
      }
      //ファイルを保存する
      $filename = $request->image_url->store($directory_path_short);
    }
    
    $comment = $request->comment;
    $subNo = $request->subNo;
    $nickName =  $request->nickName;

    //コメント保存テーブルを検索し、枝番を生成
    $data = DB::connection('maki_share')->table('trn_comment')
    ->where('subNo', $subNo)
    ->orderBy('subBr', 'desc')
    ->first();
    
    $subBr = 1;
    
    if(count($data) > 0)
    {
        $subBr=$data->subBr + 1;
    }
    
    //コメントテーブルにデータ挿入
    DB::connection('maki_share')->table('trn_comment')->insert(
    ['subNo' => $subNo,
    'subBr' => $subBr,
    'comDate' => Now(),
    'nickName' => $nickName,
    'comment' => $comment,
    'subDate' => Now(),
    'filefullpath' => $filename,
    ]
    );

    //メール送信
    //---------------------------------------------------------------
    // 2019.04.25 shikanuki
    // 恐らくSMTPサーバの指定が不足している。
    // 参考：https://qiita.com/tsunet111/items/0ba0e8fc61882c3905c0
    //---------------------------------------------------------------
      $data = DB::connection('maki_share')->table('tbl_article')->where('subNo', $subNo)
      ->join('mst_campsite', 'tbl_article.campSiteID', '=', 'mst_campsite.campSiteID')
      ->join('mst_item', 'tbl_article.itemID', '=', 'mst_item.itemID')
      ->join('mst_pref', 'tbl_article.fukenCD', '=', 'mst_pref.fukenCD')
      ->get();
      
      $data[0]->email;
    $title = '【薪シェア】コメントが付きました';
    $text = $data[0]->nickName."さんが投稿した内容にコメントが付きました";
    //$to = 'jvnts0630@gmail.com';
    $to = $data[0]->email;
    
    $link = $request->root()."/campsharedetail/".$subNo;
    Mail::to($to)->send(new SampleNotification($title, $text,$link));
    
    return redirect('/campsharedetail?subNo='.$subNo);
  }
  
  public function getfile(Request $request)
  {
    $subNo = $request->subNo;
    $subBr = $request->subBr;
    
    if(isset($subNo) && isset($subBr)){
    
      $data = DB::connection('maki_share')->table('trn_comment')
      ->where('subNo', $subNo)
      ->where('subBr', $subBr)
      ->first();
      
      if(isset($data)){
        // ストレージの中なら直接ダウンロードできる
        
        //$headers = ['Content-Type' => 'image/png'];
        // $dlFilename = $subNo."_".$subBr.".png";
        // return Storage::download($data->filefullpath,$dlFilename , $headers);
        
        $ext = pathinfo($data->filefullpath, PATHINFO_EXTENSION);
        $dlFilename = $subNo."_".$subBr.".".$ext;
        // $dlFilename = $data->nickName."_".$subNo."_".$subBr.".".$ext;
        return Storage::download($data->filefullpath, $dlFilename);
      }
    }
  }
  
}

      //投稿データ取得(BK)
      //$data = DB::connection('maki_share')->table('tbl_article')->where('subNo', $subNo)
      //->join('mst_campsite', 'tbl_article.campSiteID', '=', 'mst_campsite.campSiteID')
      //->join('mst_item', 'tbl_article.itemID', '=', 'mst_item.itemID')
      //->join('mst_pref', 'tbl_article.fukenCD', '=', 'mst_pref.fukenCD')
      //  ->get();
      
      //if($data[0]->subType == 1)
      //{
      //  $data[0]->subType = "欲しい";
      //}
      //else
      //{
      //  $data[0]->subType = "あげる";  
      //}

      //return view('campsharedetail')->with(['data' => $data[0] ,'data_comment' => $data_comment]);
