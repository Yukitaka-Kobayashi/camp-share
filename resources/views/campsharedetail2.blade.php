@extends('campsharecommon')
 
@section('title', '投稿詳細画面')
@section('pageCss')
<!-- 追加CSSなし -->
@endsection
 
@include('campsharehead')
 
@include('campshareheader')
 
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
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
      <th>キャンプ場(住所)</th>
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
  @if(isset($row_commentdata->filefullpath) && $row_commentdata->filefullpath != "")
    <input type="button" onclick="location.href='/campsharedl?subNo={{$row_commentdata->subNo}}&subBr={{$row_commentdata->subBr}}'" value="画像あり">
	@endif
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
<div class="form-image_url">
    <input type="file" name="image_url"> 
</div>
</br>
  <button type="submit" name="add">
   投稿する
  </button>
  <br><br>
  <input type="button" class = "sub_button" size="15" onClick="history.back()" value="一覧へ戻る">
</form>
</body>


@endsection
 
@section('pageJs')
<!-- JSなし -->
@endsection
 
@include('campsharefooter')