<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta http-equiv="Content-Script-Type" content="text/javascript">
        <title>薪シェア！ 記事投稿</title>
        <meta content="余った薪をシェアしたい方必見！！" name="description">
        <meta name="viewport" content="width=device-width,  user-scalable=yes">
		<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

        <link rel="stylesheet" href="css/common.css"/>
        <link rel="stylesheet" href="css/entry.css"/>
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
	    <li><a class="active" href='/campsharetop'><i class="fas fa-home fa-fw my-white"></i>トップページ</a></li>
	    <li><a href='/campshareentry'><i class="far fa-edit fa-fw my-white"></i>記事を投稿</a></li>
	    <li><a href='/campsharewhat'><i class="far fa-question-circle fa-fw my-white"></i>薪シェアって？</a></li>
	    <li class="right"><a href='/campsharecontact'><i class="far fa-envelope fa-fw my-white"></i>CONTACT</a></li>
	</ul>
	<!-- 共通ヘッダー 終了 -->
	<!-- コンテンツエリア 開始-->
		<div id="wrapper" align="center">
    		<main>
    		<br><br>
        	<p>{{$msg}}</p><br><br>
	    	<input type="button" class = "sub_button" size="15" onclick="location.href='/campsharetop'" value="TOPへ戻る">
            </main>
            
            <footer>
        	<address>Copyright(C)2019 Maki Share,Allright Reserved.</address>
        	<a href="https://twitter.com/fKHTHUef9VSXefB?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-size="large" data-show-screen-name="false" data-lang="ja" data-show-count="false">Follow @fKHTHUef9VSXefB</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        	</footer>
        </div>
	</div>
    </body>
</html>