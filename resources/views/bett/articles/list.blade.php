@extends('layouts.layout')
@section('content')
<!--<div class="col-md-4">-->
<div>
   <h2>Блок Статей</h2>
   <p>Это наши Статьи о каждом месяце</p>
    <p><a class="btn btn-secondary" href="/article/edit/new" role="button">Добавить статью</a></p> 
   @foreach($articles as $article)
<ul>
    <li>
        Статья №{{$article['id']}} -- {{isset($article['created_at']) ? "от ".$article['created_at']." -- " : ""}}
        <a href="/article/{{$article->id}}">{{$article['title']}}</a> -/- 
        <a href="/article/edit/{{$article->id}}"><i><b>изменить Статью</b></i></a>
        <form action="/article/del/{{$article->id}}" method="POST">
                {{ csrf_field() }}
                <input type="submit" value="удалить" />
        </form>
    </li>
</ul> 
   @endforeach
 </div>
@endsection
