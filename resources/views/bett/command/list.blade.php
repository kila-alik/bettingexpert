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
        Команда {{$command['id']}} -/-
        <a href={{route('CommandDetail', ['id' => $command->id])}}>{{$command['name']}}</a> -/-
        <a href={{route('SportDetail', ['id' => $command->sport->id])}}>{{$command->sport->name}}</a> -/-
        <a href={{route('CountryDetail', ['id' => $command->country->id])}}>{{$command->country->name}}</a> -/-
        <a href={{route('CommandEdit', ['id' => $command->id])}}><i><b>Изменить Команду</b></i></a> -/-
        {{isset($command['created_at']) ? "в базе с ".$command['created_at']." -- " : ""}}
            <form action={{route('CommandDel', ['id' => $command->id])}} method="POST">
                    {{ csrf_field() }}
                    <input type="submit" value="удалить" />
            </form>
    </li>
</ul>
   @endforeach
 </div>

 @endsection
