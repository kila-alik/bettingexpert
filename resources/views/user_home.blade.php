<section id="benefit-slogan-2col" class="pt-150 pb-150 dark text-left">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2 class=""><strong>{{ Auth::user()->name }}</strong></h2>
                <img src="{{ Gravatar::src(Auth::user()->email, 100) }}" width="100" class="timeline-badge warning avatar" title="{{ Auth::user()->name }}" alt="{{ Auth::user()->name }}">

                <h4 class="">{{ Auth::user()->email }}</h4>
                <h4>Ваш менеджер։ Андрей <i class="icon-skype"></i>(sportprognoz.pw)</h4>
                <form action="{{ route('logout') }}" method="POST">
                    {{ csrf_field() }}
                    <button class="btn-link">Выход</button>
                </form>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12 pb-50">
                        <div class="card card-row">
                            <i class="card-icon icon-size-l icon-laptop-phone icon-color"></i>
                            <div class="card-block">
                                <h3>Мои прогнозы</h3>
                                <table class="table user table-striped responsive-table">
                                    <thead>
                                    <tr>
                                        <th>Вид</th>
                                        <th>Спорт</th>
                                        <th>Игра</th>
                                        <th>Матч</th>
                                        <th>Коэфф</th>
                                        <th>Время</th>
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
                                                        <img src="{{ asset('images/'.$forecast->sort->icon) }}" width="18" alt="{{ $forecast->sort->name }}" title="{{ $forecast->sort->name }}">
                                                    </td>
                                                    <td>{{ $forecast->game }}</td>
                                                    <td><a href="{{ route('forecastWsort', ['sort_ord'=>$forecast->sort_ord==1 ? 'express' : 'ordinar', 'sort'=>$forecast->sort->alias,'alias'=>$forecast->alias]) }}"><b>{{ $forecast->match }}</b></a></td>
                                                    <td>{{ $forecast->coeff }}</td>
                                                    <td>{{ $forecast->date->format('d/m/Y H:i') }}</td>
                                                @else
                                                    <td>
                                                        Экспресс <a href="#" class="open_this_table"><i class="icon-plus-square"></i></a>
                                                    </td>
                                                    <td>
                                                        <div class="hide_table_td">
                                                            @foreach($forecast->express['sort_id'] as $k=>$sort_id)
                                                                <img src="{{ URL::asset('images/'.$sort::find($sort_id)->icon) }}" width="16" alt="{{ $sort::find($sort_id)->name }}" title="{{ $sort::find($sort_id)->name }}"> <br />
                                                            @endforeach
                                                        </div>&nbsp;
                                                    </td>
                                                    <td>
                                                        <div class="hide_table_td">
                                                            @foreach($forecast->express['game'] as $k=>$game)
                                                                <b>{{ $k+1 }}</b>. {{ $game }} <br />
                                                            @endforeach
                                                        </div>&nbsp;
                                                    </td>
                                                    <td>
                                                        <div class="hide_table_td">
                                                            <a href="{{ route('forecast', ['sort_ord'=>$forecast->sort_ord==1 ? 'express' : 'ordinar', 'alias'=>$forecast->alias]) }}"><b>
                                                                    @foreach($forecast->express['match'] as $k=>$match)
                                                                        {{ $match }} <br />
                                                                    @endforeach
                                                                </b></a>
                                                        </div>&nbsp;
                                                    </td>
                                                    <td>
                                                        <div class="hide_table_td">
                                                            @foreach($forecast->express['coeff'] as $k=>$coeff)
                                                                {{ $coeff }} <br />
                                                            @endforeach
                                                        </div>
                                                        <div class="table_coeff_border_none">{{ array_sum($forecast->express['coeff']) }}</div>
                                                    </td>
                                                    <td>
                                                        <div class="hide_table_td">
                                                            @foreach($forecast->express['date'] as $k=>$date)
                                                                {{ date_format(date_create($date),'d/m/Y H:i') }}<br />
                                                            @endforeach
                                                        </div>
                                                        <div class="hide_date">
                                                            {{  date_format(date_create(min($forecast->express['date'])),'d/m/Y H:i') }}
                                                        </div>
                                                    </td>
                                            @endif
                                        @endforeach
                                    @endisset
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 pb-50">
                        <div class="card card-row">
                            <i class="icon-subtract icon-size-l icon-knife icon-color"></i>
                            <div class="card-block">
                                <h3>Мои подписки</h3>
                                @can('subscription-check')
                                    <div class="card card-simple border-box padding-box" style="">
                                        <h3 class="" style="">Осталось {{ $datePast }}</h3>
                                        <hr>
                                        <a class="btn btn-primary btn-block" style="" href="{{ route('index') }}#subscriptions"><span style="">Продлить время</span></a>
                                    </div>
                                @else
                                    У вас нет активных подписок<br />
                                    <a href="{{ route('index') }}#subscriptions" class="btn btn-success">Купить</a>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card card-row">
                            <i class="icon-stats-bars icon-size-l icon-knife icon-color"></i>
                            <div class="card-block">
                                <h3>Статистика</h3>
                                <table class="table user table-striped responsive-table ">
                                    <thead>
                                    <tr>
                                        <th>Вид</th>
                                        <th>Спорт</th>
                                        <th>Игра</th>
                                        <th>Матч</th>
                                        <th>Коэфф</th>
                                        <th>Время</th>
                                        <th>Резултат</th>
                                        <th>Статус</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @isset($forecasts_statistics)
                                        @foreach($forecasts_statistics as $forecast)
                                            <tr>
                                                @if($forecast->sort_ord == 0)
                                                    <td>
                                                        Ординар
                                                    </td>
                                                    <td>
                                                        <img src="{{ asset('images/'.$forecast->sort->icon) }}" width="18" alt="{{ $forecast->sort->name }}" title="{{ $forecast->sort->name }}">
                                                    </td>
                                                    <td>{{ $forecast->game }}</td>
                                                    <td><a href="{{ route('forecastWsort', ['sort_ord'=>$forecast->sort_ord==1 ? 'express' : 'ordinar', 'sort'=>$forecast->sort->alias,'alias'=>$forecast->alias]) }}"><b>{{ $forecast->match }}</b></a></td>
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
                                                                <img src="{{ URL::asset('images/'.$sort::find($sort_id)->icon) }}" width="16" alt="{{ $sort::find($sort_id)->name }}" title="{{ $sort::find($sort_id)->name }}"> <br />
                                                            @endforeach
                                                        </div>&nbsp;
                                                    </td>
                                                    <td>
                                                        <div class="hide_table_td">
                                                            @foreach($forecast->express['game'] as $k=>$game)
                                                                <b>{{ $k+1 }}</b>. {{ $game }} <br />
                                                            @endforeach
                                                        </div>&nbsp;
                                                    </td>
                                                    <td>
                                                        <div class="hide_table_td">
                                                            <a href="{{ route('forecast', ['sort_ord'=>$forecast->sort_ord==1 ? 'express' : 'ordinar', 'alias'=>$forecast->alias]) }}"><b>
                                                                    @foreach($forecast->express['match'] as $k=>$match)
                                                                        {{ $match }} <br />
                                                                    @endforeach
                                                                </b></a>
                                                        </div>&nbsp;
                                                    </td>
                                                    <td>
                                                        <div class="hide_table_td">
                                                            @foreach($forecast->express['coeff'] as $k=>$coeff)
                                                                {{ $coeff }} <br />
                                                            @endforeach
                                                        </div>
                                                        <div class="table_coeff_border_none">{{ array_sum($forecast->express['coeff']) }}</div>
                                                    </td>
                                                    <td>
                                                        <div class="hide_table_td">
                                                            @foreach($forecast->express['date'] as $k=>$date)
                                                                {{ $date }}<br />
                                                            @endforeach
                                                        </div>
                                                        <div class="hide_date">
                                                            25/03/2018 20:30
                                                        </div>
                                                    </td>
                                                    <td>

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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg"></div>
</section>