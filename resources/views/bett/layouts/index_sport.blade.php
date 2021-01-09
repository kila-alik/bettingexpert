@extends(env('THEME').'.layouts.sport')

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
  {!! $content !!}
@endsection

@section('footer')
  @include(env('THEME').'.footer')
@endsection
