@if($arSports)
<div class="clear"></div>
<div class="grid_10" id="day">
    <div class="tabs">
      <div class="tab {{ \Carbon\Carbon::parse($idDataMenu)->format('Y-m-d') == \Carbon\Carbon::now()->format('Y-m-d') ? 'active' : '' }}">
        <div>
          <span>
            <a class="tab-button" href="{{route('IndexSport', ['id' => 0, 'date' => \Carbon\Carbon::now()->format('Y-m-d')])}}">Сегодня</a>
          </span>
        </div>
      </div>
      <div class="tab {{ \Carbon\Carbon::parse($idDataMenu)->format('Y-m-d') == \Carbon\Carbon::now()->addDays(1)->format('Y-m-d') ? 'active' : '' }}">
        <div>
          <span>
            <a class="tab-button" href="{{route('IndexSport', ['id' => 0, 'date' => \Carbon\Carbon::now()->addDays(1)->format('Y-m-d')])}}">Завтра</a>
          </span>
        </div>
      </div>
      <div class="tab {{ \Carbon\Carbon::parse($idDataMenu)->format('Y-m-d') == \Carbon\Carbon::now()->addDays(2)->format('Y-m-d') ? 'active' : '' }}">
        <div>
          <span>
            <a class="tab-button" href="{{route('IndexSport', ['id' => 0, 'date' => \Carbon\Carbon::now()->addDays(2)->format('Y-m-d')])}}">Послезавтра</a>
          </span>
        </div>
      </div>
    </div>


    @foreach($arSports as $akey => $sport)
    <div id="sticky">

    <section class="soccer">
      <div class="follow-wrapper" style="height: 60px;">
        <header class="">
          <h2 class="{{ $sport['alias'] }}">Прогнозы на {{ $sport['name'] }} {{Date::parse($idDataMenu)->format('j F Y г.')}}</h2>
        </header>
      </div>

      <table class="fore-bets">
        <tbody>
          @if ($akey == 1)
              <tr class="statistics ">
                <td class="flag"></td>
                <td colspan="3" class="statistics-info">
                  <span class="statistics-text">Используя VIP прогнозы, за 10 дней Вы могли заработать на футболе<br>
                    <a href="https://web.archive.org/web/20190828062649/https://betfaq.ru/statistic/1/">Статистика</a>
                  </span>
                  <span class="statistics-count">
                    <span class="plus">+</span>
                    <span class="count">1030%</span>
                  </span>
                </td>
              </tr>
          @endif
          <tr class="head">
            <td class="pin">
              <div class="br" style="background-image: url('{{ asset(env('THEME')) }}/img/pimpa.png')"></div>
            </td>
            <td>
              <div class="br">Игра</div>
            </td>
            <td class="coef">
              <div class="br tc">коэфф.</div>
            </td>
            <td>
              <div class="rez">Результат</div>
            </td>
          </tr>

            @foreach($sport['forecasts'] as $fkey => $forecast)

                @if ($fkey == 4 && $akey == 1)
                  <tr class="premium">
                    <td class="flag" style="background-image: url('{{ asset(env('THEME')) }}/img/flag_premium.png')"></td>
                    <td colspan="3" class="premium-info">
                      <span class="premium-text">ПЛАТНЫЙ ПРОГНОЗ ОТ НАШИХ АНАЛИТИКОВ</span>
                      <a onclick="ga('send', 'pageview', '/goal-table-premium'); return true;" href="https://web.archive.org/web/20190828062649/https://betfaq.ru/win/premium/" rel="nofollow" class="premium-btn">КУПИТЬ</a>
                    </td>
                  </tr>
                @endif

                @if ($fkey == 7 && $akey == 1)
                  <tr class="premium">
                      <td class="flag-express" style="background-image: url('{{ asset(env('THEME')) }}/img/express-icon.png')"></td>
                      <td colspan="3" class="express-info">
                          <span class="premium-text">Экспресс с коэффициентом 5! Максимальная прибыль!</span>
                          <a href="https://web.archive.org/web/20190828062649/https://betfaq.ru/vip/buy/realexpress/1/" rel="nofollow" class="express-btn">Получить</a>
                      </td>
                  </tr>
                @endif

                <tr class="" style="cursor: pointer;">
                  <td class="flag" style="background-image: url('{{ MyHalper::flagResize($forecast->country->file, 22, 16) }}')"></td>
                  <!-- {{$forecast->status}} -->
                  <!-- <td class="title vip-event"> -->
                  <td class="title {{$forecast->status > 0 ? $forecast->status == 1 ? "vip-event" : "premium-event" : "free-event"}}">
                    <small>
                      <a href="{{$forecast->country->id}}">{{$forecast->country->name}}</a>
                      - <a href="{{$forecast->championship->id}}">{{$forecast->championship->name}}</a>
                    </small>
                      <a href="{{route('Forecast', ['id' => $forecast->id])}}">
                        <span class="time">{{$forecast->date_game ? Date::parse($forecast->date_game)->format('H:i') : "00:00"}}</span>
                        <span class="fore">Прогноз на матч:  <ins>{{$forecast->command_one->name}} - {{$forecast->command_two->name}}</ins></span>
                      </a>
                  </td>
                  <td class="coeff main-coeff">
                    <a href="#">{{$forecast->status == 0 ? $forecast->coeff : ""}}</a>
                  </td>
                  <td class="result">
                    <a class="eshe _show" href="{{route('Forecast', ['id' => $forecast->id])}}">Читать</a>
                  </td>
                </tr>
          @endforeach

          <tr class="foot">
            <td colspan="4"><a href="{{route('IndexSport', ['id' => $akey, 'date' => $idDataMenu])}}">Все прогнозы на {{ $sport['name'] }}</a></td>
          </tr>
        </tbody>
      </table>
    </section>
  </div>
  @endforeach

  <div class="clear"></div>

  <div class="text_page" style=""></div>

    <!-- <br><div class="yashare-auto-init" data-yasharel10n="ru" data-yasharequickservices="yaru,vkontakte,facebook,twitter,moimir" data-yasharetheme="counter"></div> -->
  <br>
  <div class="clear"></div>
  <div class="clear"></div>
