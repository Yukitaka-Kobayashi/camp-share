@extends('campsharecommon')
 
@section('title', 'トップページ')
@section('pageCss')
<!-- 追加CSSなし -->
@endsection
 
@include('campsharehead')
 
@include('campshareheader')
 
@section('content')
	<div class="search-box" align="left">
    <span class="box-title"><i class="fas fa-search fa-fw my-white"></i>地域で検索</span>
	<p>
	<a href="/campsharetop">すべて</a><br>
	北海道・東北 ||
	<a href="/campsharetop?erea=Hokkaido">北海道</a> | 
	<a href="/campsharetop?erea=Aomori">青森</a> | 
	<a href="/campsharetop?erea=Iwate">岩手</a> | 
	<a href="/campsharetop?erea=Miyagi">宮城</a> | 
	<a href="/campsharetop?erea=Akita">秋田</a> | 
	<a href="/campsharetop?erea=Yamagata">山形</a> | 
	<a href="/campsharetop?erea=Fukushima">福島</a><br>

	関東 ||
	<a href="/campsharetop?erea=Tokyo">東京</a> | 
	<a href="/campsharetop?erea=Kanagawa">神奈川</a> | 
	<a href="/campsharetop?erea=Ibaraki">茨城</a> | 
	<a href="/campsharetop?erea=Tochigi">栃木</a> | 
	<a href="/campsharetop?erea=Gunma">群馬</a> | 
	<a href="/campsharetop?erea=Saitama">埼玉</a> | 
	<a href="/campsharetop?erea=Chiba">千葉</a><br>

	中部 || 
	<a href="/campsharetop?erea=Niigata">新潟</a> | 
	<a href="/campsharetop?erea=Toyama">富山</a> | 
	<a href="/campsharetop?erea=Ishikawa">石川</a> | 
	<a href="/campsharetop?erea=Fukui">福井</a> | 
	<a href="/campsharetop?erea=Yamanashi">山梨</a> | 
	<a href="/campsharetop?erea=Nagano">長野</a> | 
	<a href="/campsharetop?erea=Gifu">岐阜</a> | 
	<a href="/campsharetop?erea=Shizuoka">静岡</a> | 
	<a href="/campsharetop?erea=Aichi">愛知</a><br>

	近畿 || 
	<a href="/campsharetop?erea=Mie">三重</a> | 
	<a href="/campsharetop?erea=Shiga">滋賀</a> | 
	<a href="/campsharetop?erea=Kyoto">京都</a> | 
	<a href="/campsharetop?erea=Osaka">大阪</a> | 
	<a href="/campsharetop?erea=Hyogo">兵庫</a> | 
	<a href="/campsharetop?erea=Nara">奈良</a> | 
	<a href="/campsharetop?erea=Wakayama">和歌山</a><br>

	中国・四国 || 
	<a href="/campsharetop?erea=Tottori">鳥取</a> | 
	<a href="/campsharetop?erea=Shimane">島根</a> | 
	<a href="/campsharetop?erea=Okayama">岡山</a> | 
	<a href="/campsharetop?erea=Hiroshima">広島</a> | 
	<a href="/campsharetop?erea=Yamaguchi">山口</a> | 
	<a href="/campsharetop?erea=Tokushima">徳島</a> | 
	<a href="/campsharetop?erea=Kagawa">香川</a> | 
	<a href="/campsharetop?erea=Ehime">愛媛</a> | 
	<a href="/campsharetop?erea=Kouchi">高知</a><br>

	九州・沖縄 || 
	<a href="/campsharetop?erea=Fukuoka">福岡</a> | 
	<a href="/campsharetop?erea=Saga">佐賀</a> | 
	<a href="/campsharetop?erea=Nagasaki">長崎</a> | 
	<a href="/campsharetop?erea=Kumamoto">熊本</a> | 
	<a href="/campsharetop?erea=Oita">大分</a> | 
	<a href="/campsharetop?erea=Miyazaki">宮崎</a> | 
	<a href="/campsharetop?erea=Kagoshima">鹿児島</a> | 
	<a href="/campsharetop?erea=Okinawa">沖縄</a></p>

	</div>
	
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
	            <td><input type="checkbox" name="status[]" value="受付中"> 受付中 
	            	<input type="checkbox" name="status[]" value="受付終了"> 受付終了 </td>
		    </tr>
		    <tr>
	            <th>種別</th>
	            <td>
	                <input type="radio" name="subType" value="欲しい" > 欲しい 
	                <input type="radio" name="subType" value="あげる" > あげる </td>
		    </tr>
		    <tr>
	            <th>日付 (FROM)</th>
	            <td><input type="date" name="fromDate" ></td>
		    </tr>
		    <tr>
	            <th>日付 (TO)</th>
	            <td><input type="date" name="toDate" ></td>
		    </tr>
		    <tr>
	            <th>地域</th>
	            <td>
	            	<select class="parent" name="fukenCD">
	                	<option value="" class="msg" selected>-----地域を選択-----</option>
	                	<?php foreach($prefs as $pref){ ?>
	    				<option value="<?php echo $pref->fukenCD; ?>" >
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
	    				<option value="<?php echo $site->siteName; ?>" data-val="<?php echo $site->fukenCD; ?>" >
	    				<?php echo $site->siteName; ?>
	    				</option>
	                	<?php } ?>
	            </td>
		    </tr>
		    <tr>
	            <th>アイテム</th>
	            <td><input type="checkbox" name="itemName[]" value="薪"> 薪 
	            	<input type="checkbox" name="itemName[]" value="炭"> 炭 
	            	<input type="checkbox" name="itemName[]" value="着火材"> 着火材 
	            	<input type="checkbox" name="itemName[]" value="その他"> その他 </td>
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
		<i class="far fa-list-alt fa-fw"></i>最新の投稿
	</div>
	<?php if(isset($posts) && count($posts)): ?>
	<div class="notebox2" align="left">
    <p>{{$count}}件の投稿があります。</p>
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
	<p>{{ $posts->appends(['erea'=>$erea])->links('vendor.pagination.bootstrap-4') }}</p>
	<?php else: ?>
		<p>まだ投稿がありません。</p>
	<?php endif; ?><br>
@endsection
 
@section('pageJs')
<script src="js/Select.campsite.js"></script>
@endsection
 
@include('campsharefooter')