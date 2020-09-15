<section id="benefit-slogan-2col" class="pt-150 pb-150 dark text-left">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2 class=""><strong><?php echo e(Auth::user()->name); ?></strong></h2>
                <img src="<?php echo e(Gravatar::src(Auth::user()->email, 100)); ?>" width="100" class="timeline-badge warning avatar" title="<?php echo e(Auth::user()->name); ?>" alt="<?php echo e(Auth::user()->name); ?>">

                <h4 class=""><?php echo e(Auth::user()->email); ?></h4>
                <h4>Ваш менеджер։ Андрей <i class="icon-skype"></i>(sportprognoz.pw)</h4>
                <form action="<?php echo e(route('logout')); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                    <button class="btn-link">Выход</button>
                </form>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12 pb-50">
                        <div class="card card-row">
                            <i class="card-icon icon-size-l icon-laptop-phone icon-color"></i>
                            <div class="card-block">
                                <h3>Мои прогнозы</h3>
                                <table class="table user table-striped responsive-table">
                                    <thead>
                                    <tr>
                                        <th>Вид</th>
                                        <th>Спорт</th>
                                        <th>Игра</th>
                                        <th>Матч</th>
                                        <th>Коэфф</th>
                                        <th>Время</th>
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
                                                    <td><a href="<?php echo e(route('forecastWsort', ['sort_ord'=>$forecast->sort_ord==1 ? 'express' : 'ordinar', 'sort'=>$forecast->sort->alias,'alias'=>$forecast->alias])); ?>"><b><?php echo e($forecast->match); ?></b></a></td>
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
                                                            <a href="<?php echo e(route('forecast', ['sort_ord'=>$forecast->sort_ord==1 ? 'express' : 'ordinar', 'alias'=>$forecast->alias])); ?>"><b>
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
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 pb-50">
                        <div class="card card-row">
                            <i class="icon-subtract icon-size-l icon-knife icon-color"></i>
                            <div class="card-block">
                                <h3>Мои подписки</h3>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('subscription-check')): ?>
                                    <div class="card card-simple border-box padding-box" style="">
                                        <h3 class="" style="">Осталось <?php echo e($datePast); ?></h3>
                                        <hr>
                                        <a class="btn btn-primary btn-block" style="" href="<?php echo e(route('index')); ?>#subscriptions"><span style="">Продлить время</span></a>
                                    </div>
                                <?php else: ?>
                                    У вас нет активных подписок<br />
                                    <a href="<?php echo e(route('index')); ?>#subscriptions" class="btn btn-success">Купить</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card card-row">
                            <i class="icon-stats-bars icon-size-l icon-knife icon-color"></i>
                            <div class="card-block">
                                <h3>Статистика</h3>
                                <table class="table user table-striped responsive-table ">
                                    <thead>
                                    <tr>
                                        <th>Вид</th>
                                        <th>Спорт</th>
                                        <th>Игра</th>
                                        <th>Матч</th>
                                        <th>Коэфф</th>
                                        <th>Время</th>
                                        <th>Резултат</th>
                                        <th>Статус</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(isset($forecasts_statistics)): ?>
                                        <?php $__currentLoopData = $forecasts_statistics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $forecast): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                                            <?php $__currentLoopData = $forecast->express['coeff']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$coeff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php echo e($coeff); ?> <br />
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                        <div class="table_coeff_border_none"><?php echo e(array_sum($forecast->express['coeff'])); ?></div>
                                                    </td>
                                                    <td>
                                                        <div class="hide_table_td">
                                                            <?php $__currentLoopData = $forecast->express['date']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php echo e($date); ?><br />
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                        <div class="hide_date">
                                                            25/03/2018 20:30
                                                        </div>
                                                    </td>
                                                    <td>

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
                                    <?php endif; ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg"></div>
</section>