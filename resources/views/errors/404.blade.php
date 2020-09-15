<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>404 - Страница не найдена</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <script src="{{ URL::asset('js/fonts.js') }}"></script>
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/p-404.css') }}" />
</head>
<body class="light-page">
<div id="wrap">
    <section id="spec-404" class="pt-100 pb-100 text-center full-height dark flex-vmiddle">
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="">
                    <img src="{{ URL::asset('images/error-404.png') }}" class="screen mb-30" alt="">
                    <h1 class="mb-50" style="">Что-то пошло не так<br></h1>
                    <p class="mb-50" style="">Страница не найдена!</p>
                    <a class="btn btn-default btn-lg smooth" target="_self" style="" href="{{ route('index') }}"><i class="icon-arrow-left icon-position-left"></i><span style="">Вернуться на главную страницу</span></a>
                </div>
            </div>
        </div>
        <div class="bg"></div>
    </section>
</div>
</body>
</html>