@extends(env('THEME').'.admin.admin')


@section('content')


<b>Вид Спорта: </b>
{{$sports->name}}
<br />
<hr noshade align="left" size="2" width="15%">
<br />

<form action={{route('SportEdit', ['id' => $sports->id])}} method="get" enctype="multipart/form-data">
    {{csrf_field()}}
  <input type="submit" value="Изменить" />
</form>
<br />
<div class="">
    <a href={{route('SportList')}}><<< Вернуться к списку Видов Спорта !!!</a>
    <!-- <a href="/country"><<< Вернуться к списку СТРАН !!!</a> -->
</div>
<!-- <form action="edit.blade.php">
</form> -->

@endsection
