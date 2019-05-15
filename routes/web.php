<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\Request;
Route::get('/', function () {
    return view('welcome');
});

//********************************************************
//サンプルページへのアクセス
//http://ホスト名/index  が入力されたとき、app/Http/HelloControllerのindex関数がコールされる
Route::get('/index', 'HelloController@index');

//index/registへPOSTされたとき、app/Http/HelloControllerのregist関数がコールされる
Route::post('index/regist', 'HelloController@regist');

//********************************************************

Route::get('/summary', 'SummaryController@index');
Route::post('/entry', 'EntryController@postIndex');
Route::get('/entry', 'EntryController@getIndex');

Route::get('/contribute', 'ContributeController@getIndex');




//薪シェア
//Top
Route::get('campsharetop/{erea?}', 'CampshareTopController@getIndex');
//投稿画面
Route::get('campshareentry', 'CampshareEntryController@getIndex');
Route::post('campshareentry', 'CampshareEntryController@postIndex');

//薪シェアとは
Route::get('campsharewhat', 'CampshareEntryController@whatmakishare');

//詳細
Route::get('/campsharedetail', 'CampshareDetailController@getIndex');
Route::post('/campsharedetail/add','CampshareDetailController@postIndex');//コメント追加時のpost
Route::get('/campsharedl', 'CampshareDetailController@getfile');

//お問い合わせ(Contact)画面
Route::get('campsharecontact', 'CampshareContactController@getIndex');
Route::post('campsharecontact', 'CampshareContactController@postIndex');

//詳細検索画面
Route::get('campsharesearch', 'CampshareSearchController@getIndex');


//＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊山口テスト用＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊
//IOT用テストページ（山口）
//Route::get('/iot', 'IotController@index');

//mailテスト
// 送信メール本文のプレビュー
Route::get('sample/mailable/preview', function () {
  return new App\Mail\SampleNotification();
});
Route::get('sample/mailable/send', 'MailSampleController@SampleNotification');

Route::get('laravel-version', function()
{
$laravel = app();
return "Your Laravel version is ".$laravel::VERSION;
});
//＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊＊
