@extends(env('THEME').'.admin.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- <div class="card-header">Dashboard</div> -->
                <div class="card-header">Личный кабинет</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! (Вы <b>{{ Auth::user()->name }}</b> вошли в Ваш личный кабинет!)
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
