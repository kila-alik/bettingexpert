@extends(env('THEME').'.admin.admin')
@section('content')
@if($forecast && $champ_mass && $command_mass && count($champ_mass))
    @if(empty($forecast->champ_id))
      <h4 align="center">Второй шаг по редактированию НОВОГО Прогноза</h4>
      <div class="">
          <a href={{route('ForecastEdit1', ['id' => $forecast->id])}}><<< Вернуться к первому шагу редактирования Прогноза.</a>
      </div>
    @else
      <h4 align="center">Редактирование уже ИМЕЮЩЕГОСЯ Прогноза</h4>
    @endif
    <form method="POST" action="{{route('ForecastEdit1', ['id' => $forecast->id])}}" enctype="multipart/form-data">
      {{ csrf_field() }}
      <table width="600" border="1" align="center" style="font-size: 9pt">
          <tbody align="center">
            <tr>
              @if(empty($forecast->champ_id))
                <td colspan="3" align="center" bgcolor="#dbdbdb">Выбранные на первом шаге параметры</td>
              @else
                <td colspan="3" align="center" bgcolor="#dbdbdb">Неизменяемые параметры</td>
              @endif
              <td colspan="5" align="center" bgcolor="#dbdbdb">Выбирете эти параметры</td>
            </tr>
            <tr bgcolor="#c0c0c0">
              <th>№ прогноза</th>
              <th>Вид спорта</th>
              <th>В стране</th>
              <th>В чемпионате</th>
              <th>Команда 1</th>
              <th>Команда 2</th>
              <th>Дата игры</th>
              <th>Время игры</th>
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
               <td>{!! Form::date('date_game', empty($forecast->date_game) ? \Carbon\Carbon::now() : \Carbon\Carbon::parse($forecast->date_game)) !!}</td>
               <td>{!! Form::time('time_game', empty($forecast->date_game) ? \Carbon\Carbon::now()->timezone('Europe/Moscow')->format('H:i') : \Carbon\Carbon::parse($forecast->date_game)->timezone('Europe/Moscow')->format('H:i')) !!}</td>
             </tr>
         </table>
         <br />
         <table width="600" border="1" align="center" style="font-size: 9pt">
             <tbody align="center">
               <tr>
                 <td colspan="11" align="center" bgcolor="#dbdbdb">Выбирете эти параметры</td>
               </tr>
               <tr bgcolor="#c0c0c0">
                 <th>Коеффициент</th>
                 <th>Победа 1-й команды</th>
                 <th>Ничья</th>
                 <th>Победа 2-й команды</th>
                 <th>Победа 1-й или ничья</th>
                 <th>Победа 2-й или ничья</th>
                 <th>Фото</th>
                 <th>Результат игры</th>
                 <th>Платный статус</th>
               </tr>
             </tbody>
               <tr>
                 <td>{!! Form::text('coeff', $value = empty($forecast->coeff) ? '' : $forecast->coeff, ['size' => 10]) !!}</td>
                 <td>{!! Form::text('lwin', $value = empty($forecast->lwin) ? '' : $forecast->lwin, ['size' => 8]) !!}</td>
                 <td>{!! Form::text('draw', $value = empty($forecast->draw) ? '' : $forecast->draw, ['size' => 8]) !!}</td>
                 <td>{!! Form::text('rwin', $value = empty($forecast->rwin) ? '' : $forecast->rwin, ['size' => 8]) !!}</td>
                 <td>{!! Form::text('lwdraw', $value = empty($forecast->lwdraw) ? '' : $forecast->lwdraw, ['size' => 8]) !!}</td>
                 <td>{!! Form::text('rwdraw', $value = empty($forecast->rwdraw) ? '' : $forecast->rwdraw, ['size' => 8]) !!}</td>
                 <td>{!! Form::text('foto', $value = empty($forecast->foto) ? '' : $forecast->foto, ['size' => 20]) !!}</td>
                 <td><input type="text" name="result" size="6" value="{{empty($forecast->result) ? '' : $forecast->result}}"></td>
                 <td><input type="text" name="status" size="6" value="{{$forecast->status == 0 ? '0' : '1'}}"></td>
               </tr>
           </table>

           <br />
           <table width="600" border="1" align="center" style="font-size: 9pt">
               <tbody align="center">
                 <tr>
                   <td colspan="11" align="center" bgcolor="#dbdbdb">Введите текст описания прогноза</td>
                 </tr>
                 <tr bgcolor="#c0c0c0">
                   <th>Описание до фото</th>
                   <th>Описание после фото</th>
                 </tr>
               </tbody>
                 <tr>
                   <td><textarea rows="7" cols="45" name="text_before">{!! empty($forecast->text_before) ? '' : $forecast->text_before !!}</textarea></td>
                   <td><textarea rows="7" cols="45" name="text_after">{!! empty($forecast->text_after) ? '' : $forecast->text_after !!}</textarea></td>
                 </tr>
            </table>

            <br />
            <table width="200" border="1" align="center" style="font-size: 9pt">
               <!-- <tbody align="center"> -->
                 <tr align="center">
                   <th colspan="3" bgcolor="#dbdbdb">Операции</th>
                 </tr>
                 <tr bgcolor="#c0c0c0" align="center">
                   <th>Изменить</th>
                   <th>Посмотреть подробно</th>
                   <th>Удалить</th>
                 </tr>
               <!-- </tbody> -->
                 <tr align="center">
                   <td><input type="submit" value={{ empty($forecast->champ_id) ? 'Добавить' : 'Сохранить' }} /></td>
                   <td align="center">
                     <a href={{route('ForecastDetail', ['id' => $forecast->id])}}>Подробно</a>
                   </td>
                 </form>
                   <td valign="center">
                       <form method="POST" action="{{ route('ForecastDel', ['id' => $forecast->id]) }}">
                         {{ csrf_field() }}
                         <input type="submit" value="Удалить" />
                       </form>
                    </td>
                 </tr>
             </table>

@else
    <p>Чемпионатов с таким видом спорта: <b>{{$sport_name}}</b>
       и в такой стране: <b>{{$forecast->country->name}}</b> на данный момент в Базе нет!
       Внимание!!! Возможно нет ни одной команды в этом виде спорта в Базе!</p>
@endif

    <br />
    <div class="">
        <a href={{route('ForecastList')}}><<< Вернуться к списку Прогнозов!!!</a>
    </div>

@endsection
