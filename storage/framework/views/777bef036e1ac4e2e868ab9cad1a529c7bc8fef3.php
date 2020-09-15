<section id="desc-text-btn-quartbg" class="pt-150 pb-md-150 light full-statistics">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-50">
               <h1 class="font-size-2-8">Профиль прогнозиста <b><?php echo e($forecaster->name); ?></b></h1>
            </div>
            <div class="col-md-3">
                <div class="thumb-lg member-thumb m-b-10 mx-auto">
                    <img src="<?php echo e($forecaster->avatar ? asset('avatars/'.$forecaster->avatar) : Gravatar::src($forecaster->email, 200)); ?>" class="rounded-circle img-thumbnail" alt="profile-image">
                </div>
                <p class="mt-10">
                    <?php echo e($forecaster->information); ?>

                </p>
            </div>
            <div class="col-md-9">
                <h3>Статистика прогнозиста</h3>
                <div class="row mb-50">
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <h2 class="card-title"><i class="icon-stats-bars"></i></h2>
                                <h2><?php echo e($forecaster->forecastsForecaster->count()); ?></h2>
                                <p class="card-text">Прогнозов</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <h2 class="card-title"><i class="icon-plus2"></i></h2>
                                <h2><?php echo e($forecaster->forecastsForecaster->where('status', 1)->count()); ?></h2>
                                <p class="card-text">Выигрыш</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <h2 class="card-title"><i class="icon-cube"></i></h2>
                                <h2><?php echo e($forecaster->forecastsForecaster->where('status', 3)->count()); ?></h2>
                                <p class="card-text">Возврат</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <h2 class="card-title"><i class="icon-minus2"></i></h2>
                                <h2><?php echo e($forecaster->forecastsForecaster->where('status', 2)->count()); ?></h2>
                                <p class="card-text">Проигрыш</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 mt-25">
                        <div class="col-sm-4">
                            <b><i class="icon icon-yelp"></i> Начальный игровой банк։</b> <?php echo e($forecasts_bank['start_money']); ?>руб.
                        </div>
                        <div class="col-sm-4">
                            <b><i class="icon icon-self-timer"></i> Банк в настоящее время։</b> <?php echo e($forecasts_bank['bank_amount']); ?>руб.
                        </div>
                        <div class="col-sm-4">
                            <b><i class="icon icon-star"></i> Прибыль։</b> <?php echo e($forecasts_bank['bank_profit']); ?>руб. (<?php echo e($forecasts_bank['bank_plus_procent']); ?>%)
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
                            <?php $__currentLoopData = $forecaster->forecastsForecaster()->orderby('date', 'DESC')->where('status', '!=', 0)->take(5)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $forecast): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <?php if($forecast->sort_ord == 0): ?>
                                        <td>
                                            Ординар
                                        </td>
                                        <td>
                                            <img src="<?php echo e(asset('images/'.$forecast->sort->icon)); ?>" width="18" alt="<?php echo e($forecast->sort->name); ?>" title="<?php echo e($forecast->sort->name); ?>">
                                        </td>
                                        <td><a href="<?php echo e(route('forecastWsort', ['sort'=>$forecast->sort->alias,'alias'=>$forecast->alias])); ?>"><?php echo e($forecast->game); ?></a></td>
                                        <td><a href="<?php echo e(route('forecastWsort', ['sort'=>$forecast->sort->alias,'alias'=>$forecast->alias])); ?>"><b><?php echo e($forecast->match); ?></b></a></td>
                                        <td><?php echo e($forecast->forecast); ?></td>
                                        <td><?php echo e($forecast->coeff); ?></td>
                                        <td><?php echo e($forecast->date->format('d/m/Y H:i')); ?></td>
                                        <td>
                                            <?php if($forecast->status===1): ?>
                                                <div class="text-c-green">
                                                    <?php elseif($forecast->status===2): ?>
                                                        <div class="text-c-red">
                                                            <?php elseif($forecast->status===3): ?>
                                                                <div class="text-c-blue">
                                                                    <?php endif; ?>
                                                                    <?php echo e($forecast->result); ?>

                                                                </div>
                                        </td>
                                        <td>
                                            <?php if($forecast->status===1): ?>
                                                <div class="alert-c-success">Прошел</div>
                                            <?php elseif($forecast->status===2): ?>
                                                <div class="alert-c-danger">Не прошел</div>
                                            <?php elseif($forecast->status===3): ?>
                                                <div class="alert-c-primary">Возврат</div>
                                            <?php endif; ?>
                                        </td>
                                    <?php else: ?>
                                        <td>
                                            Экспресс <a href="#" class="open_this_table"><i class="icon-plus-square"></i></a>
                                        </td>
                                        <td>
                                            <div class="hide_table_td">
                                                <?php $__currentLoopData = $forecast->express['sort_id']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$sort_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <img src="<?php echo e(URL::asset('images/'.$sort::find($sort_id)->icon)); ?>" width="16" alt="<?php echo e($sort::find($sort_id)->name); ?>" title="<?php echo e($sort::find($sort_id)->name); ?>"> <br />
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>&nbsp;
                                        </td>
                                        <td>
                                            <div class="hide_table_td">
                                                <?php $__currentLoopData = $forecast->express['game']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$game): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <b><?php echo e($k+1); ?></b>. <?php echo e($game); ?> <br />
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>&nbsp;
                                        </td>
                                        <td>
                                            <div class="hide_table_td">
                                                <a href="<?php echo e(route('forecast', ['alias'=>$forecast->alias])); ?>"><b>
                                                        <?php $__currentLoopData = $forecast->express['match']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$match): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php echo e($match); ?> <br />
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </b></a>
                                            </div>&nbsp;
                                        </td>
                                        <td>
                                            <div class="hide_table_td">
                                                <?php $__currentLoopData = $forecast->express['forecast']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$forecast_val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php echo e($forecast_val); ?> <br />
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="hide_table_td">
                                                <?php $__currentLoopData = $forecast->express['coeff']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$coeff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php echo e($coeff); ?> <br />
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                            <div class="table_coeff_border_none"><?php echo e(array_sum($forecast->express['coeff'])); ?></div>
                                        </td>
                                        <td>
                                            <div class="hide_table_td">
                                                <?php $__currentLoopData = $forecast->express['date']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php echo e(date_format(date_create($date),'d/m/Y H:i')); ?><br />
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                            <div class="hide_date">
                                                <?php echo e(date_format(date_create(min($forecast->express['date'])),'d/m/Y H:i')); ?>

                                            </div>
                                        </td>
                                        <td>
                                            <div class="hide_table_td">
                                                <?php $__currentLoopData = $forecast->express['result']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($forecast->status===1): ?>
                                                        <div class="text-c-green">
                                                            <?php elseif($forecast->status===2): ?>
                                                                <div class="text-c-red">
                                                                    <?php elseif($forecast->status===3): ?>
                                                                        <div class="text-c-blue">
                                                                            <?php endif; ?>
                                                                            <?php echo e($result); ?><br />
                                                                        </div>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </div>&nbsp;
                                        </td>
                                        <td>
                                            <div class="hide_table_td">
                                                <?php $__currentLoopData = $forecast->express['result']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($result===1): ?>
                                                        <div class="alert-c-success">Прошел</div>
                                                    <?php elseif($result===2): ?>
                                                        <div class="alert-c-danger">Не прошел</div>
                                                    <?php elseif($result===3): ?>
                                                        <div class="alert alert-primary">Возврат</div>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                            <?php if($forecast->status===1): ?>
                                                <div class="alert-c-success">Прошел</div>
                                            <?php elseif($forecast->status===2): ?>
                                                <div class="alert-c-danger">Не прошел</div>
                                            <?php elseif($forecast->status===3): ?>
                                                <div class="alert-c-primary">Возврат</div>
                                            <?php endif; ?>
                                        </td>

                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <a href="<?php echo e(route('fullStatistics')); ?>" class="btn btn-primary btn-xs">Посмотреть полную статистику <i class="icon icon-arrow-right"></i></a>
            </div>
        </div>
    </div>
    <div class="bg"></div>
</section>