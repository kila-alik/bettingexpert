@extends(env('THEME').'.admin.admin')
@section('content')

Вид спорта:
<b>{{$forecasts->championship->sport->name}}</b>
<br />
В Стране:
<b>{{$forecasts->country->name}}</b>
<br />
Чемпионат:
<b>{{$forecasts->championship->name}}</b>
<br />
Команда 1:
<b>{{$forecasts->command_one->name}}</b>
<br />
Команда 2:
<b>{{$forecasts->command_two->name}}</b>
<br />
Коэффициент прогноза:
<b>{{$forecasts->coeff}}</b>
<br />
Коэффициент победы 1-й команды:
<b>{{$forecasts->lwin}}</b>
<br />
Коэффициент ничьи:
<b>{{$forecasts->draw}}</b>
<br />
Коэффициент победы 2-й команды:
<b>{{$forecasts->rwin}}</b>
<br />
Коэффициент Победа 1-й или ничья:
<b>{{$forecasts->lwdraw}}</b>
<br />
Коэффициент Победа 2-й или ничья:
<b>{{$forecasts->rwdraw}}</b>
<br />
Текст до фото:
<b>{{$forecasts->text_before}}</b>
<br />
Текст после фото:
<b>{{$forecasts->text_after}}</b>
<br />
Имя файла картинки:
<b>{{$forecasts->foto}}</b>
<br />
Результат прогноза:
<b>{{$forecasts->result}}</b>
<br />
Статус (бесплатный - 0, VIP - 1, премиум - 2):
<b>{{$forecasts->status}}</b>
<br />
Дата игры:
<b>{!! \Carbon\Carbon::parse($forecasts->date_game)->format('d.m.Y H:i') !!}</b>
<hr noshade align="left" size="2" width="15%">
<br />

<form action={{route('ForecastEdit', ['id' => $forecasts->id])}} method="get" enctype="multipart/form-data">
    {{csrf_field()}}
  <input type="submit" value="Изменить" />
</form>
<br />
<div class="">
    <a href={{route('ForecastList')}}><<< Вернуться к списку Прогнозов !!!</a>
    <!-- <a href="/country"><<< Вернуться к списку СТРАН !!!</a> -->
</div>
<!-- <form action="edit.blade.php">
</form> -->

@endsection
