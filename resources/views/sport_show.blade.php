<section id="spec-inner-page" class="pb-125 pt-100 light">
    <div class="container">
        <div class="row">

            <div class="col-md-5">
                <div class="widget">
                    <img src="{{ asset('images/'.$sort->icon) }}" width="64" title="{{ $sort->name }}" alt="{{ $sort->name }}" class="sortimage inline-block">
                    <h1 class="inline-block font-size-4 vertical-align-super">
                        {{ $sort->name }}
                    </h1>
                    <hr>
                    <p>
                        @if($sort->information)
                            {!! $sort->information !!}
                        @else
                            Информация об этом виде спорта.
                        @endif
                    </p>
                </div>
                <div class="widget">
                    <h3 class="mt-30 font-size-1" style=""><strong>Все виды спорта</strong><strong><strong><br></strong></strong></h3>
                    <ul class="list-group widget border-box padding-box spr-option-copy-del">
                        @if($sorts->count())
                            @foreach($sorts as $v_sort)
                            <li class="list-group-item {{ $v_sort->id==$sort->id ? 'active' : '' }}">
                                <span class="badge">{{ $v_sort->forecasts->count() }}</span>
                                <img src="{{ asset('/images/'.$v_sort->icon) }}" width="16" class="" alt="">
                                <a href="{{ route('sport', $v_sort->alias) }}">{{ $v_sort->name }}</a>
                            </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>

            <div class="col-md-7">
                        <h2 class="mb-40 font-size-1" style=""><strong>Актуальные прогнозы</strong><strong><strong><br></strong></strong></h2>
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
                                <th></th>
                                <th></th>
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
                                            <td><a href="{{ route('forecastWsort', ['sort'=>$forecast->sort->alias,'alias'=>$forecast->alias]) }}"><b>{{ $forecast->match }}</b></a></td>
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
                                                    <a href="{{ route('forecast', ['alias'=>$forecast->alias]) }}"><b>
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
                                                        {{ date_format(date_create($date),'d/m/Y H:i') }}<br />
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
                                                <a href="{{ route('forecast', ['alias'=>$forecast->alias]) }}" class="btn btn-success btn-block">Посмотреть</a>
                                            </td>
                                        @elseif($forecast->paid===1)
                                            <td>
                                                <img src="{{ URL::asset('images/free.png') }}" title="Бесплатно" alt="Бесплатно">
                                            </td>
                                            <td>
                                                <a href="{{ route('forecast', ['alias'=>$forecast->alias]) }}" class="btn btn-success btn-block">Посмотреть</a>
                                            </td>
                                        @else
                                            <td>
                                                {{ $forecast->price }}руб.
                                            </td>
                                            <td>
                                                <form action="{{ route('forecast.buy') }}" method="post" class="mb-0">
                                                    {{ csrf_field() }}
                                                    <button type="submit" name="id" value="{{ $forecast->id }}" class="btn btn-warning btn-block">Купить</button>
                                                </form>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            @endisset
                            </tbody>
                        </table>
                        @if(!$forecasts->count())
                            <h4>На этом виде спорта нет актуалных прогнозов!</h4>
                        @endif

                <h2 class="mt-40 mb-40" style=""><strong>Последние 5 ставок</strong><strong><strong><br></strong></strong></h2>
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
                    @foreach($statistics as $forecast)
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
                @if(!$statistics->count())
                    <h4>На этом виде спорта нет прогнозов!</h4>
                @endif
                <a href="{{ route('fullStatistics') }}" class="btn btn-primary btn-xs">Посмотреть полную статистику <i class="icon icon-arrow-right"></i></a>
            </div>
        </div>
    </div>
    <div class="bg"></div>
</section>
