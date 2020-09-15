<section id="desc-text-btn-quartbg" class="pt-150 pb-md-150 light full-statistics">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-50">
               <h1 class="font-size-2-8">Профиль прогнозиста <b>{{ $forecaster->name }}</b></h1>
            </div>
            <div class="col-md-3">
                <div class="thumb-lg member-thumb m-b-10 mx-auto">
                    <img src="{{ $forecaster->avatar ? asset('avatars/'.$forecaster->avatar) : Gravatar::src($forecaster->email, 200) }}" class="rounded-circle img-thumbnail" alt="profile-image">
                </div>
                <p class="mt-10">
                    {{ $forecaster->information }}
                </p>
            </div>
            <div class="col-md-9">
                <h3>Статистика прогнозиста</h3>
                <div class="row mb-50">
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <h2 class="card-title"><i class="icon-stats-bars"></i></h2>
                                <h2>{{ $forecaster->forecastsForecaster->count() }}</h2>
                                <p class="card-text">Прогнозов</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <h2 class="card-title"><i class="icon-plus2"></i></h2>
                                <h2>{{ $forecaster->forecastsForecaster->where('status', 1)->count() }}</h2>
                                <p class="card-text">Выигрыш</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <h2 class="card-title"><i class="icon-cube"></i></h2>
                                <h2>{{ $forecaster->forecastsForecaster->where('status', 3)->count() }}</h2>
                                <p class="card-text">Возврат</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <h2 class="card-title"><i class="icon-minus2"></i></h2>
                                <h2>{{ $forecaster->forecastsForecaster->where('status', 2)->count() }}</h2>
                                <p class="card-text">Проигрыш</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 mt-25">
                        <div class="col-sm-4">
                            <b><i class="icon icon-yelp"></i> Начальный игровой банк։</b> {{ $forecasts_bank['start_money'] }}руб.
                        </div>
                        <div class="col-sm-4">
                            <b><i class="icon icon-self-timer"></i> Банк в настоящее время։</b> {{ $forecasts_bank['bank_amount'] }}руб.
                        </div>
                        <div class="col-sm-4">
                            <b><i class="icon icon-star"></i> Прибыль։</b> {{ $forecasts_bank['bank_profit'] }}руб. ({{ $forecasts_bank['bank_plus_procent'] }}%)
                        </div>
                    </div>
                </div>
                <h3>Последние 5 ставок</h3>
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
                            @foreach($forecaster->forecastsForecaster()->orderby('date', 'DESC')->where('status', '!=', 0)->take(5)->get() as $forecast)
                                <tr>
                                    @if($forecast->sort_ord == 0)
                                        <td>
                                            Ординар
                                        </td>
                                        <td>
                                            <img src="{{ asset('images/'.$forecast->sort->icon) }}" width="18" alt="{{ $forecast->sort->name }}" title="{{ $forecast->sort->name }}">
                                        </td>
                                        <td><a href="{{ route('forecastWsort', ['sort'=>$forecast->sort->alias,'alias'=>$forecast->alias]) }}">{{ $forecast->game }}</a></td>
                                        <td><a href="{{ route('forecastWsort', ['sort'=>$forecast->sort->alias,'alias'=>$forecast->alias]) }}"><b>{{ $forecast->match }}</b></a></td>
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
                                                <a href="{{ route('forecast', ['alias'=>$forecast->alias]) }}"><b>
                                                        @foreach($forecast->express['match'] as $k=>$match)
                                                            {{ $match }} <br />
                                                        @endforeach
                                                    </b></a>
                                            </div>&nbsp;
                                        </td>
                                        <td>
                                            <div class="hide_table_td">
                                                @foreach($forecast->express['forecast'] as $k=>$forecast_val)
                                                    {{ $forecast_val }} <br />
                                                @endforeach
                                            </div>
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
                                                                            {{ $result }}<br />
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
                        </tbody>
                    </table>
                    <a href="{{ route('fullStatistics') }}" class="btn btn-primary btn-xs">Посмотреть полную статистику <i class="icon icon-arrow-right"></i></a>
            </div>
        </div>
    </div>
    <div class="bg"></div>
</section>