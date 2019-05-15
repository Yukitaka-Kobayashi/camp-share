<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta http-equiv="Content-Script-Type" content="text/javascript">
        <title>薪シェア！ 記事投稿</title>
        <meta content="余った薪をシェアしたい方必見！！" name="description">
        <meta name="viewport" content="width=device-width">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="css/common.css"/>
        <link rel="stylesheet" href="css/entry.css"/>
        <link rel="stylesheet" href="css/app.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
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
	    <li><a class="active" href='/campshareentry'><i class="far fa-edit fa-fw my-white"></i>記事を投稿</a></li>
	    <li><a href='/campsharewhat'><i class="far fa-question-circle fa-fw my-white"></i>薪シェアって？</a></li>
	    <li class="right"><a href='/campsharecontact'><i class="far fa-envelope fa-fw my-white"></i>CONTACT</a></li>
	</ul>
	</div>
	<!-- 共通ヘッダー 終了 -->
	<!-- コンテンツエリア 開始-->
	<div id="wrapper" align="center">
		<main>
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
        </main>
        <footer>
    	<address>Copyright(C)2019 Maki Share,Allright Reserved.</address>
    	<a href="https://twitter.com/fKHTHUef9VSXefB?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-size="large" data-show-screen-name="false" data-lang="ja" data-show-count="false">Follow @fKHTHUef9VSXefB</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    	</footer>
    </div>
    </div>
    
    <!-- Java Script -->
    <script>
        //セレクトボックス変更用
        $(function(){
            var $children = $('.children'); //キャンプ場の要素を変数に入れます。
            var original = $children.html(); //後のイベントで、不要なoption要素を削除するため、オリジナルをとっておく
             
            //地域側のselect要素が変更になるとイベントが発生
            $('.parent').change(function() {
             
                  //選択された地域のvalueを取得し変数に入れる
                  var val1 = $(this).val();
                 
                  //削除された要素をもとに戻すため.html(original)を入れておく
                  $children.html(original).find('option').each(function() {
                    var val2 = $(this).data('val'); //data-valの値を取得
                 
                    //valueと異なるdata-valを持つ要素を削除
                    if (val1 != val2) {
                      $(this).not(':first-child').remove();
                    }
                 
                  });
                 
                  //地域側のselect要素が未選択の場合、キャンプ場をdisabledにする
                  if ($(this).val() == "") {
                    $children.attr('disabled', 'disabled');
                  } else {
                    $children.removeAttr('disabled');
                  }
             
            });
        });
    </script>
    </body>
</html>