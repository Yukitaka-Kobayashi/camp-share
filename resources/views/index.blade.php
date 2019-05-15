@extends('common.layout')

@section('index')
    <p>{{ $hello }}</p>
    @foreach ($hello_array as $hello_word)
        {{ $hello_word }}<br>
    @endforeach
    
<--></-->
<form method="post" action="index/regist">
  {{ csrf_field() }}
  <textarea rows="6" name="message"></textarea>
  <button type="submit" name="add">
   追加
  </button>
</form>

@endsection