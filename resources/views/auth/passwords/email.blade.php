<section id="contact-center-form-2" class="pt-250 pb-200 dark text-center">
    <div class="container">
        <h2>Сброс пароля</h2>
        <div class="compressed-box-33">

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form class="contact_form" id="contact-center-form-2-form" method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}


                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" class="spr-text-field form-control" placeholder="Email адрес" name="email" value="{{ old('email') }}" required autofocus >
                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>

                <button type="submit" class="btn btn-block btn-primary"><i class="icon-user-lock icon-position-left icon-size-m"></i>
                    <span class="spr-option-textedit-link">Отправить ссылку сброса пароля</span>
                </button>
            </form>
        </div>
    </div>
    </div>
    <div class="bg"></div>
</section>