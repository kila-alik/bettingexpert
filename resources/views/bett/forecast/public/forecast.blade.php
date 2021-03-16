<div class="grid_14">
  <div class="bc">
    <a href="{{route('home')}}">Главная</a>
    <a href="{{route('IndexSport', ['id' => $forecast->championship->sport->id, 'date' => $idDataMenu])}}">{{$forecast->championship->sport->name}}</a>
    <a href="#">{{$forecast->country->name}}</a>
    <a href="#">{{$forecast->championship->name}}</a>
  </div>
</div>
<div class="grid_14">
  <h1>Прогноз на матч:  {{$forecast->command_one->name}} - {{$forecast->command_two->name}}</h1>
    <h2 class="start">{{Date::parse($forecast->date_game)->format('d.m.Y H:i')}}, {{$forecast->championship->name}}</h2>
</div>

<div class="clear"></div>

<script type="text/javascript">
  var clock;
  $(document).ready(function() {
    var dt = "{!! \Carbon\Carbon::parse($forecast->date_game) !!}"; //Дата матча из прогноза
    var dt_date = new Date(dt); //Переводит в формат классна Date
    var now_date = Date.now(); //текущая дата в формате класса Date
    var raznica = dt_date - now_date; // разница В МИЛЛИСЕКУНДАХ
    raznica /=1000; //разница В СЕКУНДАХ
    raznica = (raznica > 0) ? raznica : 0;

    clock = $('.clock').FlipClock(raznica, {
      clockFace: 'DailyCounter',
      language: 'ru',
      countdown: true,
      autoStart: true,
      callbacks: {
        stop: function() {
          // $('.clockmessage').html('The clock has stopped!');
          $('.clock').css('display', 'none');
          $('.res').css('display', 'block');
          $('.marker').css('display', 'block');
          $('.loss').css('display', 'block');
        }
       }
    });
    if (raznica == 0) {
      clock.stop();
    }
    // clock.setTime(raznica); //Устанавливаем нужное время в секундах
    // clock.setCountdown(true); //Устанавливаем отсчет времени назад
    // clock.start();//Запускаем отсчет
  });
</script>

