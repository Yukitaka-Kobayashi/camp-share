@extends('campsharecommon')
 
@section('title', '確認画面')
@section('pageCss')
<!-- 追加CSSなし -->
@endsection
 
@include('campsharehead')
 
@include('campshareheader')
 
@section('content')
<br><br>
<p>{{$msg}}</p><br><br>
<input type="button" class = "sub_button" size="15" onclick="location.href='/campsharetop'" value="TOPへ戻る">
@endsection
 
@section('pageJs')
<!-- JSなし -->
@endsection
 
@include('campsharefooter')