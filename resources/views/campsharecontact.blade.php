<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta http-equiv="Content-Script-Type" content="text/javascript">
        <title>MAKI SHARE お問い合わせ</title>
        <meta content="お問い合わせフォーム" name="description">
        <meta name="viewport" content="width=device-width">
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
	<div align="center">
	<ul class="topnav">
	    <li><a href='/campsharetop'><i class="fas fa-home fa-fw my-white"></i>トップページ</a></li>
	    <li><a href='/campshareentry'><i class="far fa-edit fa-fw my-white"></i>記事を投稿</a></li>
	    <li><a href='/campsharewhat'><i class="far fa-question-circle fa-fw my-white"></i>薪シェアって？</a></li>
	    <li class="right"><a class="active" href='/campsharecontact'><i class="far fa-envelope fa-fw my-white"></i>CONTACT</a></li>
	</ul>
	</div>
	<!-- 共通ヘッダー 終了 -->
	<!-- コンテンツエリア 開始-->
	<div id="wrapper" align="center">
		<main>
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
        </main>
        <footer>
    	<address>Copyright(C)2019 Maki Share,Allright Reserved.</address>
    	<a href="https://twitter.com/fKHTHUef9VSXefB?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-size="large" data-show-screen-name="false" data-lang="ja" data-show-count="false">Follow @fKHTHUef9VSXefB</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    	</footer>
    </div>
    </div>
    </body>
</html>