<section id="contact-center-form-2" class="pt-125 pb-125 dark text-center">
    <div class="container">
        <h2>Обратная связь</h2>
        <h4 class="mb-20">Вы очень важны для нас,
            <br>вся полученная информация всегда будет оставаться конфиденциальной.
        </h4>
        <div class="mb-20">
            <a href="mailto:info@sportprognoz.pw"><i class="icon-envelop"></i> info@sportprognoz.pw </a><br />
        </div>
        <div class="compressed-box-33">
            <form action="{{ route('contact') }}" method="post" class="contact_form" novalidate="novalidate" id="contact-center-form-2-form">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Полное имя" name="name" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="E-mail" name="email" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <textarea class="form-control" rows="6" placeholder="Ваше сообщение или вопрос" name="message">{{ old('message') }}</textarea>
                </div>
                {{ csrf_field() }}
                {!! Captcha::display($attributes=[], $options = ['lang'=> 'ru']) !!}
                <button type="submit" class="btn btn-block btn-primary"><i class="icon-paper-plane icon-position-left icon-size-m"></i><span>Отправить сообщение</span></button>
            </form>
            @if(count($errors->all()) > 0)
                <div class="alert-danger alert">
                    {{ $errors->all()[0] }}
                </div>
            @endif

            @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>
    <div class="bg"></div>
</section>