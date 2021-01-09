@extends(env('THEME').'.admin.admin')
@section('content')

<div>
   <h3 align="center">Список Прогнозов</h3>
    <p align="center">
      <a class="btn btn-secondary" href={{route('ForecastEdit1', ['id' => 'new'])}} role="button">Добавить Прогноз</a>
    </p>
     <table width="600" border="1" align="center">
         <tbody align="center">
           <tr bgcolor="#c0c0c0">
             <th>№ прогноза</th>
             <th>Платный статус</th>
             <th>В стране</th>
             <th>В чемпионате</th>
             <th>Команда 1</th>
             <th>Команда 2</th>
             <th><font size="1">Дата и время игры</font></th>
             <th>Коеффициент</th>
             <th>Результат игры</th>
             <th>Посмотреть подробно</th>
             <th>Изменить</th>
             <th>Удалить</th>
           </tr>

            @if($arSports)
               @foreach($arSports as $akey => $sport)
                 <tr><td colspan="12" align="center" bgcolor="#dbdbdb">{{ $sport['name'] }}</td></tr>
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
