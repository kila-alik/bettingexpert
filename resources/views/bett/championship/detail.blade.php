@extends(env('THEME').'.admin.admin')


@section('content')

<b>Страна: </b>
{{$countrys->name}}
<hr noshade align="left" size="2" width="15%">

<br />

<form action={{route('CountryEdit', ['id' => $countrys->id])}} method="get" enctype="multipart/form-data">
<!-- <form action="/country/edit/{{$countrys->id}}" method="get" enctype="multipart/form-data"> -->
    {{csrf_field()}}
  <input type="submit" value="Изменить" />
</form>
<br />
<div class="">
    <a href={{route('CountryList')}}><<< Вернуться к списку СТРАН !!!</a>
    <!-- <a href="/country"><<< Вернуться к списку СТРАН !!!</a> -->
</div>
<!-- <form action="edit.blade.php">
</form> -->

@endsection
