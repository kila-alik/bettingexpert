@extends(env('THEME').'.admin.admin')
@section('content')

   Для команды: <b>{{$command->name}}</b>
   <br>
   Название Папки с логотипами: <b>{{ $folder }}</b>
   <br>
   <br>
   <b>Текущая картинка: </b>
   <img src="{{ asset(env('THEME')) }}/logos/{{ $command->logo ? $command->logo : 'icon-excl.png'}}" width="150" height="150" alt="Логотип {{ $command->name }}">
   <br>
   <b>Выбирете Логотип:</b>
   <br>

   <form method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}
      <input type="hidden" name="id" value="{{ $command->id }}">
      <input type="hidden" name="folder" value="{{ $folder }}">

       @foreach($mass_logos as $logo)
          <ul>
              <li>
                {!! Form::radio('logoFile', $logo) !!}
                -/-
                <a href="{{ asset(env('THEME')) }}/logos/{{ $folder }}/{{ $logo }}">
                  <img src="{{ asset(env('THEME')) }}/logos/{{ $folder }}/{{ $logo }}" width="150" height="150" alt="">
                </a>
                 <!-- <input type="radio" name="browser" value="ie"> Internet Explorer<Br> -->
               </li>
           </ul>

       @endforeach
       <input type="submit" value={{ Request::is('*/new') ? 'Добавить' : 'Изменить' }} />
       <br>
    </form>

@endsection
