<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="header-title mb-4">Статистика сайта</h4>

            <div class="row">
                <div class="col-sm-6 col-lg-6 col-xl-3">
                    <div class="card-box mb-0 widget-chart-two">
                        <div class="widget-chart-two-content">
                            <p class="text-muted mb-0 mt-2">Количество покупок</p>
                            <h3 class=""><?php echo e($count_payments); ?></h3>
                        </div>

                    </div>
                </div>

                <div class="col-sm-6 col-lg-6 col-xl-3">
                    <div class="card-box mb-0 widget-chart-two">
                        <div class="widget-chart-two-content">
                            <p class="text-muted mb-0 mt-2">Сумма покупок</p>
                            <h3 class=""><?php echo e($amountPayments); ?> ₽</h3>
                        </div>

                    </div>
                </div>

                <div class="col-sm-6 col-lg-6 col-xl-3">
                    <div class="card-box mb-0 widget-chart-two">
                        <div class="widget-chart-two-content">
                            <p class="text-muted mb-0 mt-2">Количество прогнозов</p>
                            <h3 class=""><?php echo e($forecastCount); ?></h3>
                        </div>

                    </div>
                </div>

                <div class="col-sm-6 col-lg-6 col-xl-3">
                    <div class="card-box mb-0 widget-chart-two">
                        <div class="widget-chart-two-content">
                            <p class="text-muted mb-0 mt-2">Количество  пользователей</p>
                            <h3 class=""><?php echo e($usersCount); ?></h3>
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
                    <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <b><?php echo e($payment->id); ?></b>
                            </td>
                            <td>
                               <?php echo e($payment->user->name); ?> | <?php echo e($payment->user->email ?? $payment->user->email); ?>

                            </td>
                            <td>
                                <?php if(!empty($payment->forecast->id)): ?>
                                    <a href="<?php echo e(route('forecasts.edit', $payment->forecast->id)); ?>">
                                        <?php if($payment->forecast->sort_ord===0): ?>
                                            <?php echo e($payment->forecast->match); ?>

                                        <?php else: ?>
                                            <?php $__currentLoopData = $payment->forecast->express['match']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $match): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e($match); ?> <br />
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </a>
                                <?php else: ?>
                                    Покупка подписки №<?php echo e($payment->subscription_id); ?>

                                <?php endif; ?>
                            </td>
                            <td>
                                <?php echo e($payment->amount); ?> руб.
                            </td>

                            <td>
                                <?php if(!empty($payment->sign)): ?>
                                    <span class="badge badge-success">ДА</span>
                                <?php else: ?>
                                    <span class="badge badge-secondary">НЕТ</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php echo e($payment->created_at); ?>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
<!-- end row -->