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
   <b>Название Вида Спорта:</b>
   <br />
   <input type="text" name="name" value="{{$sport->name}}">
   <br />
   <br />
   <input type="submit" value={{ Request::is('*/new') ? 'Добавить' : 'Изменить' }} />
</form>

<br />
<div class="">
    <!-- <a href="/control-panel/country"><<< Вернуться к списку статей !!!</a> -->
    <a href={{route('SportList')}}><<< Вернуться к списку Видов Спорта!!!</a>
</div>

@endsection
