@extends(env('THEME').'.admin.admin')
@section('content')

<div>
   <h2>Список стран</h2>
   <p>Заполните и просмотрите список стран для указания в них чемпионптов и игр</p>
    <!-- <p><a class="btn btn-secondary" href="/control-panel/country/edit/new" role="button">Добавить страну</a></p> -->
    <p><a class="btn btn-secondary" href={{route('CountryEdit', ['id' => 'new'])}} role="button">Добавить страну</a></p>
   @foreach($countrys as $country)
<ul>
    <li>
        Страна {{$country['id']}} -- {{isset($country['created_at']) ? "в базе с ".$country['created_at']." -- " : ""}}
        <!-- <a href="/control-panel/country/{{$country->id}}">{{$country['name']}}</a> -/- -->
        <a href={{route('CountryDetail', ['id' => $country->id])}}>{{$country['name']}}</a> -/-
        <!-- <a href="/control-panel/country/edit/{{$country->id}}"><i><b>Изменить СТРАНУ</b></i></a> -->
        <a href={{route('CountryEdit', ['id' => $country->id])}}><i><b>Изменить СТРАНУ</b></i></a>
            <!-- <form action="/control-panel/country/del/{{$country->id}}" method="POST"> -->
            <form action={{route('CountryDel', ['id' => $country->id])}} method="POST">
                    {{ csrf_field() }}
                    <input type="submit" value="удалить" />
            </form>
    </li>
</ul>
   @endforeach
 </div>

 @endsection
