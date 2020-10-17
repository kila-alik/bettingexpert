@extends('layouts.layout')

@section('content')
<form method="POST" enctype="multipart/form-data">
   {{ csrf_field() }}
   <b>Название статьи:</b>
   <br>
   <input type="text" name="title" value="{{$articles->title}}">
   <br>
   <b>Автор статьи:</b>
   <br>
   <input type="text" name="autor" value="{{$articles->autor}}">
   <br>
   <b>Текст статьи:</b>
   <br>
   <textarea name="text" id="" cols="50" rows="6">{{$articles->text}}</textarea>
   <br>
   <input type="submit" value="Изменить" />
</form>

<br />
<div class="">
    <a href="/articles"><<< Вернуться к списку статей !!!</a>
</div>
@endsection
