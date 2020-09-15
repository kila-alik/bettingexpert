<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title">Все прогнозы</h4>
            <p class="text-muted font-14 m-b-30">
                <a href="{{ route('forecasts.create') }}" class="btn btn-primary">Добавить новый</a>

            <form action="{{ route('forecasts.index') }}" method="get" class="pull-right col-md-3">
                <input type="text" name="search" class="form-control inline-block" placeholder="Поиск"
                       value="{{ $search }}">
            </form>

            <form action="{{ route('forecasts.index') }}" method="get">
                <div class="checkbox checkbox-primary inline-block">
                    <input id="checkbox1" type="checkbox" name="filter[]" value="PastTime"
                           @if(in_array('PastTime', $filter)) checked @endif>
                    <label for="checkbox1">
                        Прошедшее время
                    </label>
                    <input id="checkbox2" type="checkbox" name="filter[]" value="NotStatus"
                           @if(in_array('NotStatus', $filter)) checked @endif>
                    <label for="checkbox2">
                        Нет статуса
                    </label>

                    <select name="filter[]" id="" class="selectpicker form-control-sm"
                            data-style="btn-select btn-block">
                        <option value="">Бесплатный/Платный</option>
                        <option value="Free" @if(in_array('Free', $filter)) selected @endif>Бесплатный</option>
                        <option value="Paid" @if(in_array('Paid', $filter)) selected @endif>Платный</option>
                    </select>
                    <input type="submit" class="btn btn-info" value="Фильтровать">
                    <a href="{{ route('forecasts.index') }}" class="btn btn-outline-danger">X</a>
                </div>
            </form>
            </p>

            @if(!empty(session('status')))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <table id="datatable" class="table table-bordered">
                <thead>
                <tr>
                    <th>Результат</th>
                    <th>Игра/Матч</th>
                    <th>Прогноз</th>
                    <th>Коэфф</th>
                    <th>Время</th>
                    <th>Цена</th>
                    <th></th>
                </tr>
                </thead>


                <tbody>

                @foreach($forecasts as $forecast)
                    <tr>
                        <td>
                            @if($forecast->status===1)
                                <div class="alert-success text-center"><b>Прошел</b></div>
                            @elseif($forecast->status===2)
                                <div class="alert-danger text-center"><b>Не прошел</b></div>
                            @elseif($forecast->status===3)
                                <div class="alert-primary text-center"><b>Возврат</b></div>
                            @endif
                            <a href="{{ route('forecasts.changeStatus', ['id'=>$forecast->id, 'status'=>1]) }}"
                               title="Прошел" class="btn btn-success"></a>
                            <a href="{{ route('forecasts.changeStatus', ['id'=>$forecast->id, 'status'=>2]) }}"
                               title="Не прошел" class="btn btn-danger"></a>
                            <a href="{{ route('forecasts.changeStatus', ['id'=>$forecast->id, 'status'=>3]) }}"
                               title="Возврат" class="btn btn-primary"></a>
                            <a href="{{ route('forecasts.changeStatus', ['id'=>$forecast->id, 'status'=>0]) }}"
                               title="Очистить" class="btn btn-light btn-xs"></a>

                            @if($forecast->sort_ord==0)
                                <input type="text" name="result" class="form-control border-success"
                                       value="{{ $forecast->result }}" id="{{$forecast->id}}" placeholder="Результат">
                            @endif

                        </td>
                        @if($forecast->sort_ord ==1)
                            <td>
                                <div class="btn-sm btn mb-2" style="border:1px solid">
                                    ЭКСПРЕСС
                                </div>
                                <br/>
                                <div class="pull-left m-t-10">
                                    @foreach($forecast->express['sort_id'] as $k=>$sort_id)
                                        <img src="{{ URL::asset('images/'.$sort::find($sort_id)->icon) }}" width="16"
                                             alt="{{ $sort::find($sort_id)->name }}"
                                             title="{{ $sort::find($sort_id)->name }}"> <br/>
                                    @endforeach
                                </div>
                                @foreach($forecast->express['game'] as $k=>$game)
                                    <b>{{ $k+1 }}</b>. {{ $game }} <b>/ {{ $forecast->express['match'][$k] }}</b> <br/>
                                @endforeach
                            </td>
                            <td>
                                @foreach($forecast->express['forecast'] as $k=>$exp_forecast)
                                    {{ $exp_forecast }} <br/>
                                @endforeach
                            </td>
                            <td>
                                @foreach($forecast->express['coeff'] as $k=>$coeff)
                                    <b>{{ $k+1 }}</b>. {{ $coeff }} <br/>
                                @endforeach
                                <div class="border-top text-center">
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
                                @foreach($forecast->express['date'] as $k=>$date)
                                    <b>{{ $k+1 }}</b>. {{ $date }} <br/>
                                @endforeach
                            </td>
                        @else
                            <td>
                                <div class="btn-sm btn mb-2" style="border:1px solid">
                                    <img src="{{ URL::asset('images/'.$forecast->sort->icon) }}" width="18"
                                         alt="{{ $forecast->sort->name }}"
                                         title="{{ $forecast->sort->name }}"> {{ $forecast->sort->name }}
                                </div>
                                <br/>

                                {{ $forecast->game }} <b>/ {{ $forecast->match }}</b>
                            </td>
                            <td>{{ $forecast->forecast }}</td>
                            <td>{{ $forecast->coeff }}</td>
                            <td>{{ $forecast->date }}</td>
                        @endif


                        <td>
                            @if($forecast->paid === 0)
                                {{ $forecast->price }} руб.
                            @else
                                <img src="{{ asset('images/free.png') }}" title="Бесплатный" alt="Бесплатный">
                            @endif
                        </td>
                        <td>

                            <form action="{{ route('forecasts.destroy', $forecast->id) }}" method="post">
                                <input type="hidden" name="_method" value="delete">
                                {{ csrf_field() }}
                                <div class="btn-group mt-3">
                                    <a href="{{ route('forecasts.edit', $forecast->id) }}"
                                       class="btn btn-info btn-rounded waves-light waves-effect btn-sm"
                                       title="Редактировать"><i class="fa fa-edit"></i></a>

                                    <button type="submit"
                                            class="btn btn-danger btn-rounded waves-effect waves-light btn-sm"
                                            title="Удалить"><i class="fa fa-remove"></i></button>
                                    <a href="{{ route('forecast', $forecast->alias) }}" target="_blank"
                                       class="btn btn-primary  btn-rounded waves-effect waves-light btn-sm"
                                       title="Посмотреть"><i class="fa fa-eye"></i></a>
                                </div>
                            </form>

                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            <ul class="pagination justify-content-end pagination-split mt-0">
                @if($forecasts->lastPage() > 1)

                    @if($forecasts->currentPage() !== 1)
                        <li class="page-item">
                            <a class="page-link" href="{{ $forecasts->previousPageUrl() }}" aria-label="Previous">
                                <span aria-hidden="true">«</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>

                    @endif

                    @for($i = max(1, $forecasts->currentPage()-5); $i <= min($forecasts->currentPage() + 5, $forecasts->lastPage()); $i++)
                        <li class="page-item{{ ($i == $forecasts->currentPage()) ? " active" : '' }}"><a
                                    href="{{ $forecasts->url($i) }}" class="page-link">{{ $i }}</a></li>

                    @endfor

                    @if($forecasts->lastPage() > $forecasts->currentPage())
                        <li class="page-item">
                            <a class="page-link" href="{{ $forecasts->nextPageUrl() }}" aria-label="Next">
                                <span aria-hidden="true">»</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>

                    @endif

                @endif
            </ul>
        </div>
    </div>
</div> <!-- end row -->