</div>

<!-- // end subscribe popup-->

<script>
    //
    $(function() {
        $('#forebets tr[title]').tooltip({
            offset: [2, -25],
            tipClass: 'tbl-tooltip',
            position: 'center right'
        });

        $('.expandable').on('click', function() {
            if (!$(this).hasClass('expanded')) {
                $(this).toggleClass('expanded');
            }
        });

        if (window.location.hash === '#scroll') {
            $('html, body').animate({
                scrollTop: $('#tabsline').offset().top - 40
            }, 500);
        }
    });
</script>

<div class="grid_4">
	<div class="bannerSideSticky js-bannerSideSticky">
			<div class="sidespot">
			<a onclick="ga('send', 'pageview', '/goal-banner-rb');" target="_blank" rel="nofollow" href="https://web.archive.org/web/20190828062649/https://bookmaker-ratings.ru/kappers/betfaq-ru/"><img src="{{ asset(env('THEME')) }}/img/img_79.jpeg" class="posterside-image" alt="Проверено Рейтингом Букмекеров"></a>		</div>
			<div class="sidespot">
			<a onclick="ga('send', 'pageview', '/goal-banner-5prem');" target="_blank" rel="nofollow" href="https://web.archive.org/web/20190828062649/https://betfaq.ru/no-risk/"><img src="{{ asset(env('THEME')) }}/img/img_68.jpeg" class="posterside-image" alt="5 Премиум прогнозов по цене трёх!"></a>		</div>
	</div><div class="side-selector" style="margin-bottom: 20px">
    <div class="header">Все прогнозы на спорт</div>

          @foreach($arCountrys as $ac => $sport_right)

            <div class="section active">
            <div class="title {{ $sport_right['alias'] }}">{{ $sport_right['name'] }}</div>
            <div class="list">
                <ul>
                @foreach($sport_right['countrys'] as $sr => $country)

                    <li class=" ">
                        <a class="list__link" onclick="return false;" href="#" style="background-image: url('{{ MyHalper::flagResize($country[0]->file, 14, 11)}}')">
                          {{ $country[0]->name }}</a>
                        <ul>
                          <li>
                            <a href="#">
                              {{ $country[2]->name }} ({{ $country[1] }})</a>
                          </li>
                        </ul>
                    </li>

                @endforeach

                  <!-- <li class=" ">
                      <a class="list__link" onclick="return false;" href="https://web.archive.org/web/20190828062649/https://betfaq.ru/football/brazil/" style="background-image: url('{{ asset(env('THEME')) }}/img/945.small.jpg')">
                        Бразилия</a>
                      <ul>
                        <li>
                          <a href="https://web.archive.org/web/20190828062649/https://betfaq.ru/football/brazil/brasileiro-serie-b/">
                            Бразильская Серия В (2)</a>
                        </li>
                      </ul>
                  </li> -->

                </ul>
              <div class="clear"></div>
            </div>
          </div>
        @endforeach

</div>
<div id="fix" class="clear"><!-- --></div>
<script>
    $(document).ready (function (){
        $('.side-selector .section .champions li').on('click', function() {
            if ($(this).hasClass('active')) {
                return;
            }

            $('.side-selector .section .champions li').removeClass('active');
            $(this).closest('.champions li').addClass('active');
        });

        $('.side-selector .section .list li').on('click', function() {
            if ($(this).hasClass('active')) {
                return;
            }

            $('.side-selector .section .list li').removeClass('active');
            $(this).closest('.list li').addClass('active');
        });
    });
</script>	<div class="bannerSideSticky-anchor"></div>
</div>
            </div>
@else
<p>Прогнозов на выбранную дату по выбранному виду спорта в данный момент Нет!!!</p>

@endif
