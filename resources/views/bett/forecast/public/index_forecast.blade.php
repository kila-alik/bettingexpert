@extends(env('THEME').'.layouts.all')

@section('navigation')
  @include(env('THEME').'.layouts.navigation_all')
@endsection

@section('baner')
@endsection

@section('content')
  @include(env('THEME').'.forecast.public.forecast')
@endsection

@section('footer')
  @include(env('THEME').'.forecast.public.footer')
@endsection
