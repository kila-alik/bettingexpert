@extends(env('THEME').'.admin.admin')
@section('content')

<div>
   <h3 align="center">Список Прогнозов</h3>
    <p align="center">
      <a class="btn btn-secondary" href={{route('ForecastEdit1', ['id' => 'new'])}} role="button">Добавить Прогноз</a>
    </p>
     <table width="600" border="1" align="center" style="font-size: 9pt">
         <tbody align="center">
           <tr bgcolor="#c0c0c0">
             <th>№ прогноза</th>
             <th>Платный статус <font size="1">беспл -0, VIP -1, прем -2</font></th>
             <th>В стране</th>
             <th>В чемпионате</th>
             <th>Команда 1</th>
             <th>Команда 2</th>
             <th>Дата и время игры</th>
             <th>Коеффициент</th>
             <th>Победа 1-й команды</th>
             <th>Ничья</th>
             <th>Победа 2-й команды</th>
             <th>Победа 1-й или ничья</th>
             <th>Победа 2-й или ничья</th>
             <th>Описание до фото</th>
             <th>Описание после фото</th>
             <th>Фото</th>
             <th>Результат игры</th>
             <th>Посмотреть подробно</th>
             <th>Изменить</th>
             <th>Удалить</th>
           </tr>

            @if($arSports)
               @foreach($arSports as $akey => $sport)
                 <tr><td colspan="20" align="center" bgcolor="#dbdbdb" style="font-size: 11pt">{{ $sport['name'] }}</td></tr>
                 @foreach($sport['forecasts'] as $fkey => $forecast)
                            <tr>
                               <td>{{$forecast['id']}}</td>
                               <td>{{$forecast['status']}}</td>
                               <td><a href={{route('CountryDetail', ['id' => $forecast->country->id])}}>{{$forecast->country->name}}<a/></td>
                               <td><a href={{route('ChampionshipDetail', ['id' => $forecast->championship->id])}}>{{$forecast->championship->name}}<a/></td>
                               <td><a href={{route('CommandDetail', ['id' => $forecast->command_one->id])}}>{{$forecast->command_one->name}}<a/></td>
                               <td><a href={{route('CommandDetail', ['id' => $forecast->command_two->id])}}>{{$forecast->command_two->name}}<a/></td>
                               <td><font size="1">{!! $forecast->date_game ? \Carbon\Carbon::parse($forecast->date_game)->format('d.m.Y H:i') : ''!!}</font></td>
                               <td>{{$forecast->coeff}}</td>
                               <td>{{$forecast->lwin}}</td>
                               <td>{{$forecast->draw}}</td>
                               <td>{{$forecast->rwin}}</td>
                               <td>{{$forecast->lwdraw}}</td>
                               <td>{{$forecast->rwdraw}}</td>
                               <td>{{str_limit($forecast->text_before, 8)}}</td>
                               <td>{{str_limit($forecast->text_after, 8)}}</td>
                               <td>{{$forecast->foto}}</td>
                               <td>{{$forecast->result}}</td>
                               <td><a href={{route('ForecastDetail', ['id' => $forecast->id])}}>Подробно</a></td>
                               <td><a href={{route('ForecastEdit2', ['id' => $forecast->id])}}><i><b>Изменить</b></i></a></td>
                               <td>
                                 <form action={{route('ForecastDel', ['id' => $forecast->id])}} method="POST">
                                         {{ csrf_field() }}
                                         <input type="submit" value="удалить" />
                                 </form>
                               </td>
                             </tr>
                @endforeach
             @endforeach
          @else
          Прогнозов на данный момент нет!
          @endif
         </tbody>
    </table>

</div>
@endsection