<div class="grid_10">
  <div class="gray-bg">

    <div class="clock" style="padding-left: 3%;"></div>
    <div class="prognoz {{$forecast->status > 0 ? $forecast->status == 1 ? "vip" : "premium" : ""}}">
      <div class="teams">
        <div class="res" style="display: none">{{ MyHalper::tablo($forecast->result) }}</div>

        <!-- <div class="clockmessage"></div> -->

        <div class="loss" style="display: none">Прогноз не сбылся</div>
        <div class="team1 " style="background-image: url('{{ MyHalper::flag_logoResize('logos', $forecast->command_one->logo, 120, 120) }}')">
          <div class="title opensans">{{$forecast->command_one->name}}</div>
          @if (MyHalper::resultGame($forecast->result) > 0)
            <div class="marker" style="display: none">Победа </div>
          @endif
        </div>
        <div class="team2 " style="background-image: url('{{ MyHalper::flag_logoResize('logos', $forecast->command_two->logo, 120, 120) }}')">
          <div class="title opensans">{{$forecast->command_two->name}}</div>
          @if (MyHalper::resultGame($forecast->result) < 0)
            <div class="marker" style="display: none">Победа </div>
          @endif
        </div>
        <div class="var lwin {{MyHalper::resultGame($forecast->result)>0 && MyHalper::timeOn(\Carbon\Carbon::parse($forecast->date_game)) ? 'active' : ''}}">Победа 1.91</div>
        <div class="var draw {{MyHalper::resultGame($forecast->result)==0 ? 'active' : ''}}">Ничья 3.5</div>
        <div class="var rwin {{MyHalper::resultGame($forecast->result)<0 ? 'active' : ''}}">Победа 4.75</div>
        <div class="var lwdraw {{MyHalper::resultGame($forecast->result)>=0 ? 'active' : ''}}">Победа или ничья 1.22</div>
        <div class="var rwdraw {{MyHalper::resultGame($forecast->result)<=0 ? 'active' : ''}}">Победа или ничья 2.05</div>
      </div>
      <!-- <link rel="stylesheet" type="text/css" href="./КАРДИФФ(КАРДИФФ) - ЛИДС(ЛИДС) подробный аналитический прогноз на футбольный матч 08.03.2016 22_45_files/popupform.css"> -->
      <!-- <div id="regform" class="dialog5s">
          <a href="https://web.archive.org/web/20160328113328/http://betfaq.ru/football/england/championship/vip-prognoz-na-match-kardiff-lids-08-03-2016/" class="close"><!-- --></a>
          <!-- форма регистрации -->
          <!-- <div class="body">
            <div class="screen" tag="1">
              <form method="POST" id="login-mini-form" data-goal="CLICKREGMAINFORMPROGNOSE" onsubmit="User_Service.index (this);return false;">
                <h2>Зарегистрируйтесь в один клик и получите бесплатный доступ к <br> более 50 прогнозам каждый день</h2>
                <div class="inputs">
                  <input type="text" required="required" name="email" placeholder="Ваш логин">
                </div>
                <label class="input-checkbox">
                  <input class="u_a" type="checkbox" name="agreed">
                    <span>Я принимаю <a target="_blank" href="https://web.archive.org/web/20160328113328/http://betfaq.ru/oferta/">условия соглашения</a>
                    и <br>
                    <a target="_blank" href="https://web.archive.org/web/20160328113328/http://betfaq.ru/mailpolicy/" style="position: absolute">Правила политики email и sms уведомлений</a>.</span>
                </label>
                <button type="submit">Зарегистрироваться</button>
                <div class="label-network">Войти через:</div>
                <div style="position:absolute; margin-top: 50px; margin-left: 25px">
                <button type="button" class="button-vk" style="margin-top: 5px" onclick="location.href=&#39;https://web.archive.org/web/20160328113328/https://oauth.vk.com/authorize?client_id=5041736&amp;display=page&amp;redirect_uri=http://betfaq.com/user/auth/vk/&amp;scope=email&amp;response_type=code&amp;v=5.37&#39;">Вконтакте</button>
                <button type="button" class="button-ok" style="margin-top: 5px; padding-left:12px" onclick="location.href=&#39;https://web.archive.org/web/20160328113328/http://www.odnoklassniki.ru/oauth/authorize?redirect_uri=https://ecom.betfaq.ru/user/auth/ok/&amp;client_id=1237398528&amp;response_type=code&amp;scope=GET_EMAIL&#39;">Одноклассники</button>
                </div>
                <span class="res-text"></span>
              </form>
            </div>
          </div> -->
          <div class="description">
            <div class="simple-test">
              <h3 class="strong">Наш прогноз и ставка на матч {{$forecast->command_one->name}} - {{$forecast->command_two->name}}</h3>
              <p id="prognose-text"></p>
              <p style="text-align: justify;">{!!$forecast->text_before!!}</p>
              <p style="text-align: justify;">
                <img src="{{asset(env('THEME'))}}/foto/{{$forecast->foto}}" alt="">
              </p>
              <p style="text-align: justify;">{{$forecast->text_after}}</p>

                      <p style="text-align: justify;">Предполагаемый счет поединка: 2:1 (кф. 8.7) </p>
                      <p>&nbsp;</p><p></p>
                    </div>

                    <!-- <div style="margin-bottom: 20px; margin-top:20px;">
                      <a href="https://web.archive.org/web/20160328113328/http://betfaq.ru/premium/free/">
                        <img style="min-width: 680px !important; min-height: 100px; margin-left: -20px !important" src="./КАРДИФФ(КАРДИФФ) - ЛИДС(ЛИДС) подробный аналитический прогноз на футбольный матч 08.03.2016 22_45_files/url_2565.png">
                      </a>
                    </div> -->

                    <div class="clear"></div>

                  </div>
      </div>
      <script>
      $(document).ready (function (){
      function setupInputs() {
      if ($('.input-checkbox input').length) {
          $('.input-checkbox').each(function() {
              $(this).closest('label').removeClass('on');
          });

          $('.input-checkbox input:checked').each(function() {
              $(this).closest('label').removeClass('invalid').addClass('on');
          });
      }

      if ($('.input-radio input').length) {
          $('.input-radio').each(function() {
              $(this).closest('label').removeClass('on');
          });

          $('.input-radio input:checked').each(function() {
              $(this).closest('label').removeClass('invalid').addClass('on');
          });
      }
      }

      setupInputs();
      $('.input-radio, .input-checkbox').on('click', function() {
      setupInputs();
      });
      });
      </script>

    </div>
  </div>

