<section class="pt-150 pb-150 dark text-center">
    <div class="container">
        <h2>Регистрация</h2>
        <div class="mb-20">
            Авторизация через`
            <a href="{{ route('socialLogin', 'vkontakte') }}" class="btn btn-primary" title="ВКонтакте"><i class="icon icon-vk"></i></a>
            <a href="{{ route('socialLogin', 'facebook') }}" class="btn btn-primary" title="Facebook"><i class="icon-facebook"></i></a>
        </div>
        <div class="compressed-box-33">

            <form class="contact_form" id="contact-center-form-2-form" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}


                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <input type="text" class="spr-text-field form-control" placeholder="Имя" name="name" value="{{ old('name') }}" required autofocus >
                    @if ($errors->has('name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="text" class="spr-text-field form-control" placeholder="Email адрес" name="email" value="{{ old('email') }}" required >
                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>


                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" class="spr-text-field form-control" placeholder="Пароль" name="password" value="{{ old('password') }}" required >
                    @if ($errors->has('password'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>

                <div class="form-group">
                    <input type="password" class="spr-text-field form-control" placeholder="Подтвердите Пароль" name="password_confirmation" required >
                </div>

                <button type="submit" data-loading-text="•••" data-complete-text="Completed!" data-reset-text="Try again later..." class="btn btn-block btn-primary"><i class="icon-user-lock icon-position-left icon-size-m"></i><span class="spr-option-textedit-link">Регистрация</span></button>
            </form>
        </div>
    </div>

    <div class="bg"></div>
</section>