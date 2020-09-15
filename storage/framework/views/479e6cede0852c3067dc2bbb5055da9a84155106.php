<section id="spec-inner-page" class="pb-125 pt-100 light">
    <div class="container">
        <div class="row">

            <div class="col-md-5">
                <div class="widget">
                    <img src="<?php echo e(asset('images/'.$sort->icon)); ?>" width="64" title="<?php echo e($sort->name); ?>" alt="<?php echo e($sort->name); ?>" class="sortimage inline-block">
                    <h1 class="inline-block font-size-4 vertical-align-super">
                        <?php echo e($sort->name); ?>

                    </h1>
                    <hr>
                    <p>
                        <?php if($sort->information): ?>
                            <?php echo $sort->information; ?>

                        <?php else: ?>
                            Информация об этом виде спорта.
                        <?php endif; ?>
                    </p>
                </div>
                <div class="widget">
                    <h3 class="mt-30 font-size-1" style=""><strong>Все виды спорта</strong><strong><strong><br></strong></strong></h3>
                    <ul class="list-group widget border-box padding-box spr-option-copy-del">
                        <?php if($sorts->count()): ?>
                            <?php $__currentLoopData = $sorts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_sort): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-group-item <?php echo e($v_sort->id==$sort->id ? 'active' : ''); ?>">
                                <span class="badge"><?php echo e($v_sort->forecasts->count()); ?></span>
                                <img src="<?php echo e(asset('/images/'.$v_sort->icon)); ?>" width="16" class="" alt="">
                                <a href="<?php echo e(route('sport', $v_sort->alias)); ?>"><?php echo e($v_sort->name); ?></a>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
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
                            <?php if(isset($forecasts)): ?>
                                <?php $__currentLoopData = $forecasts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $forecast): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <?php if($forecast->sort_ord == 0): ?>
                                            <td>
                                                Ординар
                                            </td>
                                            <td>
                                                <img src="<?php echo e(asset('images/'.$forecast->sort->icon)); ?>" width="18" alt="<?php echo e($forecast->sort->name); ?>" title="<?php echo e($forecast->sort->name); ?>">
                                            </td>
                                            <td><?php echo e($forecast->game); ?></td>
                                            <td><a href="<?php echo e(route('forecastWsort', ['sort'=>$forecast->sort->alias,'alias'=>$forecast->alias])); ?>"><b><?php echo e($forecast->match); ?></b></a></td>
                                            <td><?php echo e($forecast->coeff); ?></td>
                                            <td><?php echo e($forecast->date->format('d/m/Y H:i')); ?></td>
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
                                                    <?php $__currentLoopData = $forecast->express['coeff']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$coeff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php echo e($coeff); ?> <br />
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                                <div class="table_coeff_border_none">
                                                    <?php
                                                        $data = 1;
                                                        foreach($forecast->express['coeff'] as $item) {
                                                            $data *= $item;
                                                        }
                                                        echo number_format($data, 1);
                                                    ?>
                                                </div>
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
                                        <?php endif; ?>
                                        <?php if($forecast->paid==0 && Gate::allows('forecast-show', $forecast)): ?>
                                            <td>
                                                <?php echo e($forecast->price); ?>руб.
                                            </td>
                                            <td>
                                                <a href="<?php echo e(route('forecast', ['alias'=>$forecast->alias])); ?>" class="btn btn-success btn-block">Посмотреть</a>
                                            </td>
                                        <?php elseif($forecast->paid===1): ?>
                                            <td>
                                                <img src="<?php echo e(URL::asset('images/free.png')); ?>" title="Бесплатно" alt="Бесплатно">
                                            </td>
                                            <td>
                                                <a href="<?php echo e(route('forecast', ['alias'=>$forecast->alias])); ?>" class="btn btn-success btn-block">Посмотреть</a>
                                            </td>
                                        <?php else: ?>
                                            <td>
                                                <?php echo e($forecast->price); ?>руб.
                                            </td>
                                            <td>
                                                <form action="<?php echo e(route('forecast.buy')); ?>" method="post" class="mb-0">
                                                    <?php echo e(csrf_field()); ?>

                                                    <button type="submit" name="id" value="<?php echo e($forecast->id); ?>" class="btn btn-warning btn-block">Купить</button>
                                                </form>
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                        <?php if(!$forecasts->count()): ?>
                            <h4>На этом виде спорта нет актуалных прогнозов!</h4>
                        <?php endif; ?>

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
                    <?php $__currentLoopData = $statistics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $forecast): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                <?php if(!$statistics->count()): ?>
                    <h4>На этом виде спорта нет прогнозов!</h4>
                <?php endif; ?>
                <a href="<?php echo e(route('fullStatistics')); ?>" class="btn btn-primary btn-xs">Посмотреть полную статистику <i class="icon icon-arrow-right"></i></a>
            </div>
        </div>
    </div>
    <div class="bg"></div>
</section>
