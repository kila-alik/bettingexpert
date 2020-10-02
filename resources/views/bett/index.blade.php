@extends(env('THEME').'.layouts.today')

@section('header')
  @include(env('THEME').'.header')
@endsection

@section('navigation')
  {!! $navigation !!}
@endsection

@section('baner')
  @include(env('THEME').'.baner')
@endsection

@section('content')
  <h1> Страница находится в разработке </h1>
@endsection

@section('footer')
  @include(env('THEME').'.footer')
@endsection
