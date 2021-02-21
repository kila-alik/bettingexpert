@extends(env('THEME').'.admin.admin')
@section('content')


@if($forecast && $sports && $countrys)
<h3 align="center">Первый шаг по редактированию Прогноза</h3>
<br />
  <form method="POST" action="{{route('ForecastEdit2', ['id' => $forecast->id])}}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <b>Вид спорта</b>
    <br />
        {!! Form::select('sport', $sports, '1') !!}
    <br />
    <br />
    <b>Страна</b>
    <br />
        {!! Form::select('country', $countrys,'1') !!}
    <br />
    <br />
    <input type="submit" value={{ 'Добавить' }} />
    <br />
  </form>
@endif

    <br />
    <div class="">
        <a href={{route('ForecastList')}}><<< Вернуться к списку Прогнозов!!!</a>
    </div>

@endsection
