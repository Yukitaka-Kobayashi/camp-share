@extends('campsharecommon')
 
@section('title', '詳細検索画面')
@section('pageCss')
<!-- 追加CSSなし -->
@endsection
 
@include('campsharehead')
 
@include('campshareheader')
 
@section('content')
    <div class="hidden_box"> 
	<div class="notebox3" align="left">
    <label for="hidden_lv"><i class="fas fa-search fa-fw my-white"></i>詳細検索</label></div>
	<input type="checkbox" id="hidden_lv"/>
	<div class="hidden_show"> <!-- 非表示ここから -->
		<div class="search-detail-box" align="left">
		<table class="searchfrom">
	        <form action="/campsharesearch" method="GET">
	        <!-- おまじない -->
	        {{ csrf_field() }}
		    <tr>
	            <th>状況</th>
	            <td><input type="checkbox" name="status[]" value="受付中" <?php if(isset($pagenate_params['status'])){ if(in_array('受付中', $pagenate_params['status'])){ echo 'checked'; }} ?>> 受付中 
	            	<input type="checkbox" name="status[]" value="受付終了" <?php if(isset($pagenate_params['status'])){ if(in_array('受付終了', $pagenate_params['status'])){ echo 'checked'; }} ?>> 受付終了 </td>
		    </tr>
		    <tr>
	            <th>種別</th>
	            <td>
	                <input type="radio" name="subType" value="欲しい" <?php if(isset($pagenate_params['subType'])){ if($pagenate_params['subType'] == '欲しい'){ echo 'checked'; }} ?>> 欲しい 
	                <input type="radio" name="subType" value="あげる" <?php if(isset($pagenate_params['subType'])){ if($pagenate_params['subType'] == 'あげる'){ echo 'checked'; }} ?>> あげる </td>
		    </tr>
		    <tr>
	            <th>日付 (FROM)</th>
	            <td><input type="date" name="fromDate" value="<?php if(isset($pagenate_params['fromDate'])){ echo $pagenate_params['fromDate']; } ?>" ></td>
		    </tr>
		    <tr>
	            <th>日付 (TO)</th>
	            <td><input type="date" name="toDate" value="<?php if(isset($pagenate_params['toDate'])){ echo $pagenate_params['toDate']; } ?>" ></td>
		    </tr>
		    <tr>
	            <th>地域</th>
	            <td>
	            	<select class="parent" name="fukenCD">
	                	<option value="" class="msg" selected>-----地域を選択-----</option>
	                	<?php foreach($prefs as $pref){ ?>
	    				<option value="<?php echo $pref->fukenCD; ?>" <?php if(isset($pagenate_params['fukenCD'])){ if($pref->fukenCD == $pagenate_params['fukenCD'] ){ echo 'selected'; }} ?>>
	    				<?php echo $pref->prefName; ?>
	    				</option>
	                	<?php } ?>
	            </td>
		    </tr>
		    <tr>
	            <th>キャンプ場名</th>
	            <td>
	            	<select class="children" name="siteName">
	            	    <option value="" class="msg" selected>-----キャンプ場を選択-----</option>
	                	<?php foreach($sites as $site){ ?>
	    				<option value="<?php echo $site->siteName; ?>" data-val="<?php echo $site->fukenCD; ?>" <?php if(isset($pagenate_params['siteName'])){ if( $site->siteName == $pagenate_params['siteName'] ){ echo 'selected'; }} ?>>
	    				<?php echo $site->siteName; ?>
	    				</option>
	                	<?php } ?>
	            </td>
		    </tr>
		    <tr>
	            <th>アイテム</th>
	            <td><input type="checkbox" name="itemName[]" value="薪" <?php if(isset($pagenate_params['itemName'])){ if(in_array('薪', $pagenate_params['itemName'])){ echo 'checked'; }} ?>> 薪 
	            	<input type="checkbox" name="itemName[]" value="炭" <?php if(isset($pagenate_params['itemName'])){ if(in_array('炭', $pagenate_params['itemName'])){ echo 'checked'; }} ?>> 炭 
	            	<input type="checkbox" name="itemName[]" value="着火材" <?php if(isset($pagenate_params['itemName'])){ if(in_array('着火材', $pagenate_params['itemName'])){ echo 'checked'; }} ?>> 着火材 
	            	<input type="checkbox" name="itemName[]" value="その他" <?php if(isset($pagenate_params['itemName'])){ if(in_array('その他', $pagenate_params['itemName'])){ echo 'checked'; }} ?>> その他 </td>
		    </tr>
		    <tr>
	            <th colspan=2 align="center">
	                <input type="submit" class = "sub_button" value="　検索　"> 
	            </th>
		    </tr>
	        </form>
	    </table>
		</div>
	</div> <!-- 非表示ここまで -->
	</div>
	
	<!-- 初期処理で取得した投稿を表示 -->
	<!-- テーブル形式で表示 -->
	<div class ="hh" align="left">
		<i class="far fa-list-alt fa-fw"></i>検索結果
	</div>
	<?php if(isset($posts) && count($posts)): ?>
	<div class="notebox2" align="left">
    <p>{{$count}}件ヒットしました。</p>
    </div>
	<table class = 'resulttable'>
	<!-- table class="table is-bordered" -->
		<thead>
			<tr class="thead">
				<th>タイトル</th>
				<th>状況</th>
				<th>種別</th>
				<th>日付</th>
				<th>投稿者</th>
				<th>都道府県</th>
				<th>キャンプ場名</th>
				<th>投稿日</th>
				<th>返信</th>
			</tr>
		</thead>
		<tbody>
			<div class="container">
			@foreach($posts as $post)
			<tr>
				<td>
					<a href="/campsharedetail?subNo={{$post->subNo}}">{{$post->title}}</a>
				</td>
				<td data-label="状況" class="details">
					{{$post->status}}
				</td>
				<td data-label="種別" class="details">
					{{$post->subType}}
				</td>
				<td data-label="日付" class="details">
					{{$post->eventDate}}
				</td>
				<td data-label="投稿者" class="details">
					{{$post->nickName}}
				</td>
				<td data-label="都道府県" class="details">
					{{$post->prefName}}
				</td>
				<td data-label="キャンプ場名" class="details">
					{{$post->siteName}}
				</td>
				<td data-label="投稿日" class="details">
					{{$post->insertDate}}
				</td>
				<td data-label="返信" class="details">
					{{$post->comments}}
				</td>
			</tr>
			@endforeach
			</div>
		</tbody>
	</table>
	<!-- ページネーションの表示 -->
	<p>{{ $posts -> appends($pagenate_params) -> links('vendor.pagination.bootstrap-4') }}</p>
	<?php else: ?>
		<p>該当する投稿はありません。</p>
	<?php endif; ?>
	<input type="button" class = "sub_button" size="15" onclick="location.href='/campsharetop'" value="TOPへ戻る">
@endsection
 
@section('pageJs')
<script src="js/Select.campsite.js"></script>
@endsection
 
@include('campsharefooter')