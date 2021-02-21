@extends(env('THEME').'.layouts.all')

@section('navigation')
  {!! $navigation !!}
@endsection

@section('baner')
  @include(env('THEME').'.forecast.public.baner')
@endsection

@section('content')
  {!! $content !!}
@endsection

@section('footer')
  @include(env('THEME').'.forecast.public.footer')
@endsection
