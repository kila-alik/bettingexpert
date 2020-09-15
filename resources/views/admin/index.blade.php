<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="header-title mb-4">Статистика сайта</h4>

            <div class="row">
                <div class="col-sm-6 col-lg-6 col-xl-3">
                    <div class="card-box mb-0 widget-chart-two">
                        <div class="widget-chart-two-content">
                            <p class="text-muted mb-0 mt-2">Количество покупок</p>
                            <h3 class="">{{ $count_payments }}</h3>
                        </div>

                    </div>
                </div>

                <div class="col-sm-6 col-lg-6 col-xl-3">
                    <div class="card-box mb-0 widget-chart-two">
                        <div class="widget-chart-two-content">
                            <p class="text-muted mb-0 mt-2">Сумма покупок</p>
                            <h3 class="">{{ $amountPayments }} ₽</h3>
                        </div>

                    </div>
                </div>

                <div class="col-sm-6 col-lg-6 col-xl-3">
                    <div class="card-box mb-0 widget-chart-two">
                        <div class="widget-chart-two-content">
                            <p class="text-muted mb-0 mt-2">Количество прогнозов</p>
                            <h3 class="">{{ $forecastCount }}</h3>
                        </div>

                    </div>
                </div>

                <div class="col-sm-6 col-lg-6 col-xl-3">
                    <div class="card-box mb-0 widget-chart-two">
                        <div class="widget-chart-two-content">
                            <p class="text-muted mb-0 mt-2">Количество  пользователей</p>
                            <h3 class="">{{ $usersCount }}</h3>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
</div>
<!-- end row -->

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="header-title mb-3">Последние покупки</h4>
            <div class="table-responsive">
                <table class="table table-hover table-centered m-0">

                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Пользователь</th>
                        <th>Прогноз</th>
                        <th>Сумма</th>
                        <th>Подтверждающий</th>
                        <th>Время</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($payments as $payment)
                        <tr>
                            <td>
                                <b>{{ $payment->id }}</b>
                            </td>
                            <td>
                               {{ $payment->user->name }} | {{ $payment->user->email ?? $payment->user->email }}
                            </td>
                            <td>
                                @if(!empty($payment->forecast->id))
                                    <a href="{{ route('forecasts.edit', $payment->forecast->id) }}">
                                        @if($payment->forecast->sort_ord===0)
                                            {{ $payment->forecast->match }}
                                        @else
                                            @foreach($payment->forecast->express['match'] as $match)
                                                {{ $match }} <br />
                                            @endforeach
                                        @endif
                                    </a>
                                @else
                                    Покупка подписки №{{ $payment->subscription_id }}
                                @endif
                            </td>
                            <td>
                                {{ $payment->amount }} руб.
                            </td>

                            <td>
                                @if(!empty($payment->sign))
                                    <span class="badge badge-success">ДА</span>
                                @else
                                    <span class="badge badge-secondary">НЕТ</span>
                                @endif
                            </td>
                            <td>
                                {{ $payment->created_at }}
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
<!-- end row -->