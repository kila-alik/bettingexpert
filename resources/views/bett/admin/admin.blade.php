<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="ALbert, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <!--<title>Jumbotron Template · Bootstrap</title>-->
    <title>Контрольная панель</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/jumbotron/">

    <!-- <link rel="icon" href="{{ env('THEME') }}/img/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="{{ env('THEME') }}/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="{{ env('THEME') }}/img/favicon.png" type="image/png">
    <link rel="icon" href="{{ env('THEME') }}/img/favicon.svg" type="image/svg+xml"> -->

    <!-- Scripts -->
    <!-- "Это подключение Джава скрипт , чтоб выпадало меню там где область регистрации" -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Bootstrap core CSS -->
<!-- <link href="/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
        .letter1 {
            /*position: relative;*/
            position: absolute;
            right: 600px;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <!-- <link href="jumbotron.css" rel="stylesheet"> -->

<link href="{{ asset('css/app.css') }}" rel="stylesheet">

  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <!-- <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button> -->

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
@can('list-menu')
          <!-- <li class="nav-item active"> -->
          <li class="nav-item">
            <a class="nav-link" href="{{ route('SportList') }}">
              <h4>Вид спорта</h4>
              <!-- <span class="sr-only">(current)</span> -->
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('CountryList') }}"><h4>Страны</h4>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('ChampionshipList') }}"><h4>Чемпионаты</h4></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('CommandList') }}"><h4>Команды</h4></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('ForecastList') }}"><h4>Прогнозы</h4></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('UsersList') }}"><h4>Клиенты</h4></a>
          </li>
      @else
          <li class="nav-item">
            <a class="nav-link" href="{{route('ChangePass', ['id' => Auth::user()->id])}}"><h4>Профиль</h4></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('Deposit', ['id' => Auth::user()->id])}}"><h4>Депозит</h4></a>
          </li>
      @endcan
      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> -->
    </ul>

    <!-- Right Side Of Navbar -->
    <ul class="navbar-nav ml-auto">
      <!-- Authentication Links -->
              @guest
                  <li class="nav-item">
                      <a class="nav-link" href=" route('login') ">{{ __('Login (Войти)') }}</a>
                  </li>
                  @if (Route::has('register'))
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('register') }}">{{ __('Register (Зарегистрироваться)') }}</a>
                      </li>
                  @endif
                  @else
                  <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          <h7>{{ Auth::user()->name }}</h7> <span class="caret"></span>
                      </a>

                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                              <h6>{{ __('Logout (Выйти)') }}</h6>
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                      </div>
                  </li>
              @endguest
      </ul>
<!-- Окно поиска -->
    <!-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> -->
  </div>
</nav>

<div class="clear"></div>
<br />
<br />
<br />
<br />
@yield('content')
</body>
</html>
