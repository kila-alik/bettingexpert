<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>{{ (!empty($title)) ? $title : 'НЕТ TITLE' }}</title>
    <meta name="keywords" content="{{ (!empty($meta_keywords)) ? $meta_keywords : 'прогнозы, спорт, професионал' }}" />
    <meta name="description" content="{{ (!empty($meta_description)) ? $meta_description : 'Надежные ставки на спортивные события от профессиональных аналитиков. Все наши прогнозы обоснованы подробным анализом и предоставляются с понятным объяснением.' }}" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="google-site-verification" content="kwyy7yh1rwAhLRHj_mZg2GgjG3kYx9kstlH2m-PDvNg" />
    <link rel="stylesheet" href="{{ URL::asset('/css/app.css?v=2') }}">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
</head>
<body class="light-page">
<nav id="nav-logo-menu-btn-2" class="navbar navbar-fixed-top light">
    <div class="container">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            <div class="navbar-brand">
                <a href="{{ route('index') }}"><img src="{{ URL::asset('images/logo-nottext.png') }}" height="50" alt="SportPrognoz.pw - Лучшие прогнозы" title="SportPrognoz.pw - Лучшие прогнозы"></a>
            </div>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-left" style="">
                <li class=""><a href="@if(Route::currentRouteName()!='index'){{ route('index') }} @else #wrap @endif" target="_self" class="smooth"><span style="">Главная</span></a></li>
                <li class=""><a href=@if(Route::currentRouteName()!='index')"{{ route('index').'/#about-me' }}" @else "#about-me"  target="_self" class="smooth" @endif><span style="" class="spr-option-textedit-link">О нас</span></a></li>
                <li class=""><a href=@if(Route::currentRouteName()!='index')"{{ route('index').'/#statistics' }}" @else "#statistics"  target="_self" class="smooth" @endif><span style="">Статистика</span></a></li>
                <li class=""><a href="{{ route('guaranteesReliability') }}"><span style="">Гарантии надежности</span></a></li>
                <li class=""><a href="{{ route('reviews') }}"><span style="">Отзывы</span></a></li>
                <li class=""><a href="{{ route('news') }}"><span style="">Новости</span></a></li>
                <li class=""><a href="{{ route('contact') }}"><span style="">Контакты</span></a></li>
            </ul>
            <div class="btn-group navbar-right">

                @guest()
                    <a class="btn-primary btn btn-sm navbar-btn" href="{{ route('register') }}"><span style="">Регистрация</span></a>
                    <a class="btn-link btn btn-sm navbar-btn" href="{{ route('login') }}"><span style="">Вход</span></a>
                @endguest

                @auth()
                    <div class="navbar-brand">
                        @if(Auth::user()->role == 'admin')
                            <a href="{{ route('control-panel') }}" class="btn btn-sm btn-success navbar-btn"><i class="fa fa-dashboard"></i>Панель управления</a>
                        @endif
                        <a class="btn btn-primary btn-sm navbar-btn" href="{{ route('home') }}"><span style="">{{ Auth::user()->name }}</span></a>
                    </div>
                @endauth

            </div>
        </div>

    </div>

    <div class="nav-bg light"></div>
</nav>
<div id="wrap">

    @yield('content')

    <footer id="footer-center-logo" class="dark pt-50 pb-50 text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <span>© Sportprognoz.pw. Все права защищены.</span>
                    <div class="mt-20">
                        <img src="{{ URL::asset('images/logo-nottext.png') }}" alt="SportPrognoz.pw - Лучшие прогнозы" title="SportPrognoz.pw - Лучшие прогнозы"  class="dark">
                        <div class="mt-10"><a href="//www.free-kassa.ru/"><img src="{{ URL::asset('images/freekassa-13.png') }}" alt="Freekassa, платежная система"></a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg parallax-bg skrollable-before" data-top-bottom="transform:translate3d(0px, 25%, 0px)" data-bottom-top="transform:translate3d(0px, -25%, 0px)"></div>
    </footer>
</div>
<div class="modal-container"></div>
<script src="https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js"></script>
<script src="{{ URL::asset('/js/app.js?v=1') }}"></script>
<script src="{{ asset('js/goodshare.min.js') }}"></script>
<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
    (function(){ var widget_id = '5tuxIyIkwL';var d=document;var w=window;function l(){
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
<!-- {/literal} END JIVOSITE CODE -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-117524986-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-117524986-1');
</script>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter48759371 = new Ya.Metrika({
                    id:48759371,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/48759371" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
@yield('scripts')
</body>
</html>