<html>
	<head>
		<title>投稿画面</title>
		<!--<link rel="stylesheet" href="style.css" type="text/css">-->
	</head><br>
<body>
	<font size="8" >投稿画面</font><br><br><br>
	<form>
		<div class="cp_iptxt">
			<label class="ef">
				<input type="text" placeholder="お名前">
			</label>

	地域：
		<select name="area">
			<option value="Hokkaido" selected>北海道</option>
			<option value="Aomori">青森</option>
			<option value="Iwate">岩手</option>
			<option value="Miyagi">宮城</option>
			<option value="Akita">秋田</option>
			<option value="Yamagata">山形</option>
			<option value="Fukushima">福島</option>
			<option value="Ibaraki">茨城</option>
			<option value="Tochigi">栃木</option>
			<option value="Gunma">群馬</option>
			<option value="Saitama">埼玉</option>
			<option value="Chiba">千葉</option>
			<option value="Tokyo">東京</option>
			<option value="Kanagawa">神奈川</option>
			<option value="Niigata">新潟</option>
			<option value="Toyama">富山</option>
		</select><br>
	日付（入力例：20190101）：
		<input type="text" name="Day" size="20" maxlength="8"><br>
	種別：
		<input type="radio" name="Syubetsu" value="欲しい">欲しい
		<input type="radio" name="Syubetsu" value="あげる">あげる<br>
	タイトル：
		<input type="text" name="Title" size="30" ><br>
	詳細：<br>
		<textarea name="Syousai" rows="6" cols="40"></textarea><br>
	お知らせ用<br><br>
	メールアドレス（非公開）：
		<input type="text" name="Mail" size="40" ><br><br>
	キャンプ場ＵＲＬ：
		<input type="text" name="URL" size="40" ><br><br>
		</div>
		<input type="submit" value="送信">
		<input type="reset" value="入力内容をリセット">
	</form><br>
</body>
</html>