<div id="page">
  <div id="content" class="container_14">

<nav id="mainmenu" class="nav">
    <ul class="nav-list">
        <li class="nav-list__item nav-list__dropdown">
                        <!-- <span class="nav-list__button _active">Бесплатные прогнозы</span> -->
                        <a href="{{route('home')}}"><span class="nav-list__button _active">Бесплатные прогнозы</span></a>
                        <!-- <a href="{{route('home')}}"><span class="nav-list__text">Бесплатные прогнозы</span></a> -->
            <ul class="nav-list__dropdown-list">
              @foreach(config('settings.sports') as $menukey => $sport)
                  <li class="nav-list__dropdown-item">
                      <a href="{{route('IndexSport', ['id' => $menukey, 'date' => $idDataMenu])}}" class="nav-list__dropdown-button">Прогнозы на {{ $sport }}</a>
                  </li>
              @endforeach
            </ul>
        </li>
        <li class="nav-list__item">
                        <a href="https://web.archive.org/web/20190828062649/https://betfaq.ru/" class="nav-list__button  ">
                <span class="nav-list__text">
                    Премиум прогнозы
                </span>
            </a>
                    </li>
        <li class="nav-list__item ">
                        <a href="#" class="nav-list__button ">Школа ставок</a>
                    </li>
        <li class="nav-list__item">
                        <a href="#" class="nav-list__button">Отзывы</a>
                    </li>
        <li class="nav-list__item ">
                        <a href="#" class="nav-list__button ">Гарантии</a>
                    </li>
    </ul>
</nav>
<div id="mainmenu-holder" style="height: 56px; margin-top: -56px;"></div>
