@extends(env('THEME').'.admin.admin')
@section('content')

<div>
   <h2>Список Стран</h2>
   <p>Заполните и просмотрите список Стран для указания в них Чемпионатов и Игр</p>
    <!-- <p><a class="btn btn-secondary" href="/control-panel/country/edit/new" role="button">Добавить страну</a></p> -->
    <p><a class="btn btn-secondary" href={{route('CountryEdit', ['id' => 'new'])}} role="button">Добавить Страну</a></p>
   @foreach($countrys as $country)
<ul>
    <li>
        Страна: {{$country['id']}}
        <!-- <a href="/control-panel/country/{{$country->id}}">{{$country['name']}}</a> -/- -->
        <a href={{route('CountryDetail', ['id' => $country->id])}}><b>{{$country['name']}}</b></a> -/-
        <!-- <a href="/control-panel/country/edit/{{$country->id}}"><i><b>Изменить СТРАНУ</b></i></a> -->
        <a href={{route('CountryEdit', ['id' => $country->id])}}><i><b>Изменить СТРАНУ</b></i></a>
        -- {{isset($country['created_at']) ? "в базе с ".$country['created_at'] : ""}}
            
    </li>
</ul>
   @endforeach
 </div>

 @endsection
