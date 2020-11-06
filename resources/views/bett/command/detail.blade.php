@extends(env('THEME').'.admin.admin')


@section('content')

<b>Команды: </b>
{{$commands->name}}
<br />
<b>Вид спорта: </b>
{{ $commands->sport->name }}
<br />
<b>Страна: </b>
{{ $commands->country->name }}
<br />
<b>Описание Команды: </b>
{{$commands->description}}

<hr noshade align="left" size="2" width="15%">

<br />

<form action={{route('CommandEdit', ['id' => $commands->id])}} method="get" enctype="multipart/form-data">
    {{csrf_field()}}
  <input type="submit" value="Изменить" />
</form>
<br />
<div class="">
    <a href={{route('CommandList')}}><<< Вернуться к списку Команды !!!</a>
    <!-- <a href="/country"><<< Вернуться к списку СТРАН !!!</a> -->
</div>
<!-- <form action="edit.blade.php">
</form> -->

@endsection
