@extends(env('THEME').'.admin.admin')
@section('content')

<form method="POST" enctype="multipart/form-data">
  {{ csrf_field() }}
  <b>Вид спорта</b>

    <!-- @if(Request::is('*/new') ? 'Добавить' : 'Изменить') -->
    @if(Request::is('*/new'))
      {!! Form::select('sports', $sports, 'Футбол') !!}
    @else
      {{ $forecast->country->sports }}
    @endif
  <br />
  <b>Страна</b>
  {!! Form::select('country_id', $forecast->contry->where('sports', 333333), $forecast->contry->name) !!}
  <br />



  <!-- <b>Чемпионат</b>
  {{$forecasts->champ_id}}
  <br />
  <b>Команда 1</b>
  {{$forecasts->command_1}}
  <br />
  <b>Команда 2</b>
  {{$forecasts->command_2}}
  <br />
  <b>Дата игры</b>
  {{$forecasts->data_game}}
  <br />
  <b>Коэффициент прогноза</b>
  {{$forecasts->coeff}}
  <br />
  <b>Статус (платный/бесплатный)</b>
  {{$forecasts->status}} -->
  <br />
</form>


<!-- <form method="POST" enctype="multipart/form-data">
   {{ csrf_field() }}
   <b>Название Команды:</b>
   <br>
   <input type="text" name="name" value="{{$command->name}}">
   <br>
   <b>Описание Команды:</b>
   <br>
   <input type="text" name="description" value="{{$command->description}}">
   <br>
   <br>
   <input type="submit" value={{ Request::is('*/new') ? 'Добавить' : 'Изменить' }} />
</form> -->

<br />
<div class="">
    <!-- <a href="/control-panel/country"><<< Вернуться к списку статей !!!</a> -->
    <a href={{route('ForecastList')}}><<< Вернуться к списку Прогнозов!!!</a>
</div>

@endsection
