<html>
    <head>
		@yield('campsharehead')
    </head>
    <body>
    	@yield('campshareheader')
	<!-- 共通ヘッダー 終了 -->
	<!-- コンテンツエリア 開始-->
	<div id="wrapper" align="center">
		<main>
	    	@yield('content')
		</main>
			@yield('campsharefooter')
    </body>
</html>