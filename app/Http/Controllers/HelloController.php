<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HelloController extends Controller
{
  
  //ルーティングはroutes/web.phpに記載されている
  public function index()
  {
    //hello変数に文字'Hello,World!'をセット
    $hello = 'Hello,World!';
    
    //hello_array変数に'Hello', 'こんにちは', 'ニーハオ'をセット
    $hello_array = ['Hello', 'こんにちは', 'ニーハオ'];

    
    //return view('index', ....
    //  →resources/views/index.blade.phpがオープンする
    
    // compact('hello', 'hello_array'));
    //Viewへhello変数、hello_array変数の情報を渡す
    return view('index', compact('hello', 'hello_array'));
        
        
  }
  
  //
  public function regist(Request $request)
  {
    $hello = '***********';
    $hello_array = ['Hello', 'こんにちは', 'ニーハオ'];
    
    //$request->message Viewからpostされたmessage変数を使用している
    $hello =$request->message;

    return view('index', compact('hello', 'hello_array'));
    
    
  }
}
