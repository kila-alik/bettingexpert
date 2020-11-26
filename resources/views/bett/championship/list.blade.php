@extends(env('THEME').'.admin.admin')
@section('content')

<div>
   <h2>Список Чемпионатов</h2>
   <p>Заполните и просмотрите список Чемпионатов для указания в них Игр</p>
    <!-- <p><a class="btn btn-secondary" href="/control-panel/country/edit/new" role="button">Добавить страну</a></p> -->
    <p><a class="btn btn-secondary" href={{route('ChampionshipEdit', ['id' => 'new'])}} role="button">Добавить Чемпионат</a></p>
   @foreach($championships as $championship)
<ul>
    <li>
        № {{$championship['id']}} -/-
        <a href={{route('ChampionshipDetail', ['id' => $championship->id])}}>{{$championship['name']}}</a> -/-
        Вид спорта <a href={{route('SportDetail', ['id' => $championship->sport->id])}}>{{$championship->sport->name}}</a> -/-
        В стране <a href={{route('CountryDetail', ['id' => $championship->country->id])}}>{{$championship->country->name}}</a> -/-
        <a href={{route('ChampionshipEdit', ['id' => $championship->id])}}><i><b>Изменить Чемпионат</b></i></a> -/-
        {{isset($championship['created_at']) ? "в базе с ".$championship['created_at'] : ""}}
          
    </li>
</ul>
   @endforeach
 </div>

 @endsection
