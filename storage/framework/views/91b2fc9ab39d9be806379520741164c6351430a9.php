<section id="benefit-slogan-2col" class="pt-100 pb-150 dark text-left">
    <div class="container">
        <div class="row">
            <div class="col-md-12 pb-30">
                <ul class="breadcrumb">
                    <li><a href="<?php echo e(route('index')); ?>">Главная</a></li>
                    <li><a href="<?php echo e(route('sort', $forecast->sort_ord==0 ? 'ordinar' : 'express')); ?>"><?php echo e($forecast->sort_ord==0 ? 'Ординар' : 'Экспресс '); ?></a></li>
                    <?php if($forecast->sort_ord == 0): ?>
                        <li><a href="<?php echo e(route('sport', $forecast->sort->alias)); ?>"><?php echo e($forecast->sort->name); ?></a></li>
                        <li class="active"><?php echo e($forecast->match); ?></li>
                    <?php endif; ?>
                </ul>
            </div>

            <div class="col-md-12 mb-50">
                <h1 class="font-size-2-8"><?php if($forecast->sort_ord===0): ?>Прогнозы на <?php echo e(mb_strtolower($forecast->sort->name)); ?>, <?php echo e($forecast->match); ?><?php else: ?>Экспресс ставки и прогнозы на спорт<?php endif; ?></h1>
            </div>


            <div class="col-md-4">
                <?php if($forecast->sort_ord==0): ?>
                    <img src="<?php echo e(asset('images/'.$forecast->sort->icon)); ?>" width="64" title="<?php echo e($forecast->sort->name); ?>" alt="<?php echo e($forecast->sort->name); ?>" class="sortimage inline-block">
                    <h2 class="inline-block font-size-4 vertical-align-super ">
                        <?php echo e($forecast->sort->name); ?>

                    </h2>
                <?php else: ?>
                    <h2 class="sortimage text-center">Экспресс</h2>
                <?php endif; ?>

                <?php if($forecast->status===1): ?>
                    <div class="alert-c-success mb-20">Прошел</div>
                <?php elseif($forecast->status===2): ?>
                    <div class="alert-c-danger mb-20">Не прошел</div>
                <?php elseif($forecast->status===3): ?>
                    <div class="alert-c-primary mb-20">Возврат</div>
                <?php endif; ?>
                <div class="col-md-12">
                    <strong>Прогнозист: </strong> <a href="<?php echo e(route('forecaster', $forecast->forecaster->id)); ?>"><u><?php echo e($forecast->forecaster->name); ?></u></a><hr />
                    <p class="word-wrap"><?php echo e(str_limit($forecast->forecaster->information, 100)); ?></p>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12 pb-50">
                        <?php if($forecast->sort_ord == 0): ?>
                            <div class="teams">
                                <div class="vs-block" data-separator-text="vs">
                                    <div class="sides">
                                        <?php echo e(explode('-', $forecast->match)[0]); ?>

                                    </div>
                                    <div class="sides">
                                        <?php echo e(explode('-', $forecast->match)[1]); ?>

                                    </div>
                                    <div class="clear-both"></div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <ul class="doted-space-list">
                            <li>
                                <i class="icon-clock"></i>
                                <div class="left">
                                    Время
                                </div>
                                <!-- Dots -->
                                <div class="dots"></div>
                                <div class="right">
                                    <?php echo e($forecast->date->format('d/m/Y H:i')); ?>

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
                                    <?php if($forecast->sort_ord == 1): ?>
                                        ЭКСПРЕСС
                                    <?php else: ?>
                                        <?php echo e($forecast->game); ?>

                                    <?php endif; ?>
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
                                    <?php if($forecast->sort_ord == 0): ?>
                                        <?php echo e($forecast->coeff); ?>

                                    <?php else: ?>
                                        <?php
                                            $data = 1;
                                            foreach($forecast->express['coeff'] as $item) {
                                                $data *= $item;
                                            }
                                            echo number_format($data, 1);
                                        ?>
                                    <?php endif; ?>
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
                                    <?php if($forecast->paid === 1): ?>
                                        <img src="<?php echo e(URL::asset('images/free.png')); ?>" title="Бесплатно" alt="Бесплатно">
                                    <?php else: ?>
                                        <?php echo e($forecast->price); ?>руб
                                    <?php endif; ?>

                                </div>
                            </li>
                            <?php if($forecast->status===0): ?>
                            <li>
                                <i class="icon-timer"></i>
                                <div class="left">
                                    Начало матча через
                                </div>
                                <!-- Dots -->
                                <div class="dots"></div>
                                <div class="right">
                                    <div id="clock" data-date="<?php echo e($forecast->date->format('Y/m/d H:i')); ?> GMT+03:00"></div>
                                </div>
                            </li>
                            <?php endif; ?>
                        </ul>

                        <div class="forecast_show mt-75">
                            <?php if(Gate::allows('forecast-show', $forecast) || $forecast->status != 0): ?>
                                <?php if($forecast->sort_ord === 0): ?>
                                    <div class="forecast ordinar">
                                        <b>Прогноз:</b> <?php echo e($forecast->forecast); ?>

                                        <?php if($forecast->status != 0): ?>
                                            <div class="pull-right">
                                                <b>Результат:</b> <?php echo e($forecast->result); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php else: ?>

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
                                            <?php $__currentLoopData = $forecast->express['sort_id']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$express): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td>
                                                        <img src="<?php echo e(URL::asset('images/'.$sort::find($forecast->express['sort_id'][$k])->icon)); ?>" title="<?php echo e($sort::find($forecast->express['sort_id'][$k])->name); ?>" class="sortimage" height="42" alt="<?php echo e($sort::find($forecast->express['sort_id'][$k])->name); ?>">
                                                    </td>
                                                    <td>
                                                        <?php echo e($forecast->express['game'][$k]); ?>

                                                    </td>
                                                    <td>
                                                        <?php echo e($forecast->express['match'][$k]); ?>

                                                    </td>
                                                    <td>
                                                        <?php echo e($forecast->express['coeff'][$k]); ?>

                                                    </td>
                                                    <td>
                                                        <?php echo e(date_format(date_create($forecast->express['date'][$k]),'d/m/Y H:i')); ?>

                                                    </td>
                                                    <td>
                                                        <?php echo e($forecast->express['forecast'][$k]); ?>

                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php endif; ?>
                            <?php elseif(Auth::check()): ?>
                                <h3>Для просмотра прогноза пожалуйста, с начало купите прогноз.
                                    <form action="<?php echo e(route('forecast.buy')); ?>" method="post" class="mb-0">
                                        <?php echo e(csrf_field()); ?>

                                        <button type="submit" name="id" value="<?php echo e($forecast->id); ?>" class="btn btn-success">Купить</button>
                                    </form>
                                </h3>
                            <?php else: ?>
                                <h3>Для просмотра прогноза пожалуйста <a href="<?php echo e(route('register')); ?>"><u>зарегистровайтесь</u></a> на сайте.</h3>
                            <?php endif; ?>

                            <?php if(Gate::allows('forecast-show', $forecast)  || $forecast->status != 0): ?>
                                    <?php echo $forecast->description; ?>

                            <?php endif; ?>
                           </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <hr>
                <div class="widget">
                    <h3><i class="icon-angle2"></i> Актуальные прогнозы</h3>
                        <?php $__currentLoopData = $last_forecasts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $forecast): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="inline-block text-left">
                                <a href="<?php echo e(route('forecastWsort', ['sort'=>$forecast->sort->alias,'alias'=>$forecast->alias])); ?>" class="btn btn-primary">
                                    <img src="<?php echo e(URL::asset('/images/'.$forecast->sort->icon)); ?>" height="16" title="<?php echo e($forecast->sort->name); ?>" alt="<?php echo e($forecast->sort->name); ?>">
                                    <?php echo e($forecast->match); ?> | <?php if($forecast->paid===0): ?>Цена: <?php echo e($forecast->price); ?> руб <?php else: ?> <img src="<?php echo e(URL::asset('/images/free.png')); ?>" title="Бесплатно" alt="Бесплатно"> <?php endif; ?>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="bg"></div>
</section>