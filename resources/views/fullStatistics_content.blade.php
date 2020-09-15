<section id="benefit-2col" class="pt-125 pb-125 text-left light full-statistics">
    <div class="container">
        <h2>Полная статистика {{ date('Y') }} года</h2>
        <h4 class="mb-50">В нашей работе мы стараемся использовать только самые современные, удобные и интересные решения.</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="container">
                    <div class="row mb-25">
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h2 class="card-title"><i class="icon-stats-bars"></i></h2>
                                    <h2>{{ $forecasts->count() }}</h2>
                                    <p class="card-text">Прогнозов</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h2 class="card-title"><i class="icon-plus2"></i></h2>
                                    <h2>{{ $forecasts->where('status', 1)->count() }}</h2>
                                    <p class="card-text">Выигрыш</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h2 class="card-title"><i class="icon-cube"></i></h2>
                                    <h2>{{ $forecasts->where('status', 3)->count() }}</h2>
                                    <p class="card-text">Возврат</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h2 class="card-title"><i class="icon-minus2"></i></h2>
                                    <h2>{{ $forecasts->where('status', 2)->count() }}</h2>
                                    <p class="card-text">Проигрыш</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 mt-25">
                            <div class="col-sm-4">
                                <b><i class="icon icon-yelp"></i> Начальный игровой банк։</b> <br>{{ $forecasts_bank['start_money'] }}руб.
                            </div>
                            <div class="col-sm-4">
                                <b><i class="icon icon-self-timer"></i> Банк в настоящее время։</b> <br>{{ $forecasts_bank['bank_amount'] }}руб.
                            </div>
                            <div class="col-sm-4">
                                <b><i class="icon icon-star"></i> Прибыль։</b> <br>{{ $forecasts_bank['bank_profit'] }}руб. ({{ $forecasts_bank['bank_plus_procent'] }}%)
                            </div>
                        </div>
                    </div>
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
                                        <span class="item item-first"><img src="{{ asset('images/US-dollar-icon.png') }}" alt=""> Платные</span>
                                        <div class="switch item">
                                            <div class="switch-label">
                                                <div class="switch-inner"></div>
                                                <div class="switch-switch"></div>
                                            </div>
                                        </div>
                                        <span class="item item-second">Бесплатные <img src="{{ asset('images/free.png') }}" alt=""></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="paid">
                    @foreach($months as $k=>$month)

                        @if($forecastsPaid->filter(function($forecast) use ($k) {
                                                    return $forecast->date->format('m') == $k;
                                                })->count() > 0)

                        <div class="container container-foreach mb-50">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="#" class="btn statistics_background btn-block open_table">
                                        <i class="icon-position-left pull-left icon-calendar-check icon-size-m"></i>
                                        <span class="spr-option-textedit-link">{{ $month }} {{ $k }}</span>
                                        <i class="icon-position-left icon-arrow-down-square icon-size-m pull-right"></i>
                                    </a>
                                </div>
                                <div class="col-md-12 hide_table">
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
                                        @foreach($forecastsPaid->filter(function($forecast) use ($k) {
                                                    return $forecast->date->format('m') == $k;
                                                })
                                        as $forecast)
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
                                                            <a href="{{ route('forecast', ['sort_ord'=>$forecast->sort_ord==1 ? 'express' : 'ordinar', 'alias'=>$forecast->alias]) }}"><b>
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
                                                                            </div>
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
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
                <div id="free" style="display: none">
                    @foreach($months as $k=>$month)

                        @if($forecastsFree->filter(function($forecast) use ($k) {
                                                    return $forecast->date->format('m') == $k;
                                                })->count() > 0)

                        <div class="container container-foreach mb-50">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="#" class="btn statistics_background btn-block open_table">
                                        <i class="icon-position-left pull-left icon-calendar-check icon-size-m"></i>
                                        <span class="spr-option-textedit-link">{{ $month }} {{ $k }}</span>
                                        <i class="icon-position-left icon-arrow-down-square icon-size-m pull-right"></i>
                                    </a>
                                </div>
                                <div class="col-md-12 hide_table">
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
                                        @foreach($forecastsFree->filter(function($forecast) use ($k) {
                                                    return $forecast->date->format('m') == $k;
                                                })
                                        as $forecast)
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
                                                            <a href="{{ route('forecast', ['sort_ord'=>$forecast->sort_ord==1 ? 'express' : 'ordinar', 'alias'=>$forecast->alias]) }}"><b>
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
                                                                            </div>
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
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="bg"></div>
</section>