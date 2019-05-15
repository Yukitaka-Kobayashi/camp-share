<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <title>薪シェア！</title>
        <meta content="余った薪を無駄にしない！！" name="description">
        <meta name="viewport" content="width=device-width,  user-scalable=yes">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
		    <link rel="stylesheet" href="css/common.css"/>
        <link rel="stylesheet" href="css/app.css"/>

    </head>
    <body>
      
    <!-- ドロワーメニューー -->
  	<input type="checkbox" id="navTgl">
  	<label for="navTgl" class="open"><span></span></label>
  	<label for="navTgl" class="close"></label>
  	<nav class="menu">
  	<ul>
  	    <li><a href='/campsharetop'><i class="fas fa-home fa-fw my-white"></i>トップページ</a></li>
  	    <li><a href='/campshareentry'><i class="far fa-edit fa-fw my-white"></i>記事を投稿</a></li>
  	    <li><a href='/campsharewhat'><i class="far fa-question-circle fa-fw my-white"></i>薪シェアって？</a></li>
  	    <li class="right"><a href='/campsharecontact'><i class="far fa-envelope fa-fw my-white"></i>CONTACT</a></li>
  	</ul>
  	</nav>
  	
  	<div class="contents">
    <header>
  	<div class="titleh"><a id ="titlelink" href='/campsharetop'><img src="images/fire_icon.png" class="titlegif"> MAKI SHARE</a></div>
  	</header>
	
  	<div id="branding">
    	<p>Share your firewoods everywhere!</p>
  	</div>
  	<ul class="topnav">
	    <li><a href='/campsharetop'><i class="fas fa-home fa-fw my-white"></i>トップページ</a></li>
	    <li><a href='/campshareentry'><i class="far fa-edit fa-fw my-white"></i>記事を投稿</a></li>
	    <li><a href='/campsharewhat'><i class="far fa-question-circle fa-fw my-white"></i>薪シェアって？</a></li>
	    <li class="right"><a href='/campsharecontact'><i class="far fa-envelope fa-fw my-white"></i>CONTACT</a></li>
  	</ul>

	  <!-- 以下、コンテンツエリア -->
  	<div id="wrapper" align="center">
  	<main>
			<div class ="hh" align="left">
				<i class="far fa-list-alt fa-fw"></i>投稿詳細
			</div><br>
        <div class="hh2" align="left">{{$data->title}}</div>
        <table class="tbl-r02">
        <tr>
          <th>種別</th>
          <td>{{$data->subType}}</td>
        </tr>    
        <tr>
          <th>日付</th>
          <td>{{$data->eventDate}}</td>
        </tr>
        <tr>
          <th>ニックネーム</th>
          <td>{{$data->nickName}}</td>
        </tr>
        <tr>
          <th>アイテム名</th>
          <td>{{$data->itemName}}</td>
        </tr>
        <tr>
          <th>県名</th>
          <td>{{$data->prefName}}</td>
        </tr>
        <tr>
          <th>キャンプ場情報</th>
          <td>{{$data->siteName}}</td>
        </tr>
        <tr>
          <th>キャンプ場(URL)</th>
          <td>{{$data->siteURL}}</td>
        </tr>
        <tr>
          <th>キャンプ場情報(住所)</th>
          <td>{{$data->siteAddress}}</td>
        </tr>
        <tr>
          <th>詳細</th>
          <td>{{$data->detail}}</td>
        </tr>
      </table>
    	<br>
			<div class ="hh" align="left">
				<i class="far fa-comment-dots fa-fw"></i>返信情報
			</div>
			<div class="box28" align="left">
			<?php if(isset($data_comment) && count($data_comment)): ?>
    	@foreach ($data_comment as $row_commentdata)
        [ {{$row_commentdata->subBr}} ]
        {{$row_commentdata->comDate}} - 
        {{$row_commentdata->nickName}} >> 
        {{$row_commentdata->comment}}
        </br>
      @endforeach
      <?php else: ?>
				<p>まだ投稿がありません。</p>
			<?php endif; ?>
      </div>
    	
		<div class ="hh" align="left">
			<i class="far fa-edit fa-fw"></i>返信する
		</div>
    <form action="{{url('/campsharedetail/add')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
      {{ csrf_field() }}
      <input type="hidden" name="subNo" value="<?php echo $data->subNo; ?>">
      <textarea rows="1" name="nickName" placeholder="ニックネーム" class="resbox" required></textarea>
      </br>
      <textarea rows="6" name="comment" placeholder="コメント" class="resbox" required></textarea>
      </br>
      <div class="form-group">
　　　<input name="image" type="file">
　　　</div>
      <button type="submit" name="add">
       コメント
      </button>
    </form>
    

		</main>
	  <footer>
		<address>Copyright(C)2019 Maki Share,Allright Reserved.</address>
		<a href="https://twitter.com/fKHTHUef9VSXefB?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-size="large" data-show-screen-name="false" data-lang="ja" data-show-count="false">Follow @fKHTHUef9VSXefB</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
		</footer>
		</div>
		</div>
</body>
</html>