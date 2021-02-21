@extends(env('THEME').'.admin.admin')
@section('content')

<div>
   <h2>Список Команд</h2>
   <p>Заполните и просмотрите список Команд для указания в них Игр</p>
    <!-- <p><a class="btn btn-secondary" href="/control-panel/country/edit/new" role="button">Добавить страну</a></p> -->
    <p><a class="btn btn-secondary" href={{route('CommandEdit', ['id' => 'new'])}} role="button">Добавить Команду</a></p>
   @foreach($commands as $command)
<ul>
    <li>
        № {{$command['id']}} -/-
        название <a href={{route('CommandDetail', ['id' => $command->id])}}>{{$command['name']}}</a> -/-
        вид спорта <a href={{route('SportDetail', ['id' => $command->sport->id])}}>{{$command->sport->name}}</a> -/-
        из страны <a href={{route('CountryDetail', ['id' => $command->country->id])}}>{{$command->country->name}}</a> -/-
        <a href={{route('CommandEdit', ['id' => $command->id])}}><i><b>Изменить Команду</b></i></a> -/-
        {{isset($command['created_at']) ? "в базе с ".$command['created_at'] : ""}} -/-
        <img src="{{ asset(env('THEME')) }}/logos/{{ $command->logo ? $command->logo : 'icon-excl.png'}}" width="20" height="20" alt="">

    </li>
</ul>
   @endforeach
 </div>

 @endsection
