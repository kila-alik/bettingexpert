@extends(env('THEME').'.admin.admin')
@section('content')

<div>
   <h2>Список Стран</h2>
   <p>Заполните и просмотрите список Стран для указания в них Чемпионатов и Игр</p>
    <!-- <p><a class="btn btn-secondary" href="/control-panel/country/edit/new" role="button">Добавить страну</a></p> -->
    <!-- <p><a class="btn btn-secondary" href={{route('CountryEdit', ['id' => 'new'])}} role="button">Добавить Страну</a></p> -->
   @foreach($countrys as $country)
      <ul>
          <li>
            <a href="{{ asset(env('THEME')) }}/flag/{{$country->file}}"><img src="{{ asset(env('THEME')) }}/flag/{{$country->file}}" width="50" height="30" alt="flag {{$country->name}}"></a>
            -/-
              {{$country['id']}} :
              <a href={{route('CountryDetail', ['id' => $country->id])}}><b>{{$country['name']}}</b></a> -/-
            <!-- <table class="fore-bets">
              <tr class="" style="cursor: pointer;">
                <td class="flag" style="background-image: url({{ asset(env('THEME')) }}/flag/{{$country->file}})"></td>
                <td class="title">
                    <a href={{route('CountryDetail', ['id' => $country->id])}}><b>{{$country['name']}}</b></a>
                </td>
              </tr> -/-
            </table> -->
              <a href={{route('CountryEdit', ['id' => $country->id])}}><i>Изменить СТРАНУ</i></a>
          </li>
      </ul>
      <!-- <table> -->
        <!-- <tr class="" style="cursor: pointer;">
          <td class="" style="background-image: url('{{ asset(env('THEME')) }}/flag/{{$country->file}}')"></td>
          <td class="title">
              <a href={{route('CountryDetail', ['id' => $country->id])}}><b>{{$country['name']}}</b></a>
          </td>
        </tr> -/- -->
      <!-- </table> -->
   @endforeach
 </div>

 @endsection
