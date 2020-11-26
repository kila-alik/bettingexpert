@extends(env('THEME').'.admin.admin')
@section('content')

<form method="POST" enctype="multipart/form-data">
   {{ csrf_field() }}
   <b>Название Чемпионата:</b>
   <br />
   <input type="text" name="name" size="20" value="{{$championship->name}}">
   <br />
   <br />
   <br />
   <b>Вид спорта:</b>
   <br />
     {!! Form::select('sport', $sports, Request::is('*/new') ? '1' : $championship->sport->id) !!}
   <br />
   <b>Страна:</b>
   <br />
   {!! Form::select('country', $countrys, Request::is('*/new') ? '1' : $championship->country->id) !!}
   <br />
   <br />
   <b>Дата начала Чемпионата:</b>
   <br />
   {!! Form::date('date_begin', Request::is('*/new') ? \Carbon\Carbon::now() : \Carbon\Carbon::parse($championship->date_begin)) !!}
   <br />
   <b>Дата окончания Чемпионата:</b>
   <br />
   <!-- {!! Form::date('date_end', \Carbon\Carbon::now()) !!} -->
   {!! Form::date('date_end', Request::is('*/new') ? \Carbon\Carbon::now() : \Carbon\Carbon::parse($championship->date_end)) !!}
   <br />
   <br />

   <input type="submit" value={{ Request::is('*/new') ? 'Добавить' : 'Изменить' }} />
</form>

<br />
<div class="">
    <!-- <a href="/control-panel/country"><<< Вернуться к списку статей !!!</a> -->
    <a href={{route('ChampionshipList')}}><<< Вернуться к списку Чемпионатов !!!</a>
</div>

@endsection
