@extends('campsharecommon')
 
@section('title', '薪シェアとは？')
@section('pageCss')
<!-- 追加CSSなし -->
@endsection
 
@include('campsharehead')
 
@include('campshareheader')
 
@section('content')
	<main>
	<h1>薪シェアとは</h1>
	<br>
	<p1>楽しみにしていたキャンプ...<br>楽しみにしていた焚火...BBQ...</p1>
	<br>
	<br>
	<p1>ついつい薪を買い過ぎて余らせてしまったことはありませんか？</p1>
	<br>
	<br>
	<p1>今まで廃棄していた薪を次に訪れるキャンパー達に渡すことができる</p1>
	<br>
	<p1>環境に優しいWEBサービスです</p1>
	<br>
	<br>
	<br>
	<i class="fa fa-exclamation-triangle"></i>
	<p1><u>このサービスはグッドマナーなキャンパー達によって支えらています</u></p1>
	<br>
	<br>
	<h1>使い方</h1>
	<br>
	<p1><b>あげる機能</b></p1>
	<br>
	<p1>余った薪を翌日訪れるキャンパーに渡したい場合はこちら</p1>
	<br>
	<br>
	<p1><b>欲しい機能</b></p1>
	<br>
	<p1>前もってキャンプの予定を登録しておけば、余った薪が手に入るかも？</p1>
	<br>
	<br>
	<br>
	<h1>上手に引き渡すための工夫</h1>
	<br>
	<p1><b>置く場所を工夫する</b></p1>
	<br>
	<p1>炊事場の炉<font color="red">　←オススメ！</font><br>（例：入口付近の炊事場の左から３番目の炉に置きました！）</p1>
	<br>
	<br>
	<p1><b>置手紙を残す</b></p1>
	<br>
	<p1>シェアする相手にメッセージを伝えよう！</p1>
	<br>
	<br>
	<p1><b>コメントに画像を添付する</b></p1>
	<br>
	<p1>薪を置いた場所を写真で伝えてあげよう!</p1>
	<br>
	<br>
	<i class="fa fa-exclamation-triangle"></i>
	<p1><u>このサービスはグッドマナーなキャンパー達によって支えらています</u></p1>
	<br>
	<br>
	<input type="button" class = "sub_button" size="15" onclick="location.href='/campsharetop'" value="TOPへ戻る">
	<br><br>
@endsection
 
@section('pageJs')
<!-- JSなし -->
@endsection
 
@include('campsharefooter')