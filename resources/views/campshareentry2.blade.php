@extends('campsharecommon')
 
@section('title', '投稿画面')
@section('pageCss')
<link rel="stylesheet" href="css/entry.css"/>
@endsection
 
@include('campsharehead')
 
@include('campshareheader')
 
@section('content')
    <div class ="hh" align="left">
    <i class="far fa-edit fa-fw"></i>記事を投稿
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
        <form action="/campshareentry" method="POST">
        <!-- おまじない -->
        {{ csrf_field() }}　
	    <tr>
            <td colspan=2><font color="red">* 入力必須項目</font></td>
	    </tr>
	    <tr>		    <tr>
            <th>日付<font color="red">*</font></th>
            <td><input type="date" name="eventDate" value={{$subItems['eventDate']}}></td>
	    </tr>
	    <tr>
            <th>種別<font color="red">*</font></th>
            <td>
                <input type="radio" name="subType" value=1 
                <?php if($subItems['subType'] == 1){ echo 'checked="checked"';} ?> 
                >欲しい　<input type="radio" name="subType" value=2 
                <?php if($subItems['subType'] == 2){ echo 'checked="checked"';} ?>>あげる
            </td>
	    </tr>
	    <tr>
            <th>地域<font color="red">*</font></th>
            <td>
            	<select class="parent" name="fukenCD">
                	<option value="" class="msg" disabled selected>-----地域を選択-----</option>
                	<?php foreach($prefs as $pref){ ?>
    				<option value="<?php echo $pref->fukenCD; ?>" <?php if( $pref->fukenCD == $subItems['fukenCD'] ){ echo 'selected'; } ?>>
    				<?php echo $pref->prefName; ?>
    				</option>
                	<?php } ?>
            </td>
	    </tr>
	    <tr>
            <th>キャンプ場名<font color="red">*</font></th>
            <td>
            	<select class="children" name="campSiteID">
            	    <option value="" class="msg" disabled selected>-----キャンプ場を選択-----</option>
                	<?php foreach($sites as $site){ ?>
    				<option value="<?php echo $site->campSiteID; ?>" data-val="<?php echo $site->fukenCD; ?>" <?php if( $site->campSiteID == $subItems['campSiteID'] ){ echo 'selected'; } ?>>
    				<?php echo $site->siteName; ?>
    				</option>
                	<?php } ?>
            </td>
	    </tr>
            <th>投稿者名<font color="red">*</font></th>
            <td>
                <input type="text" placeholder=""name="nickName" value="{{$subItems['nickName']}}">
            </td>
	    <tr>
	    </tr>
            <th>メールアドレス<br><font size=2 color="gray">*返信の通知用</font></th>
            <td>
                <input type="text" placeholder=""name="email" value="{{$subItems['email']}}">
            </td>
	    <tr>
	    </tr>
            <th>タイトル<font color="red">*</font></th>
            <td>
                <input type="text" placeholder=""name="title" value="{{$subItems['title']}}">
            </td>
	    <tr>
	    </tr>
            <th>アイテム<font color="red">*</font></th>
            <td>
            	<select name="itemID">
                	<?php foreach($items as $item){ ?>
    				<option value="
    				<?php echo $item->itemID; ?>
    				" <?php if( $item->itemID == $subItems['itemID'] ){ echo 'selected';} ?>
    				>
    				<?php echo $item->itemName; ?>
    				</option>
                	<?php } ?>
            </td>
	    <tr>
            <th>詳細</th>
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
<!-- Java Script -->
<script src="js/Select.campsite.js"></script>
@endsection
 
@include('campsharefooter')