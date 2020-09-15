<section id="benefit-slogan-2col" class="pt-100 pb-150 dark text-left">
    <div class="container">
        <div class="row">
            <div class="col-md-12 pb-30">
                <ul class="breadcrumb">
                    <li><a href="{{ route('index') }}">Главная</a></li>
                    <li><a href="{{ route('sort', $forecast->sort_ord==0 ? 'ordinar' : 'express') }}">{{ $forecast->sort_ord==0 ? 'Ординар' : 'Экспресс ' }}</a></li>
                    @if($forecast->sort_ord == 0)
                        <li><a href="{{ route('sport', $forecast->sort->alias) }}">{{ $forecast->sort->name }}</a></li>
                        <li class="active">{{ $forecast->match }}</li>
                    @endif
                </ul>
            </div>

            <div class="col-md-12 mb-50">
                <h1 class="font-size-2-8">@if($forecast->sort_ord===0)Прогнозы на {{ mb_strtolower($forecast->sort->name) }}, {{ $forecast->match }}@elseЭкспресс ставки и прогнозы на спорт@endif</h1>
            </div>


            <div class="col-md-4">
                @if($forecast->sort_ord==0)
                    <img src="{{ asset('images/'.$forecast->sort->icon) }}" width="64" title="{{ $forecast->sort->name }}" alt="{{ $forecast->sort->name }}" class="sortimage inline-block">
                    <h2 class="inline-block font-size-4 vertical-align-super ">
                        {{ $forecast->sort->name }}
                    </h2>
                @else
                    <h2 class="sortimage text-center">Экспресс</h2>
                @endif

                @if($forecast->status===1)
                    <div class="alert-c-success mb-20">Прошел</div>
                @elseif($forecast->status===2)
                    <div class="alert-c-danger mb-20">Не прошел</div>
                @elseif($forecast->status===3)
                    <div class="alert-c-primary mb-20">Возврат</div>
                @endif
                <div class="col-md-12">
                    <strong>Прогнозист: </strong> <a href="{{ route('forecaster', $forecast->forecaster->id) }}"><u>{{ $forecast->forecaster->name }}</u></a><hr />
                    <p class="word-wrap">{{ str_limit($forecast->forecaster->information, 100) }}</p>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12 pb-50">
                        @if($forecast->sort_ord == 0)
                            <div class="teams">
                                <div class="vs-block" data-separator-text="vs">
                                    <div class="sides">
                                        {{ explode('-', $forecast->match)[0] }}
                                    </div>
                                    <div class="sides">
                                        {{ explode('-', $forecast->match)[1] }}
                                    </div>
                                    <div class="clear-both"></div>
                                </div>
                            </div>
                        @endif

                        <ul class="doted-space-list">
                            <li>
                                <i class="icon-clock"></i>
                                <div class="left">
                                    Время
                                </div>
                                <!-- Dots -->
                                <div class="dots"></div>
                                <div class="right">
                                    {{ $forecast->date->format('d/m/Y H:i')  }}
                                </div>
                            </li>
                            <li>
                                <i class="icon-trophy3"></i>
                                <div class="left">
                                    Турнир
                                </div>
                                <!-- Dots -->
                                <div class="dots"></div>
                                <div class="right">
                                    @if($forecast->sort_ord == 1)
                                        ЭКСПРЕСС
                                    @else
                                        {{ $forecast->game }}
                                    @endif
                                </div>
                            </li>
                            <li>
                                <i class="icon-stats-bars"></i>
                                <div class="left">
                                    Коеф
                                </div>
                                <!-- Dots -->
                                <div class="dots"></div>
                                <div class="right">
                                    @if($forecast->sort_ord == 0)
                                        {{ $forecast->coeff }}
                                    @else
                                        @php
                                            $data = 1;
                                            foreach($forecast->express['coeff'] as $item) {
                                                $data *= $item;
                                            }
                                            echo number_format($data, 1);
                                        @endphp
                                    @endif
                                </div>
                            </li>
                            <li>
                                <i class="icon-hammer22"></i>
                                <div class="left">
                                    Цена
                                </div>
                                <!-- Dots -->
                                <div class="dots"></div>
                                <div class="right">
                                    @if($forecast->paid === 1)
                                        <img src="{{ URL::asset('images/free.png') }}" title="Бесплатно" alt="Бесплатно">
                                    @else
                                        {{ $forecast->price }}руб
                                    @endif

                                </div>
                            </li>
                            @if($forecast->status===0)
                            <li>
                                <i class="icon-timer"></i>
                                <div class="left">
                                    Начало матча через
                                </div>
                                <!-- Dots -->
                                <div class="dots"></div>
                                <div class="right">
                                    <div id="clock" data-date="{{ $forecast->date->format('Y/m/d H:i') }} GMT+03:00"></div>
                                </div>
                            </li>
                            @endif
                        </ul>

                        <div class="forecast_show mt-75">
                            @if (Gate::allows('forecast-show', $forecast) || $forecast->status != 0)
                                @if($forecast->sort_ord === 0)
                                    <div class="forecast ordinar">
                                        <b>Прогноз:</b> {{ $forecast->forecast }}
                                        @if($forecast->status != 0)
                                            <div class="pull-right">
                                                <b>Результат:</b> {{ $forecast->result }}
                                            </div>
                                        @endif
                                    </div>
                                @else

                                    <div class="forecast express">
                                        <table id="datatable" class="table forecasts">
                                            <thead>
                                            <tr>
                                                <th>Вид</th>
                                                <th>Игра</th>
                                                <th>Матч</th>
                                                <th>Коэфф</th>
                                                <th>Время</th>
                                                <th>Прогноз</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($forecast->express['sort_id'] as $k=>$express)
                                                <tr>
                                                    <td>
                                                        <img src="{{ URL::asset('images/'.$sort::find($forecast->express['sort_id'][$k])->icon) }}" title="{{ $sort::find($forecast->express['sort_id'][$k])->name }}" class="sortimage" height="42" alt="{{ $sort::find($forecast->express['sort_id'][$k])->name }}">
                                                    </td>
                                                    <td>
                                                        {{ $forecast->express['game'][$k] }}
                                                    </td>
                                                    <td>
                                                        {{ $forecast->express['match'][$k] }}
                                                    </td>
                                                    <td>
                                                        {{ $forecast->express['coeff'][$k] }}
                                                    </td>
                                                    <td>
                                                        {{ date_format(date_create($forecast->express['date'][$k]),'d/m/Y H:i') }}
                                                    </td>
                                                    <td>
                                                        {{ $forecast->express['forecast'][$k] }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                            @elseif(Auth::check())
                                <h3>Для просмотра прогноза пожалуйста, с начало купите прогноз.
                                    <form action="{{ route('forecast.buy') }}" method="post" class="mb-0">
                                        {{ csrf_field() }}
                                        <button type="submit" name="id" value="{{ $forecast->id }}" class="btn btn-success">Купить</button>
                                    </form>
                                </h3>
                            @else
                                <h3>Для просмотра прогноза пожалуйста <a href="{{ route('register') }}"><u>зарегистровайтесь</u></a> на сайте.</h3>
                            @endif

                            @if(Gate::allows('forecast-show', $forecast)  || $forecast->status != 0)
                                    {!! $forecast->description !!}
                            @endif
                           </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <hr>
                <div class="widget">
                    <h3><i class="icon-angle2"></i> Актуальные прогнозы</h3>
                        @foreach($last_forecasts as $forecast)
                            <div class="inline-block text-left">
                                <a href="{{ route('forecastWsort', ['sort'=>$forecast->sort->alias,'alias'=>$forecast->alias]) }}" class="btn btn-primary">
                                    <img src="{{ URL::asset('/images/'.$forecast->sort->icon) }}" height="16" title="{{ $forecast->sort->name }}" alt="{{ $forecast->sort->name }}">
                                    {{ $forecast->match }} | @if($forecast->paid===0)Цена: {{ $forecast->price }} руб @else <img src="{{ URL::asset('/images/free.png') }}" title="Бесплатно" alt="Бесплатно"> @endif
                                </a>
                            </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="bg"></div>
</section>