<header id="header-img-slogan" class="dark pt-100 pb-25 text-left">
    <div class="container">
        <div class="row flex-md-vmiddle">
            <div class="col-md-6 text-center">
                <img src="{{ URL::asset('images/logo-sportprognoz.png') }}" alt="SportPrognoz.pw - Лучшие прогнозы"
                     title="SportPrognoz.pw - Лучшие прогнозы" class="screen">
            </div>
            <div class="col-md-5 col-md-offset-1">
                <h1 class="dark" style="font-size: 35px;"><strong>СТАБИЛЬНЫЙ ЗАРАБОТОК В ИНТЕРНЕТЕ – ЭТО РЕАЛЬНОСТЬ</strong><br></h1>
                <h3>ПРОГНОЗЫ НА СПОРТ ОТ ПРОФЕССИОНАЛОВ НА СЕГОДНЯ<br></h3>
                <p class="mb-25">
                    Надежные ставки на спортивные события от профессиональных аналитиков. Все наши прогнозы обоснованы
                    подробным анализом и предоставляются с понятным объяснением. Высокий процент проходимости и высокие
                    коэффициенты подкреплены прозрачной и честной статистикой.
                </p>
                <ul class="text-icon-list">
                    <li><i class="icon-envelop icon-size-m icon-position-left"></i><span>info@sportprognoz.pw</span>
                    </li>
                    <li><i class="icon-whatsapp icon-size-m icon-position-left"></i><span>+7 963 693-23-78</span></li>
                    <li><i class="online"></i><span>{{ $count_online_users  }} пользователей онлайн</span></li>
                </ul>
                <br>
                <div style="height: 20px; line-height: 20px"></div>
            </div>
        </div>
    </div>
    <div class="bg"></div>
</header>

