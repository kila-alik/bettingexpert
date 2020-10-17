<form method="POST" enctype="multipart/form-data">
   {{ csrf_field() }}
   <b>Название страны:</b>
   <br>
   <input type="text" name="name" value="{{$country->name}}">
   <br>
   <b>$route = {{Route::current()->parameters()}}</b>
   <!-- <b>$route = {{URI::current()}}</b> -->
   <br>
   <!-- <b>$name = {{Route::currentRouteName('CountryEdit')}}</b>
   <br>
   <b>$action = {{Route::currentRouteAction('CountryEdit')}}</b> -->
   <br>
   <input type="submit" value="Изменить" />
</form>

<br />
<div class="">
    <!-- <a href="/control-panel/country"><<< Вернуться к списку статей !!!</a> -->
    <a href={{route('CountryList')}}><<< Вернуться к списку статей !!!</a>
</div>
