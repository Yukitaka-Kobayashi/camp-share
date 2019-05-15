@extends('campsharecommon')
 
@section('title', 'お問い合わせ')
@section('pageCss')
<link rel="stylesheet" href="css/entry.css"/>
@endsection
 
@include('campsharehead')
 
@include('campshareheader')
 
@section('content')
    <div class ="hh" align="left">
    <i class="far fa-envelope fa-fw"></i>お問い合わせ
    </div>
    <div class="notebox" align="left">
    <p>本サービスのご利用にあたり、お気づきの点等御座いましたら以下のお問い合わせフォームよりご連絡下さい。
    内容確認の上、後日メールにて回答致します。</p>
    </div>

	<!--エラーがある場合の表示-->
	<?php if( !empty($error) ): ?>
	<ul class="error_list">
	<?php foreach( $error as $value ): ?>
		<li><?php echo $value; ?></li>
	<?php endforeach; ?>
	</ul>
    <?php endif; ?>
        <table class="entryfrom">
        <form action="/campsharecontact" method="POST">
        <!-- おまじない -->
        {{ csrf_field() }}　
	    <tr>
            <th>お名前</th>
            <td>
                <input type="text" placeholder=""name="nickName" value="{{$subItems['nickName']}}">
            </td>
	    </tr>
	    <tr>
            <th>メールアドレス</th>
            <td>
                <input type="text" placeholder=""name="email" value="{{$subItems['email']}}">
            </td>
	    </tr>
	    <tr>
            <th>お問い合わせ内容</th>
            <td><textarea name="detail" rows="4" cols="40">{{$subItems['detail']}}</textarea></td>
	    </tr>
	    <tr>
            <th colspan=2 align="center">
                <input type="submit" class = "sub_button" value="　送信　"> 
            </th>
	    </tr>
        </form>
    </table>
    <br>
@endsection
 
@section('pageJs')
<!-- JSなし -->
@endsection
 
@include('campsharefooter')