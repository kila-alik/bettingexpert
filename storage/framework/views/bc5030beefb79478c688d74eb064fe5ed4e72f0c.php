<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title">Все прогнозы</h4>
            <p class="text-muted font-14 m-b-30">
                <a href="<?php echo e(route('forecasts.create')); ?>" class="btn btn-primary">Добавить новый</a>

            <form action="<?php echo e(route('forecasts.index')); ?>" method="get" class="pull-right col-md-3">
                <input type="text" name="search" class="form-control inline-block" placeholder="Поиск"
                       value="<?php echo e($search); ?>">
            </form>

            <form action="<?php echo e(route('forecasts.index')); ?>" method="get">
                <div class="checkbox checkbox-primary inline-block">
                    <input id="checkbox1" type="checkbox" name="filter[]" value="PastTime"
                           <?php if(in_array('PastTime', $filter)): ?> checked <?php endif; ?>>
                    <label for="checkbox1">
                        Прошедшее время
                    </label>
                    <input id="checkbox2" type="checkbox" name="filter[]" value="NotStatus"
                           <?php if(in_array('NotStatus', $filter)): ?> checked <?php endif; ?>>
                    <label for="checkbox2">
                        Нет статуса
                    </label>

                    <select name="filter[]" id="" class="selectpicker form-control-sm"
                            data-style="btn-select btn-block">
                        <option value="">Бесплатный/Платный</option>
                        <option value="Free" <?php if(in_array('Free', $filter)): ?> selected <?php endif; ?>>Бесплатный</option>
                        <option value="Paid" <?php if(in_array('Paid', $filter)): ?> selected <?php endif; ?>>Платный</option>
                    </select>
                    <input type="submit" class="btn btn-info" value="Фильтровать">
                    <a href="<?php echo e(route('forecasts.index')); ?>" class="btn btn-outline-danger">X</a>
                </div>
            </form>
            </p>

            <?php if(!empty(session('status'))): ?>
                <div class="alert alert-success">
                    <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?>
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

                <?php $__currentLoopData = $forecasts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $forecast): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <?php if($forecast->status===1): ?>
                                <div class="alert-success text-center"><b>Прошел</b></div>
                            <?php elseif($forecast->status===2): ?>
                                <div class="alert-danger text-center"><b>Не прошел</b></div>
                            <?php elseif($forecast->status===3): ?>
                                <div class="alert-primary text-center"><b>Возврат</b></div>
                            <?php endif; ?>
                            <a href="<?php echo e(route('forecasts.changeStatus', ['id'=>$forecast->id, 'status'=>1])); ?>"
                               title="Прошел" class="btn btn-success"></a>
                            <a href="<?php echo e(route('forecasts.changeStatus', ['id'=>$forecast->id, 'status'=>2])); ?>"
                               title="Не прошел" class="btn btn-danger"></a>
                            <a href="<?php echo e(route('forecasts.changeStatus', ['id'=>$forecast->id, 'status'=>3])); ?>"
                               title="Возврат" class="btn btn-primary"></a>
                            <a href="<?php echo e(route('forecasts.changeStatus', ['id'=>$forecast->id, 'status'=>0])); ?>"
                               title="Очистить" class="btn btn-light btn-xs"></a>

                            <?php if($forecast->sort_ord==0): ?>
                                <input type="text" name="result" class="form-control border-success"
                                       value="<?php echo e($forecast->result); ?>" id="<?php echo e($forecast->id); ?>" placeholder="Результат">
                            <?php endif; ?>

                        </td>
                        <?php if($forecast->sort_ord ==1): ?>
                            <td>
                                <div class="btn-sm btn mb-2" style="border:1px solid">
                                    ЭКСПРЕСС
                                </div>
                                <br/>
                                <div class="pull-left m-t-10">
                                    <?php $__currentLoopData = $forecast->express['sort_id']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$sort_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <img src="<?php echo e(URL::asset('images/'.$sort::find($sort_id)->icon)); ?>" width="16"
                                             alt="<?php echo e($sort::find($sort_id)->name); ?>"
                                             title="<?php echo e($sort::find($sort_id)->name); ?>"> <br/>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <?php $__currentLoopData = $forecast->express['game']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$game): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <b><?php echo e($k+1); ?></b>. <?php echo e($game); ?> <b>/ <?php echo e($forecast->express['match'][$k]); ?></b> <br/>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <td>
                                <?php $__currentLoopData = $forecast->express['forecast']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$exp_forecast): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($exp_forecast); ?> <br/>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <td>
                                <?php $__currentLoopData = $forecast->express['coeff']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$coeff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <b><?php echo e($k+1); ?></b>. <?php echo e($coeff); ?> <br/>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <div class="border-top text-center">
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
                                <?php $__currentLoopData = $forecast->express['date']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <b><?php echo e($k+1); ?></b>. <?php echo e($date); ?> <br/>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                        <?php else: ?>
                            <td>
                                <div class="btn-sm btn mb-2" style="border:1px solid">
                                    <img src="<?php echo e(URL::asset('images/'.$forecast->sort->icon)); ?>" width="18"
                                         alt="<?php echo e($forecast->sort->name); ?>"
                                         title="<?php echo e($forecast->sort->name); ?>"> <?php echo e($forecast->sort->name); ?>

                                </div>
                                <br/>

                                <?php echo e($forecast->game); ?> <b>/ <?php echo e($forecast->match); ?></b>
                            </td>
                            <td><?php echo e($forecast->forecast); ?></td>
                            <td><?php echo e($forecast->coeff); ?></td>
                            <td><?php echo e($forecast->date); ?></td>
                        <?php endif; ?>


                        <td>
                            <?php if($forecast->paid === 0): ?>
                                <?php echo e($forecast->price); ?> руб.
                            <?php else: ?>
                                <img src="<?php echo e(asset('images/free.png')); ?>" title="Бесплатный" alt="Бесплатный">
                            <?php endif; ?>
                        </td>
                        <td>

                            <form action="<?php echo e(route('forecasts.destroy', $forecast->id)); ?>" method="post">
                                <input type="hidden" name="_method" value="delete">
                                <?php echo e(csrf_field()); ?>

                                <div class="btn-group mt-3">
                                    <a href="<?php echo e(route('forecasts.edit', $forecast->id)); ?>"
                                       class="btn btn-info btn-rounded waves-light waves-effect btn-sm"
                                       title="Редактировать"><i class="fa fa-edit"></i></a>

                                    <button type="submit"
                                            class="btn btn-danger btn-rounded waves-effect waves-light btn-sm"
                                            title="Удалить"><i class="fa fa-remove"></i></button>
                                    <a href="<?php echo e(route('forecast', $forecast->alias)); ?>" target="_blank"
                                       class="btn btn-primary  btn-rounded waves-effect waves-light btn-sm"
                                       title="Посмотреть"><i class="fa fa-eye"></i></a>
                                </div>
                            </form>

                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
            </table>
            <ul class="pagination justify-content-end pagination-split mt-0">
                <?php if($forecasts->lastPage() > 1): ?>

                    <?php if($forecasts->currentPage() !== 1): ?>
                        <li class="page-item">
                            <a class="page-link" href="<?php echo e($forecasts->previousPageUrl()); ?>" aria-label="Previous">
                                <span aria-hidden="true">«</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>

                    <?php endif; ?>

                    <?php for($i = max(1, $forecasts->currentPage()-5); $i <= min($forecasts->currentPage() + 5, $forecasts->lastPage()); $i++): ?>
                        <li class="page-item<?php echo e(($i == $forecasts->currentPage()) ? " active" : ''); ?>"><a
                                    href="<?php echo e($forecasts->url($i)); ?>" class="page-link"><?php echo e($i); ?></a></li>

                    <?php endfor; ?>

                    <?php if($forecasts->lastPage() > $forecasts->currentPage()): ?>
                        <li class="page-item">
                            <a class="page-link" href="<?php echo e($forecasts->nextPageUrl()); ?>" aria-label="Next">
                                <span aria-hidden="true">»</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>

                    <?php endif; ?>

                <?php endif; ?>
            </ul>
        </div>
    </div>
</div> <!-- end row -->

