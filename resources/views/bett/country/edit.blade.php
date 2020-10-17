@extends(env('THEME').'.admin.admin')
@section('content')

<form method="POST" enctype="multipart/form-data">
   {{ csrf_field() }}
   <b>Название страны:</b>
   <br>
   <input type="text" name="name" value="{{$country->name}}">
   <br>
   <br>
   <input type="submit" value={{ Request::is('*/new') ? 'Добавить' : 'Изменить' }} />
</form>

<br />
<div class="">
    <!-- <a href="/control-panel/country"><<< Вернуться к списку статей !!!</a> -->
    <a href={{route('CountryList')}}><<< Вернуться к списку статей !!!</a>
</div>

@endsection
