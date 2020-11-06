@extends(env('THEME').'.admin.admin')
@section('content')

<form method="POST" enctype="multipart/form-data">
   {{ csrf_field() }}
   <b>Название Команды:</b>
   <br>
   <input type="text" name="name" value="{{$command->name}}">
   <br>
   <b>Вид спорта:</b>
   <br>
   {!! Form::select('sport', $sports, Request::is('*/new') ? '1' : $command->sport->id) !!}
   <br>
   <b>Страна:</b>
   <br>
   {!! Form::select('country', $countrys, Request::is('*/new') ? '1' : $command->country->id) !!}
   <br>
   <b>Описание Команды:</b>
   <br>
   <input type="text" name="description" value="{{$command->description}}">
   <br>
   <br>
   <input type="submit" value={{ Request::is('*/new') ? 'Добавить' : 'Изменить' }} />
</form>

<br />
<div class="">
    <!-- <a href="/control-panel/country"><<< Вернуться к списку статей !!!</a> -->
    <a href={{route('CommandList')}}><<< Вернуться к списку Команд !!!</a>
</div>

@endsection
