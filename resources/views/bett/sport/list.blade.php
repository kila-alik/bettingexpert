@extends(env('THEME').'.admin.admin')
@section('content')

<div>
   <h2>Список Видов Спорта</h2>
   <p>Заполните и просмотрите список Видов Спорта для указания Чемпионатов и Игр в этих видах</p>
    <!-- <p><a class="btn btn-secondary" href="/control-panel/country/edit/new" role="button">Добавить страну</a></p> -->
    <p><a class="btn btn-secondary" href={{route('SportEdit', ['id' => 'new'])}} role="button">Добавить вид спорта</a></p>
   @foreach($sports as $sport)
<ul>
    <li>
        Страна: {{$sport['id']}}
        <a href={{route('SportDetail', ['id' => $sport->id])}}><b>{{$sport['name']}}</b></a> -/-
        <a href={{route('SportEdit', ['id' => $sport->id])}}><i><b>Изменить Спорт</b></i></a>
        -- {{isset($sport['created_at']) ? "в базе с ".$sport['created_at'] : ""}}

      сегодня  {{Date::now()->format('l j F Y H:i:s')}}

        <!-- {{Date::parse('-1 day')->diffForHumans()}}

        {{ Date::parse($sport['created_at'])->format('j F Y г.') }} -->
    </li>
</ul>
   @endforeach
 </div>

 @endsection
