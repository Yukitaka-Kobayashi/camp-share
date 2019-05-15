<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <title>忘れがちなキャンパー達の知恵袋</title>
        <meta content="キャンプで頻繁に忘れ物をしてしまう方必見！！" name="description">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="css/common.css"/>
        <link rel="stylesheet" href="css/entry.css"/>
    </head>
    <body>
    <div align="center">
	<h1 class = "mainTitle">忘れがちなキャンパー達の<br>知恵袋</h1><br>
	
	<img src="images/title.png" style="width:80%;">
	
	<!--エラーがある場合の表示-->
	<?php if( !empty($error) ): ?>
	<ul class="error_list"style="width:60%;">
	<?php foreach( $error as $value ): ?>
		<li><?php echo $value; ?></li>
	<?php endforeach; ?>
	</ul>
    <?php endif; ?>
	<!--<h1>忘れ物入力画面</h1><br>-->
            <table border="0" style="width:60%;">
                <form action="/entry" method="POST">
                    <!-- おまじない -->
                    {{ csrf_field() }}　
                    <tr>
                        <th>
                            <!-- 文字なし -->
                        </th>
                    </tr>
		    <tr>
                <!--※忘れ物を入力してください。-->
                <td align="center">
                    <input type="text" placeholder="忘れ物を入力してください"name="lost_what" value="" style="width:95%;font-size:18px;">
                </td>
		    </tr>
		    <tr>
                <!--@-->
                <td align="center" style="background-color: #ffffff;">
                    @
                </td>
		    </tr>
		    <tr>
                <!--どこで-->
                <td align="center">
                    <input type="text"  placeholder="どこで"name="lost_where" value="" style="width:95%;font-size:18px;">
                </td>
		    </tr>
		    <tr>
            <!--カテゴリ-->
            <td align="center">
            <!-- phpでカテゴリを取得 -->
			<select name="lost_cate" size="1" style="width:95%;font-size:18px;">
            <!-- phpからカテゴリを取得する処理 -->
            	<?php foreach($dataCate as $cate){ ?>
				<option value="
				<?php echo $cate->dispname; ?>
				">
				<?php echo $cate->dispname; ?>
				</option>
            	<?php } ?>
            </select>
            </td>
		    </tr>
		    <tr>
                <td style="background-color: #ffffff;">
                </td>
		    </tr>
		    <tr>
                <td align="center" style="width:95%;">
                    <input type="submit" class = "square_btn" value="　登録する　"style="width:95%;font-size:16px;"> 
                </td>
		    </tr>
		    <tr>
                <td style="background-color: #ffffff;">
                </td>
		    </tr>
		    <tr>
                <td align="center">
    				<input type="button" class = "square_btn" size="15" onclick="location.href='/summary'" value="忘れ物の情報を確認する"style="width:95%;font-size:16px;">
                </td>
            </tr>
            </form>
            </table>
        </div>
    </body>
</html>