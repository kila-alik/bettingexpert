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
   {!! Form::select('sport', $mass_sports, Request::is('*/new') ? '1' : $command->sport->id) !!}
   <br>
   <b>Страна:</b>
   <br>
   {!! Form::select('country', $mass_countrys, Request::is('*/new') ? '1' : $command->country->id) !!}
   <br>
   <br>
   <b>Логотип:</b>
   <br>
   {{ $command->logo ? 'Логотип задан' : 'Задайте Логотип' }}
   <a href="{{ asset(env('THEME')) }}/logos/{{ $command->logo ? $command->logo : 'icon-excl.png' }}">
     <img src="{{ asset(env('THEME')) }}/logos/{{ $command->logo ? $command->logo : 'icon-excl.png' }}" width="150" height="150" alt="flag {{$command->name}}">
   </a>
   <br>
   <b>Папка с логотипами:</b>
   <br>
   {!! Form::select('logo_folder', $mass_logo_folders, Request::is('*/new') ? '1' : pathinfo($command->logo, PATHINFO_DIRNAME)) !!}
   <br>

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
