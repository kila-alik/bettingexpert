@extends(env('THEME').'.layouts.tomorrow')

@section('navigation')
    {!! $navigation !!}
@endsection

@section('dva_banera')

    @include(env('THEME').'.dva_banera')

@endsection