<script>
  $(window).load(function() {
  $('.reg-mini-popup').show();
  // до конца дня
  var prognoseUrl = 'VIP'.toLowerCase();
  if (prognoseUrl != 'vip') {
  Controller_Statistic.updateHostCount(prognoseUrl);
  }
  });
</script>

<!-- <script src="./КАРДИФФ(КАРДИФФ) - ЛИДС(ЛИДС) подробный аналитический прогноз на футбольный матч 08.03.2016 22_45_files/flipclock.js.Без названия"></script> -->
<!-- <script src="./КАРДИФФ(КАРДИФФ) - ЛИДС(ЛИДС) подробный аналитический прогноз на футбольный матч 08.03.2016 22_45_files/countdown.js.Без названия"></script> -->

<!-- <script>

  $(function() {

  $('.last-games ul li').tooltip({
  offset: [3, -2],
  tipClass: 'tooltip2',
  position: 'top center'
  });

  var clock = $('#clock').FlipClock(3600, {
  countdown: true,
          language: 'ru'
    });

  clock.setTime(0);

  });

  $(function() {

  $('.countdown').each(function() {
  var em = $(this),
  time = parseInt (em.attr ('data-time')) * 1000;
  em.text('');
  em.countdown(time, function(e) {
  $(this).html(e.strftime(e.strftime((e.offset.totalDays * 24 + e.offset.hours) + ':%M:%S')));
  });
  });
  });
</script> -->


<div class="grid_4">
  <div class="banner-place inner">
    <a onclick="yaCounter25054244.reachGoal('prembanner'); location.href='#';" href="javascript:void(0);">
      <img src="{{asset(env('THEME'))}}/img/imgo.jpg">
    </a>
    <div class="text-over-banner">28.03</div>
  </div>
  <div class="sideblock brown" id="vip-block">
    <div class="title">
      Гарантированные <span>прогнозы</span>
    </div>

    <div class="block">
      <span>Прогноз на матч</span>
      <a href="#"><span>28 мар 15:45</span> Уимблдон - Портсмут</a>
    </div>
    <div class="block">
      <span>Прогноз на матч</span>
      <a href="#"><span>28 мар 19:00</span> Агнежка Радванска - Тими Бащински</a>
    </div>
    <div class="block">
      <span>Прогноз на матч</span>
      <a href="#"><span>28 мар 22:45</span> Северная Ирландия - Словения</a>
    </div>
    <div class="block">
      <span>Прогноз на матч</span>
      <a href="#"><span>29 мар 18:30</span> Иран - Оман</a>
    </div>
  </div>

  <!-- <script src="./КАРДИФФ(КАРДИФФ) - ЛИДС(ЛИДС) подробный аналитический прогноз на футбольный матч 08.03.2016 22_45_files/knob.js.Без названия"></script> -->
  <script>
    function processVIPBlock() {
    var top = $(window).scrollTop() - 350;
    // высота h1 прогодны на сегодня
    var screenHeight = $('#screen2').height();
    // высота h1 прогодны на сегодня
    var fixHeight = $('#fix').position().top;
    if ($('#fix').length > 0) {
    if (top > $('#fix').position().top && !$('#vip-block').hasClass('animation')) {
    $('#vip-block').addClass('animation').hide().fadeIn();
    } else if (top < fixHeight) {
       $('#vip-block').removeClass('animation').show();
    }

    if ($('#vip-block').position().top + 300 > screenHeight) {
    $('#vip-block').addClass('animation').hide();
    }
    }
    }

    $(function() {
    $(window).scroll(function() {
    // processVIPBlock();
    });
    });
  </script>
</div>
