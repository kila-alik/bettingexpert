<section id="benefit-2col" class="pt-125 pb-125 text-left light full-statistics">
    <div class="container">
        <h2>Полная статистика <?php echo e(date('Y')); ?> года</h2>
        <h4 class="mb-50">В нашей работе мы стараемся использовать только самые современные, удобные и интересные решения.</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="container">
                    <div class="row mb-25">
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h2 class="card-title"><i class="icon-stats-bars"></i></h2>
                                    <h2><?php echo e($forecasts->count()); ?></h2>
                                    <p class="card-text">Прогнозов</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h2 class="card-title"><i class="icon-plus2"></i></h2>
                                    <h2><?php echo e($forecasts->where('status', 1)->count()); ?></h2>
                                    <p class="card-text">Выигрыш</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h2 class="card-title"><i class="icon-cube"></i></h2>
                                    <h2><?php echo e($forecasts->where('status', 3)->count()); ?></h2>
                                    <p class="card-text">Возврат</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h2 class="card-title"><i class="icon-minus2"></i></h2>
                                    <h2><?php echo e($forecasts->where('status', 2)->count()); ?></h2>
                                    <p class="card-text">Проигрыш</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 mt-25">
                            <div class="col-sm-4">
                                <b><i class="icon icon-yelp"></i> Начальный игровой банк։</b> <br><?php echo e($forecasts_bank['start_money']); ?>руб.
                            </div>
                            <div class="col-sm-4">
                                <b><i class="icon icon-self-timer"></i> Банк в настоящее время։</b> <br><?php echo e($forecasts_bank['bank_amount']); ?>руб.
                            </div>
                            <div class="col-sm-4">
                                <b><i class="icon icon-star"></i> Прибыль։</b> <br><?php echo e($forecasts_bank['bank_profit']); ?>руб. (<?php echo e($forecasts_bank['bank_plus_procent']); ?>%)
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
                                        <span class="item item-first"><img src="<?php echo e(asset('images/US-dollar-icon.png')); ?>" alt=""> Платные</span>
                                        <div class="switch item">
                                            <div class="switch-label">
                                                <div class="switch-inner"></div>
                                                <div class="switch-switch"></div>
                                            </div>
                                        </div>
                                        <span class="item item-second">Бесплатные <img src="<?php echo e(asset('images/free.png')); ?>" alt=""></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="paid">
                    <?php $__currentLoopData = $months; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$month): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php if($forecastsPaid->filter(function($forecast) use ($k) {
                                                    return $forecast->date->format('m') == $k;
                                                })->count() > 0): ?>

                        <div class="container container-foreach mb-50">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="#" class="btn statistics_background btn-block open_table">
                                        <i class="icon-position-left pull-left icon-calendar-check icon-size-m"></i>
                                        <span class="spr-option-textedit-link"><?php echo e($month); ?> <?php echo e($k); ?></span>
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
                                        <?php $__currentLoopData = $forecastsPaid->filter(function($forecast) use ($k) {
                                                    return $forecast->date->format('m') == $k;
                                                }); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $forecast): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <?php if($forecast->sort_ord == 0): ?>
                                                    <td>
                                                        Ординар
                                                    </td>
                                                    <td>
                                                        <img src="<?php echo e(asset('images/'.$forecast->sort->icon)); ?>" width="18" alt="<?php echo e($forecast->sort->name); ?>" title="<?php echo e($forecast->sort->name); ?>">
                                                    </td>
                                                    <td><?php echo e($forecast->game); ?></td>
                                                    <td><a href="<?php echo e(route('forecastWsort', ['sort_ord'=>$forecast->sort_ord==1 ? 'express' : 'ordinar', 'sort'=>$forecast->sort->alias,'alias'=>$forecast->alias])); ?>"><b><?php echo e($forecast->match); ?></b></a></td>
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
                                                            <a href="<?php echo e(route('forecast', ['sort_ord'=>$forecast->sort_ord==1 ? 'express' : 'ordinar', 'alias'=>$forecast->alias])); ?>"><b>
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
                                                                            </div>
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
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div id="free" style="display: none">
                    <?php $__currentLoopData = $months; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$month): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php if($forecastsFree->filter(function($forecast) use ($k) {
                                                    return $forecast->date->format('m') == $k;
                                                })->count() > 0): ?>

                        <div class="container container-foreach mb-50">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="#" class="btn statistics_background btn-block open_table">
                                        <i class="icon-position-left pull-left icon-calendar-check icon-size-m"></i>
                                        <span class="spr-option-textedit-link"><?php echo e($month); ?> <?php echo e($k); ?></span>
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
                                        <?php $__currentLoopData = $forecastsFree->filter(function($forecast) use ($k) {
                                                    return $forecast->date->format('m') == $k;
                                                }); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $forecast): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <?php if($forecast->sort_ord == 0): ?>
                                                    <td>
                                                        Ординар
                                                    </td>
                                                    <td>
                                                        <img src="<?php echo e(asset('images/'.$forecast->sort->icon)); ?>" width="18" alt="<?php echo e($forecast->sort->name); ?>" title="<?php echo e($forecast->sort->name); ?>">
                                                    </td>
                                                    <td><?php echo e($forecast->game); ?></td>
                                                    <td><a href="<?php echo e(route('forecastWsort', ['sort_ord'=>$forecast->sort_ord==1 ? 'express' : 'ordinar', 'sort'=>$forecast->sort->alias,'alias'=>$forecast->alias])); ?>"><b><?php echo e($forecast->match); ?></b></a></td>
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
                                                            <a href="<?php echo e(route('forecast', ['sort_ord'=>$forecast->sort_ord==1 ? 'express' : 'ordinar', 'alias'=>$forecast->alias])); ?>"><b>
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
                                                                            </div>
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
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="bg"></div>
</section>