@extends(env('THEME').'.admin.admin')


@section('content')

<b>Чемпионат: </b>
<br />
{{$championships->name}}
<br />
<br />
<b>Вид спорта:</b>
<br />
{{ $championships->sport->name }}
<br />
<br />
<b>Страна:</b>
<br />
{{ $championships->country->name }}
<br />
<br />
<b>Дата начала Чемпионата:</b>
<br />
{!! \Carbon\Carbon::parse($championships->date_begin)->format('d F Y \a\t H:i') !!}
<!-- {!!('F d, Y \a\t H:i') !!} -->
<!-- {!!('d.m.Y') !!} -->
<br />
<br />
<b>Дата окончания Чемпионата:</b>
<br />
{!! \Carbon\Carbon::parse($championships->date_end)->format('d F Y \a\t H:i') !!}
<br />

<hr noshade align="left" size="2" width="15%">

<br />

<form action={{route('ChampionshipEdit', ['id' => $championships->id])}} method="get" enctype="multipart/form-data">
    {{csrf_field()}}
  <input type="submit" value="Изменить" />
</form>
<br />
<div class="">
    <a href={{route('ChampionshipList')}}><<< Вернуться к списку Чемпионатов !!!</a>
    <!-- <a href="/country"><<< Вернуться к списку СТРАН !!!</a> -->
</div>
<!-- <form action="edit.blade.php">
</form> -->

@endsection
