@extends(env('THEME').'.admin.admin')
@section('content')


<h3 align="center">Редактирование Прогноза</h3>

<form method="POST" action="{{route('ForecastEdit1', ['id' => $id])}}" enctype="multipart/form-data">
  {{ csrf_field() }}
  <table width="600" border="1" align="center">
      <tbody align="center">
        <tr>
            <td colspan="3" align="center" bgcolor="#dbdbdb"></td>
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
           <td>
             @if($forecast->id)
               {{$sports}}
             @else
               {!! Form::select('sport', $sports, '1') !!}
             @endif
           </td>
           <td align="center">
             @if($forecast->id)
               {{$countrys}}
             @else
               {!! Form::select('country', $countrys, '1') !!}
             @endif
           </td>
           <td>{!! Form::select('champ', [], '') !!}</td>
           <td>{!! Form::select('command1', [], '') !!}</td>
           <td>{!! Form::select('command2', [], '') !!}</td>
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


    <br />
    <div class="">
        <a href={{route('ForecastList')}}><<< Вернуться к списку Прогнозов!!!</a>
    </div>


<script type="text/javascript">

function getChampsCommandsAjax(sport, country){

  $.get('/control-panel/forecast/getChampsCommandsAjax/' + sport + '/' + country,
    function(data){
      let select = '';
      for (let id in data.champs) {
        select += '<option value="' + id + '">' + data.champs[id] + '</option>'
      }
      $('[name="champ"]').html(select);

      let command1 = $('[name="command1"]');
      let command2 = $('[name="command2"]');
      command1.html('');
      command2.html('');
      for (let id in data.commands) {
         command1.append('<option value="' + id + '">' + data.commands[id] + '</option>');
         command2.append('<option value="' + id + '">' + data.commands[id] + '</option>');
      }

    },
    'json'
  );
}
  $(function(){
    @if($forecast->id)
      getChampsCommandsAjax({{$forecast->championship->sports_id}}, {{$forecast->championship->country_id}});
      // TODO - установить заданные в форекастн значения чемпионата и команд
    @else
      $('[name="sport"],[name="country"]').change(function(){
        let country = $('[name="country"]').val();
        let sport = $('[name="sport"]').val();
        getChampsCommandsAjax(sport, country);
      });
      $('[name="sport"]').change();
    @endif

  // TODO - проверку на неравенство команд
  });
</script>

@endsection
