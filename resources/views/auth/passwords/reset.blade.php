@extends('.layouts.site')

@section('content')
    <section id="contact-center-form-2" class="pt-150 pb-150 dark text-center">
        <div class="container">
            <h2>Сброс пароля</h2>
            <h4 class="mb-50">Для изменения пароля заполните все поля.</h4>
            <div class="compressed-box-33">

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form class="contact_form" id="contact-center-form-2-form" method="POST" action="{{ route('password.request') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="token" value="{{ $token }}">


                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input type="email" class="spr-text-field form-control" placeholder="Email адрес" name="email" value="{{ old('email') }}" required autofocus >
                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>


                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input type="password" class="spr-text-field form-control" placeholder="Пароль" name="password" value="{{ old('password') }}" required autofocus >
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <input type="password" class="spr-text-field form-control" placeholder="Подтверждение пароля" name="password_confirmation" value="" required autofocus >
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-block btn-primary"><i class="icon-database icon-position-left icon-size-m"></i>
                        <span class="spr-option-textedit-link">Сбросить пароль</span>
                    </button>
                </form>
            </div>
        </div>
        </div>
        <div class="bg"></div>
    </section>

@endsection