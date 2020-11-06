@extends(env('THEME').'.admin.admin')
@section('content')

@if($forecast && $champ_mass && $command_mass && count($champ_mass))
@if(empty($forecast->champ_id))
  <h3 align="center">Второй шаг по редактированию НОВОГО Прогноза</h3>
  <br />
  <div class="">
      <a href={{route('ForecastEdit1', ['id' => $forecast->id])}}><<< Вернуться к первому шагу редактирования Прогноза.</a>
  </div>
@else
  <h3 align="center">Редактирование уже ИМЕЮЩЕГОСЯ Прогноза</h3>
@endif
<br />
<form method="POST" action="{{route('ForecastEdit1', ['id' => $forecast->id])}}" enctype="multipart/form-data">
  {{ csrf_field() }}
  <table width="600" border="1" align="center">
      <tbody align="center">
        <tr>
          @if(empty($forecast->champ_id))
            <td colspan="3" align="center" bgcolor="#dbdbdb">Выбранные на первом шаге параметры</td>
          @else
            <td colspan="3" align="center" bgcolor="#dbdbdb">Неизменяемые параметры</td>
          @endif
          <td colspan="7" align="center" bgcolor="#dbdbdb">Выбирете эти параметры</td>
          <td colspan="3" align="center" bgcolor="#dbdbdb">Операции</td>
        </tr>
        <tr bgcolor="#c0c0c0">
          <th>№ прогноза</th>
          <th>Вид спорта</th>
          <th>В стране</th>
          <th>В чемпионате</th>
          <th>Команда 1</th>
          <th>Команда 2</th>
          <th>Дата и время игры</th>
          <th>Коеффициент</th>
          <th>Результат игры</th>
          <th>Платный статус</th>
          <th>Изменить</th>
          <th>Посмотреть подробно</th>
          <th>Удалить</th>
        </tr>
      </tbody>
        <tr>
           <td align="center">{{$forecast->id}}</td>
           @if(empty($forecast->champ_id))
             <td>{{$sport_name}}</td>
           @else
             <td>{{$forecast->championship->sport->name}}</td>
           @endif
           <td align="center">{{$forecast->country->name}}</td>
           <td>{!! Form::select('champ', $champ_mass, empty($forecast->champ_id) ? '1' : $forecast->champ_id) !!}</td>
           <td>{!! Form::select('command1', $command_mass, empty($forecast->command_1) ? '1' : $forecast->command_1) !!}</td>
           <td>{!! Form::select('command2', $command_mass, empty($forecast->command_2) ? '1' : $forecast->command_2) !!}</td>
           <td>{!! Form::date('date_game', empty($forecast->data_game) ? \Carbon\Carbon::now() : \Carbon\Carbon::parse($forecast->data_game)) !!}</td>
           <td>{!! Form::text('coeff', $value = empty($forecast->coeff) ? '' : $forecast->coeff, ['size' => 10]) !!}</td>
           <td><input type="text" name="result" size="6" value="{{empty($forecast->result) ? '' : $forecast->result}}"></td>
           <td><input type="text" name="status" size="6" value="{{$forecast->status == 0 ? '0' : '1'}}"></td>
           <td><input type="submit" value={{ empty($forecast->champ_id) ? 'Добавить' : 'Сохранить' }} /></td>
           <td align="center"><a href={{route('ForecastDetail', ['id' => $forecast->id])}}>Подробно<a/></td>
           <td>
             <form action={{route('ForecastDel', ['id' => $forecast->id])}} method="POST">
                     {{ csrf_field() }}
                     <input type="submit" value="удалить" />
             </form>
           </td>

         </tr>
     </table>
   </form>
@else
<p>Чемпионатов с таким видом спорта: <b>{{$sport_name}}</b>
   и в такой стране: <b>{{$forecast->country->name}}</b> на данный момент в Базе нет!</p>
@endif

    <br />
    <div class="">
        <a href={{route('ForecastList')}}><<< Вернуться к списку Прогнозов!!!</a>
    </div>

@endsection
