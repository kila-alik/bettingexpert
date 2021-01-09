@extends(env('THEME').'.admin.admin')
@section('content')

<form method="POST" enctype="multipart/form-data">
   {{ csrf_field() }}


   <br />
   <!-- <b>Вид спорта:</b>
   <p><select size="1" name="sports">
     <option selected value="Футбол">Футбол</option>
     <option value="Хоккей">Хоккей</option>
     <option value="Баскетбол">Баскетбол</option>
     <option value="Волейбол">Волейбол</option>
     <option value="Теннис">Теннис</option>
   </select></p> -->
   <b>Название Страны:</b>
   <br />
   <input type="text" name="name" value="{{$country->name}}">
   <br />
   <hr noshade align="left" size="2" width="15%">
   <b>Флаг:  </b>
   <img src="{{ asset(env('THEME')) }}/flag/{{$country->file}}" width="80" height="45" alt="flag {{$country->name}}">
   <hr noshade align="left" size="2" width="15%">
   <br />
   <input type="submit" value={{ Request::is('*/new') ? 'Добавить' : 'Изменить' }} />
</form>

<br />
<div class="">
    <!-- <a href="/control-panel/country"><<< Вернуться к списку статей !!!</a> -->
    <a href={{route('CountryList')}}><<< Вернуться к списку Стран !!!</a>
</div>

@endsection
