@extends('layouts.layout')
@section('content')
@php
echo "<b>Статья: </b>";
print $articles->title;
echo '<hr noshade align="left" size="2" width="15%">';
echo "<b>Текст статьи:</b>";
echo '<br />';
print $articles->text;
echo '<hr noshade align="left" size="3" width="60%">';
echo '<div class="letter1">';
echo '<b><i>Автор: </i></b>'; 
print $articles->autor;
echo '</div>';
echo '<br />';
@endphp
<form action="/article/edit/{{$articles->id}}" method="get" enctype="multipart/form-data">
    {{csrf_field()}}
  <input type="submit" value="Изменить" />
</form>
<br />
<div class="">
    <a href="/articles"><<< Вернуться к списку статей !!!</a>
</div>
<form action="edit_a.blade.php">
</form>
@endsection