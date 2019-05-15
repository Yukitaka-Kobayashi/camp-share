@section('campshareheader')
<!-- ドロワーメニューー -->
<input type="checkbox" id="navTgl">
<label for="navTgl" class="open"><span></span></label>
<label for="navTgl" class="close"></label>
<nav class="menu">
<ul>
    <li><a href='/campsharetop'><i class="fas fa-home fa-fw my-white"></i>トップページ</a></li>
    <li><a href='/campshareentry'><i class="far fa-edit fa-fw my-white"></i>記事を投稿</a></li>
    <li><a href='/campsharewhat'><i class="far fa-question-circle fa-fw my-white"></i>薪シェアとは</a></li>
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
    <li><a href='/campsharewhat'><i class="far fa-question-circle fa-fw my-white"></i>薪シェアとは</a></li>
    <li class="right"><a href='/campsharecontact'><i class="far fa-envelope fa-fw my-white"></i>CONTACT</a></li>
</ul>
@endsection