@if($forecasters->count())
    <section id="our-forecasters" class="pt-50 pb-50 text-center light">
        <div class="container">
            <h2 class="mb-25"><span class="text-uppercase"><strong>Наши Прогнозисты</strong></span></h2>
            <h3 class="mb-75"><em>Профессионализм &amp; уважение</em></h3>
            <div class="row">
                @foreach($forecasters as $forecaster)
                    <div class="col-md-3">
                        <div class="card card-simple">
                            <img class="screen mb-25 forecaster-avatar"
                                 src="{{ asset('/avatars/'.$forecaster->avatar) }}" alt="{{ $forecaster->name }}">
                            <h3 class="mb-10"><strong><a
                                            href="{{ route('forecaster', $forecaster->id) }}">{{ $forecaster->name }}</a></strong>
                            </h3>
                            <h4 class="mb-25"><a
                                        href="{{ route('sport', $sort::find($forecaster->sort_id)->alias) }}">{{ $sort::find($forecaster->sort_id)->name }}</a>
                            </h4>
                            <p class="mb-25">{{ str_limit($forecaster->information, 100) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="bg"></div>
    </section>
@endif

<section id="text-4col" class="light pt-50 pb-0 text-left">
    <div class="container">
        <h2 class="mb-40"><strong>ПРЕМИУМ ПРОГНОЗЫ</strong><strong><strong><br></strong></strong></h2>
        <table class="table table-striped responsive-table">
            <thead>
            <tr>
                <th>Вид</th>
                <th>Спорт</th>
                <th>Игра</th>
                <th>Матч</th>
                <th>Коэфф</th>
                <th>Время</th>
                <th>Стоимость</th>
            </tr>
            </thead>
            <tbody>
            @isset($forecasts)
                @foreach($forecasts as $forecast)
                    <tr>
                        @if($forecast->sort_ord == 0)
                            <td>
                                Ординар
                            </td>
                            <td>
                                <img src="{{ asset('images/'.$forecast->sort->icon) }}" width="18"
                                     alt="{{ $forecast->sort->name }}" title="{{ $forecast->sort->name }}">
                            </td>
                            <td>{{ $forecast->game }}</td>
                            <td>
                                <a href="{{ route('forecastWsort', ['sort'=>$forecast->sort->alias,'alias'=>$forecast->alias]) }}"><b>{{ $forecast->match }}</b></a>
                            </td>
                            <td>{{ $forecast->coeff }}</td>
                            <td>{{ $forecast->date->format('d/m/Y H:i') }}</td>
                        @else
                            <td>
                                Экспресс <a href="#" class="open_this_table"><i class="icon-plus-square"></i></a>
                            </td>
                            <td>
                                <div class="hide_table_td">
                                    @foreach($forecast->express['sort_id'] as $k=>$sort_id)
                                        <img src="{{ URL::asset('images/'.$sort::find($sort_id)->icon) }}" width="16"
                                             alt="{{ $sort::find($sort_id)->name }}"
                                             title="{{ $sort::find($sort_id)->name }}"> <br/>
                                    @endforeach
                                </div>&nbsp;
                            </td>
                            <td>
                                <div class="hide_table_td">
                                    @foreach($forecast->express['game'] as $k=>$game)
                                        <b>{{ $k+1 }}</b>. {{ $game }} <br/>
                                    @endforeach
                                </div>&nbsp;
                            </td>
                            <td>
                                <div class="hide_table_td">
                                    <a href="{{ route('forecast', ['alias'=>$forecast->alias]) }}"><b>
                                            @foreach($forecast->express['match'] as $k=>$match)
                                                {{ $match }} <br/>
                                            @endforeach
                                        </b></a>
                                </div>&nbsp;
                            </td>
                            <td>
                                <div class="hide_table_td">
                                    @foreach($forecast->express['coeff'] as $k=>$coeff)
                                        {{ $coeff }} <br/>
                                    @endforeach
                                </div>
                                <div class="table_coeff_border_none">
                                    @php
                                        $data = 1;
                                        foreach($forecast->express['coeff'] as $item) {
                                            $data *= $item;
                                        }
                                        echo number_format($data, 1);
                                    @endphp
                                </div>
                            </td>
                            <td>
                                <div class="hide_table_td">
                                    @foreach($forecast->express['date'] as $k=>$date)
                                        {{ date_format(date_create($date),'d/m/Y H:i') }}<br/>
                                    @endforeach
                                </div>
                                <div class="hide_date">
                                    {{  date_format(date_create(min($forecast->express['date'])),'d/m/Y H:i') }}
                                </div>
                            </td>
                        @endif

                        @if($forecast->paid==0 && Gate::allows('forecast-show', $forecast))
                            <td>
                                {{ $forecast->price }}руб.
                            </td>
                            <td>
                                <a href="{{ route('forecast', ['alias'=>$forecast->alias]) }}"
                                   class="btn btn-success btn-block">Посмотреть</a>
                            </td>
                        @elseif($forecast->paid===1)
                            <td>
                                <img src="{{ URL::asset('images/free.png') }}" title="Бесплатно" alt="Бесплатно">
                            </td>
                            <td>
                                <a href="{{ route('forecast', ['alias'=>$forecast->alias]) }}"
                                   class="btn btn-success btn-block">Посмотреть</a>
                            </td>
                        @else
                            <td>
                                {{ $forecast->price }}руб.
                            </td>
                            <td>
                                <form action="{{ route('forecast.buy') }}" method="post" class="mb-0">
                                    {{ csrf_field() }}
                                    <button type="submit" name="id" value="{{ $forecast->id }}"
                                            class="btn btn-warning btn-block">Купить
                                    </button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @endforeach
            @endisset
            </tbody>
        </table>
    </div>
    <div class="bg"></div>
</section>
<section id="subscriptions" class="light pt-50 pb-50 text-left">
    <div class="container">
        <h2 class="text-center">Подписки</h2>
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="card card-simple border-box padding-box">
                    <img src="images/stamp-free.png" alt="for free" class="card-stamp">
                    <h3>1 день</h3>
                    <hr>
                    <ul class="text-icon-list inline-block">
                        <li><i class="icon-laptop-phone icon-size-m icon-color"></i><span>1-3 прогноза</span></li>
                        <li><i class="icon-bucket icon-size-m icon-color"></i><span>Ординар-экспресс</span></li>
                        <li><i class="icon-equalizer icon-size-m icon-color"></i><span>Коефф 2</span></li>
                        <li><i class="icon-book2 icon-size-m icon-color"></i><span>Бесплатно замена убытки</span></li>
                        <li><i class="icon-shield-check icon-size-m icon-color"></i><span>%</span></li>
                    </ul>
                    <div class="flex-row-inline">
                        <h2 class="mt-20 mb-20"><strong>899₽.</strong></h2>
                    </div>
                    <form action="{{ route('subscription.buy') }}" method="post" class="mb-0">
                        {{ csrf_field() }}
                        <button type="submit" name="id" value="1" class="btn btn-primary btn-block">Купить</button>
                    </form>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card card-simple border-box padding-box">
                    <img src="images/stamp-beginner.png" alt="best for beginners" class="card-stamp">
                    <h3>7 дней</h3>
                    <hr>
                    <ul class="text-icon-list inline-block">
                        <li><i class="icon-laptop-phone icon-size-m icon-color"></i><span>7-21 прогноза</span></li>
                        <li><i class="icon-bucket icon-size-m icon-color"></i><span>Ординар-экспресс</span></li>
                        <li><i class="icon-equalizer icon-size-m icon-color"></i><span>Коефф 2</span></li>
                        <li><i class="icon-book2 icon-size-m icon-color"></i><span>Бесплатно замена убытки</span></li>
                        <li><i class="icon-shield-check icon-size-m icon-color"></i><span>%</span></li>
                    </ul>
                    <div class="flex-row-inline">
                        <h2 class="mt-20 mb-20"><strong>2799₽.</strong><br></h2>
                    </div>
                    <form action="{{ route('subscription.buy') }}" method="post" class="mb-0">
                        {{ csrf_field() }}
                        <button type="submit" name="id" value="2" class="btn btn-primary btn-block">Купить</button>
                    </form>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card card-simple border-box padding-box">
                    <img src="images/stamp-best.png" alt="king size" class="card-stamp">
                    <h3>14 дней</h3>
                    <hr>
                    <ul class="text-icon-list inline-block">
                        <li><i class="icon-laptop-phone icon-size-m icon-color"></i><span>14-42 прогноза</span></li>
                        <li><i class="icon-bucket icon-size-m icon-color"></i><span>Ординар-экспресс</span></li>
                        <li><i class="icon-equalizer icon-size-m icon-color"></i><span>Коефф 2</span></li>
                        <li><i class="icon-book2 icon-size-m icon-color"></i><span>Бесплатно замена убытки</span></li>
                        <li><i class="icon-shield-check icon-size-m icon-color"></i><span>%</span></li>
                    </ul>
                    <div class="flex-row-inline">
                        <h2 class="mt-20 mb-20"><strong>3899₽.<br></strong></h2>
                    </div>
                    <form action="{{ route('subscription.buy') }}" method="post" class="mb-0">
                        {{ csrf_field() }}
                        <button type="submit" name="id" value="3" class="btn btn-primary btn-block">Купить</button>
                    </form>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card card-simple border-box padding-box">
                    <img src="images/stamp-king.png" alt="king size" class="card-stamp">
                    <h3>30 дней</h3>
                    <hr>
                    <ul class="text-icon-list inline-block">
                        <li><i class="icon-laptop-phone icon-size-m icon-color"></i><span>30-90 прогноза</span></li>
                        <li><i class="icon-bucket icon-size-m icon-color"></i><span>Ординар-экспресс</span></li>
                        <li><i class="icon-equalizer icon-size-m icon-color"></i><span>Коефф 2</span></li>
                        <li><i class="icon-book2 icon-size-m icon-color"></i><span>Бесплатно замена убытки</span></li>
                        <li><i class="icon-shield-check icon-size-m icon-color"></i><span>%</span></li>
                    </ul>
                    <div class="flex-row-inline">
                        <h2 class="mt-20 mb-20"><strong>5799₽.<br></strong></h2>
                    </div>
                    <form action="{{ route('subscription.buy') }}" method="post" class="mb-0">
                        {{ csrf_field() }}
                        <button type="submit" name="id" value="4" class="btn btn-primary btn-block">Купить</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row mt-50">
            <div class="col-md-4">
                <img class="screen" src="{{ URL::asset('images/qiwi.png') }}" alt="Платежная система Qiwi"
                     title="Платежная система Qiwi" width="90">
                <img class="screen" src="{{ URL::asset('images/yandex.png') }}" alt="Платежная система Yandex Dengi"
                     title="Платежная система Yandex Dengi" width="90">
                <img class="screen" src="{{ URL::asset('images/visa-master.png') }}" alt="Платежные системы Visa/Master"
                     title="Платежные системы Visa/Master" width="90">
            </div>
            <div class="col-md-8">
                <p class="small">
                    Вы очень важны для нас, вся полученная информация всегда будет оставаться конфиденциальной. <br />
                    <strong>Если есть проблемы с оплатой, напишите оператору, мы всегда в сети.</strong>
                </p>
            </div>
        </div>
    </div>
    <div class="bg"></div>
</section>
<section id="about-me" class="light pt-50 pb-50 text-left">
    <div class="container">
        <h2 class="mb-50"><strong>О нас</strong></h2>
        <div class="row">
            <div class="col-md-6">
                <h3>О нас</h3>
                <p class="mb-30 text-justify">
                    <b>Точные прогнозы на спорт</b> уже давно стали одним из главных инструментов для организации
                    пассивного дохода. Как правило, прежде чем начать зарабатывать используя сайт договорных матчей, не
                    мало игроков совершают роковые ошибки в погоне за быстрой прибылью, что приводит к мгновенному краху
                    и проигрышу всего банка.
                    Если вы уже успели оказаться в такой незавидной ситуации и больше не желаете совершать таких ошибок,
                    то избежать еще одного провала вы сможете лишь с помощью профессионалов этого дела. Залог успеха
                    любого любителя ставок, это <b>проходимые прогнозы на спорт</b>, проверенные бесплатные консультации
                    по игровой концепции и стратегии, советы по распределению сумм ставок и оценки риска в процентном
                    соотношении.
                    Получать регулярную прибыль используя <b>онлайн прогнозы</b>, можно лишь при условии соблюдения
                    строгой дисциплины и с использованием советов профессионалов.
                </p>
                <a href="{{ route('aboutUs') }}" class="btn btn-primary">Читать полностью</a>
            </div>
            <div class="col-md-6">
                <h3>Наши преимущества</h3>
                <p class="mb-30 text-justify">
                    Профессиональная команда аналитиков нашего сайта постоянно работает в направлении анализа
                    статистики, что дает возможность предоставлять нашим клиентам только самые <b>точные прогнозы на
                        спорт</b>, а все результаты нашей работы подкреплены прозрачной статистикой без выдуманных
                    исходов.
                    Начиная сотрудничество с нами, вы можете быть уверенны в высокой проходимости прогнозов, которые в
                    итоге будут приносить вам стабильную прибыль. В случае, если предоставленный нами прогноз не
                    пройдет, в качестве компенсации вы получите одну или несколько последующих рекомендаций по ставкам
                    совершенно бесплатно.
                    Честность и прозрачность – главное кредо нашей опытной команды, которая не ставит для себя в
                    приоритет собственную прибыль.
                    <b>Надежные прогнозы на спорт</b> – наше приоритетное задание, обязывающее привести наших клиентов к
                    стабильной прибыли.
                </p>
                <a href="{{ route('ourAdvantages') }}" class="btn btn-primary">Читать полностью</a>
            </div>
        </div>
    </div>
    <div class="bg parallax-bg" data-top-bottom="transform:translate3d(0px, 25%, 0px)"
         data-bottom-top="transform:translate3d(0px, -25%, 0px)"></div>
</section>
<section id="statistics" class="light pt-50 pb-50 text-left full-statistics">
    <div class="container">
        <h2 class="mb-40"><strong>Статистика прогнозов<strong><br></strong></strong></h2>

        <div class="row mb-20">
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body text-center">
                        <h3 class="card-title"><i class="icon-stats-bars"></i></h3>
                        <h3>{{ $forecasts_bank_all->count() }}</h3>
                        <p class="card-text">Прогнозов</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body text-center">
                        <h3 class="card-title"><i class="icon-plus2"></i></h3>
                        <h3>{{ $forecasts_bank_all->where('status', 1)->count() }}</h3>
                        <p class="card-text">Выигрыш</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body text-center">
                        <h3 class="card-title"><i class="icon-cube"></i></h3>
                        <h3>{{ $forecasts_bank_all->where('status', 3)->count() }}</h3>
                        <p class="card-text">Возврат</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body text-center">
                        <h3 class="card-title"><i class="icon-minus2"></i></h3>
                        <h3>{{ $forecasts_bank_all->where('status', 2)->count() }}</h3>
                        <p class="card-text">Проигрыш</p>
                    </div>
                </div>
            </div>
            {{--<div class="col-sm-12 mt-25">--}}
                {{--<div class="col-sm-4">--}}
                    {{--<b><i class="icon icon-yelp"></i> Начальный игровой банк։</b> {{ $forecasts_bank['start_money'] }}--}}
                    {{--руб.--}}
                {{--</div>--}}
                {{--<div class="col-sm-4">--}}
                    {{--<b><i class="icon icon-self-timer"></i> Банк в настоящее--}}
                        {{--время։</b> {{ $forecasts_bank['bank_amount'] }}руб.--}}
                {{--</div>--}}
                {{--<div class="col-sm-4">--}}
                    {{--<b><i class="icon icon-star"></i> Прибыль։</b> {{ $forecasts_bank['bank_profit'] }}руб.--}}
                    {{--({{ $forecasts_bank['bank_plus_procent'] }}%)--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
        <div class="container">
            <div class="row ">
                <div class="col-md-12 mb-5">
                    <hr>
                    <div class="absolute-center">
                        <div class="switch-container">
                            <!-- click event fires twice when checkbox is in label -->
                            <input type="checkbox" name="switch" class="switch-checkbox" id="switch-paid-free">
                            <label class="switch-bar" for="switch-paid-free" id="switch">
                                <span class="item item-first"><img src="{{ asset('images/US-dollar-icon.png') }}"
                                                                   alt=""> Платные</span>
                                <div class="switch item">
                                    <div class="switch-label">
                                        <div class="switch-inner"></div>
                                        <div class="switch-switch"></div>
                                    </div>
                                </div>
                                <span class="item item-second">Бесплатные <img src="{{ asset('images/free.png') }}"
                                                                               alt=""></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="paid">
            <table class="table table-striped responsive-table statistics">
            <thead>
            <tr>
                <th>Вид</th>
                <th>Спорт</th>
                <th>Игра</th>
                <th>Матч</th>
                <th>Прогноз</th>
                <th>Коэфф</th>
                <th>Время</th>
                <th>Резултат</th>
                <th>Статус</th>
            </tr>
            </thead>
            <tbody>
            @isset($forecastsPaid)
                @foreach($forecastsPaid as $forecast)
                    <tr>
                        @if($forecast->sort_ord == 0)
                            <td>
                                Ординар
                            </td>
                            <td>
                                <img src="{{ asset('images/'.$forecast->sort->icon) }}" width="18"
                                     alt="{{ $forecast->sort->name }}" title="{{ $forecast->sort->name }}">
                            </td>
                            <td>
                                <a href="{{ route('forecastWsort', ['sort'=>$forecast->sort->alias,'alias'=>$forecast->alias]) }}">{{ $forecast->game }}</a>
                            </td>
                            <td>
                                <a href="{{ route('forecastWsort', ['sort'=>$forecast->sort->alias,'alias'=>$forecast->alias]) }}"><b>{{ $forecast->match }}</b></a>
                            </td>
                            <td>{{ $forecast->forecast }}</td>
                            <td>{{ $forecast->coeff }}</td>
                            <td>{{ $forecast->date->format('d/m/Y H:i') }}</td>
                            <td>
                                @if($forecast->status===1)
                                    <div class="text-c-green">
                                        @elseif($forecast->status===2)
                                            <div class="text-c-red">
                                                @elseif($forecast->status===3)
                                                    <div class="text-c-blue">
                                                        @endif
                                                        {{ $forecast->result }}
                                                    </div>
                            </td>
                            <td>
                                @if($forecast->status===1)
                                    <div class="alert-c-success">Прошел</div>
                                @elseif($forecast->status===2)
                                    <div class="alert-c-danger">Не прошел</div>
                                @elseif($forecast->status===3)
                                    <div class="alert-c-primary">Возврат</div>
                                @endif
                            </td>
                        @else
                            <td>
                                Экспресс <a href="#" class="open_this_table"><i class="icon-plus-square"></i></a>
                            </td>
                            <td>
                                <div class="hide_table_td">
                                    @foreach($forecast->express['sort_id'] as $k=>$sort_id)
                                        <img src="{{ URL::asset('images/'.$sort::find($sort_id)->icon) }}" width="16"
                                             alt="{{ $sort::find($sort_id)->name }}"
                                             title="{{ $sort::find($sort_id)->name }}"> <br/>
                                    @endforeach
                                </div>&nbsp;
                            </td>
                            <td>
                                <div class="hide_table_td">
                                    @foreach($forecast->express['game'] as $k=>$game)
                                        <b>{{ $k+1 }}</b>. {{ $game }} <br/>
                                    @endforeach
                                </div>&nbsp;
                            </td>
                            <td>
                                <div class="hide_table_td">
                                    <a href="{{ route('forecast', ['alias'=>$forecast->alias]) }}"><b>
                                            @foreach($forecast->express['match'] as $k=>$match)
                                                {{ $match }} <br/>
                                            @endforeach
                                        </b></a>
                                </div>&nbsp;
                            </td>
                            <td>
                                <div class="hide_table_td">
                                    @foreach($forecast->express['forecast'] as $k=>$forecast_val)
                                        {{ $forecast_val }} <br/>
                                    @endforeach
                                </div>
                            </td>
                            <td>
                                <div class="hide_table_td">
                                    @foreach($forecast->express['coeff'] as $k=>$coeff)
                                        {{ $coeff }} <br/>
                                    @endforeach
                                </div>
                                <div class="table_coeff_border_none">{{ array_sum($forecast->express['coeff']) }}</div>
                            </td>
                            <td>
                                <div class="hide_table_td">
                                    @foreach($forecast->express['date'] as $k=>$date)
                                        {{ date_format(date_create($date),'d/m/Y H:i') }}<br/>
                                    @endforeach
                                </div>
                                <div class="hide_date">
                                    {{  date_format(date_create(min($forecast->express['date'])),'d/m/Y H:i') }}
                                </div>
                            </td>
                            <td>
                                <div class="hide_table_td">
                                    @foreach($forecast->express['result'] as $k=>$result)
                                        @if($forecast->status===1)
                                            <div class="text-c-green">
                                                @elseif($forecast->status===2)
                                                    <div class="text-c-red">
                                                        @elseif($forecast->status===3)
                                                            <div class="text-c-blue">
                                                                @endif
                                                                {{ $result }}<br/>
                                                            </div>
                                                            @endforeach
                                                    </div>&nbsp;
                            </td>
                            <td>
                                <div class="hide_table_td">
                                    @foreach($forecast->express['result'] as $k=>$result)
                                        @if($result===1)
                                            <div class="alert-c-success">Прошел</div>
                                        @elseif($result===2)
                                            <div class="alert-c-danger">Не прошел</div>
                                        @elseif($result===3)
                                            <div class="alert alert-primary">Возврат</div>
                                        @endif
                                    @endforeach
                                </div>
                                @if($forecast->status===1)
                                    <div class="alert-c-success">Прошел</div>
                                @elseif($forecast->status===2)
                                    <div class="alert-c-danger">Не прошел</div>
                                @elseif($forecast->status===3)
                                    <div class="alert-c-primary">Возврат</div>
                                @endif
                            </td>

                    @endif
                @endforeach
            @endisset
            </tbody>
        </table>
        </div>
        <div  id="free" style="display: none">
            <table class="table table-striped responsive-table statistics">
            <thead>
            <tr>
                <th>Вид</th>
                <th>Спорт</th>
                <th>Игра</th>
                <th>Матч</th>
                <th>Прогноз</th>
                <th>Коэфф</th>
                <th>Время</th>
                <th>Резултат</th>
                <th>Статус</th>
            </tr>
            </thead>
            <tbody>
            @isset($forecastsFree)
                @foreach($forecastsFree as $forecast)
                    <tr>
                        @if($forecast->sort_ord == 0)
                            <td>
                                Ординар
                            </td>
                            <td>
                                <img src="{{ asset('images/'.$forecast->sort->icon) }}" width="18"
                                     alt="{{ $forecast->sort->name }}" title="{{ $forecast->sort->name }}">
                            </td>
                            <td>
                                <a href="{{ route('forecastWsort', ['sort'=>$forecast->sort->alias,'alias'=>$forecast->alias]) }}">{{ $forecast->game }}</a>
                            </td>
                            <td>
                                <a href="{{ route('forecastWsort', ['sort'=>$forecast->sort->alias,'alias'=>$forecast->alias]) }}"><b>{{ $forecast->match }}</b></a>
                            </td>
                            <td>{{ $forecast->forecast }}</td>
                            <td>{{ $forecast->coeff }}</td>
                            <td>{{ $forecast->date->format('d/m/Y H:i') }}</td>
                            <td>
                                @if($forecast->status===1)
                                    <div class="text-c-green">
                                        @elseif($forecast->status===2)
                                            <div class="text-c-red">
                                                @elseif($forecast->status===3)
                                                    <div class="text-c-blue">
                                                        @endif
                                                        {{ $forecast->result }}
                                                    </div>
                            </td>
                            <td>
                                @if($forecast->status===1)
                                    <div class="alert-c-success">Прошел</div>
                                @elseif($forecast->status===2)
                                    <div class="alert-c-danger">Не прошел</div>
                                @elseif($forecast->status===3)
                                    <div class="alert-c-primary">Возврат</div>
                                @endif
                            </td>
                        @else
                            <td>
                                Экспресс <a href="#" class="open_this_table"><i class="icon-plus-square"></i></a>
                            </td>
                            <td>
                                <div class="hide_table_td">
                                    @foreach($forecast->express['sort_id'] as $k=>$sort_id)
                                        <img src="{{ URL::asset('images/'.$sort::find($sort_id)->icon) }}" width="16"
                                             alt="{{ $sort::find($sort_id)->name }}"
                                             title="{{ $sort::find($sort_id)->name }}"> <br/>
                                    @endforeach
                                </div>&nbsp;
                            </td>
                            <td>
                                <div class="hide_table_td">
                                    @foreach($forecast->express['game'] as $k=>$game)
                                        <b>{{ $k+1 }}</b>. {{ $game }} <br/>
                                    @endforeach
                                </div>&nbsp;
                            </td>
                            <td>
                                <div class="hide_table_td">
                                    <a href="{{ route('forecast', ['alias'=>$forecast->alias]) }}"><b>
                                            @foreach($forecast->express['match'] as $k=>$match)
                                                {{ $match }} <br/>
                                            @endforeach
                                        </b></a>
                                </div>&nbsp;
                            </td>
                            <td>
                                <div class="hide_table_td">
                                    @foreach($forecast->express['forecast'] as $k=>$forecast_val)
                                        {{ $forecast_val }} <br/>
                                    @endforeach
                                </div>
                            </td>
                            <td>
                                <div class="hide_table_td">
                                    @foreach($forecast->express['coeff'] as $k=>$coeff)
                                        {{ $coeff }} <br/>
                                    @endforeach
                                </div>
                                <div class="table_coeff_border_none">{{ array_sum($forecast->express['coeff']) }}</div>
                            </td>
                            <td>
                                <div class="hide_table_td">
                                    @foreach($forecast->express['date'] as $k=>$date)
                                        {{ date_format(date_create($date),'d/m/Y H:i') }}<br/>
                                    @endforeach
                                </div>
                                <div class="hide_date">
                                    {{  date_format(date_create(min($forecast->express['date'])),'d/m/Y H:i') }}
                                </div>
                            </td>
                            <td>
                                <div class="hide_table_td">
                                    @foreach($forecast->express['result'] as $k=>$result)
                                        @if($forecast->status===1)
                                            <div class="text-c-green">
                                                @elseif($forecast->status===2)
                                                    <div class="text-c-red">
                                                        @elseif($forecast->status===3)
                                                            <div class="text-c-blue">
                                                                @endif
                                                                {{ $result }}<br/>
                                                            </div>
                                                            @endforeach
                                                    </div>&nbsp;
                            </td>
                            <td>
                                <div class="hide_table_td">
                                    @foreach($forecast->express['result'] as $k=>$result)
                                        @if($result===1)
                                            <div class="alert-c-success">Прошел</div>
                                        @elseif($result===2)
                                            <div class="alert-c-danger">Не прошел</div>
                                        @elseif($result===3)
                                            <div class="alert alert-primary">Возврат</div>
                                        @endif
                                    @endforeach
                                </div>
                                @if($forecast->status===1)
                                    <div class="alert-c-success">Прошел</div>
                                @elseif($forecast->status===2)
                                    <div class="alert-c-danger">Не прошел</div>
                                @elseif($forecast->status===3)
                                    <div class="alert-c-primary">Возврат</div>
                                @endif
                            </td>

                    @endif
                @endforeach
            @endisset
            </tbody>
        </table>
        </div>
        <a href="{{ route('fullStatistics') }}" class="btn btn-primary btn-xs">Посмотреть полную статистику <i
                    class="icon icon-arrow-right"></i></a>
    </div>
    <div class="bg"></div>
</section>