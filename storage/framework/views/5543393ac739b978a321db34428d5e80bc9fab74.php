<div id="app">
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="pull-right">
                <a href="#" class="btn btn-primary btn-sm" @click="showModal">Добавить пользователь</a>
            </div>
            <a class="btn btn-outline-dark waves-light waves-effect btn-sm" href="<?php echo e(route('forecasters.index')); ?>"><i class="fa fa-user-circle-o"></i> Прогнозисты</a>
            <a class="btn btn-outline-dark waves-light waves-effect btn-sm active" href="<?php echo e(route('users.index')); ?>"><i class="fa fa-users"></i> Пользователи</a>
        </div>
        <user-add-edit-component ref="userAddEdit" v-show="modalShow"></user-add-edit-component>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-3">
                <div class="text-center card-box">

                    <div class="member-card pt-2 pb-2">
                        <div class="col-md-2 pull-right">
                            <i class="fa fa-edit edit-component button" title="Редактировать" @click="showModal(<?php echo e($user->id); ?>)"></i>
                        </div>
                        <div class="col-md-1">
                            <b>ID:</b> <?php echo e($user->id); ?>

                        </div>
                        <div class="thumb-lg member-thumb m-b-10 mx-auto">
                            <img src="<?php echo e($user->avatar ? asset('avatars/'.$user->avatar) : Gravatar::src($user->email, 100)); ?>" class="rounded-circle img-thumbnail" alt="profile-image">
                        </div>

                        <div class="">
                            <h4 class="m-b-5"><?php echo e($user->name); ?></h4>
                            <p class="text-muted"><?php echo e($user->email ? $user->email : '&nbsp;'); ?></p>
                        </div>

                        <div class="mt-4">
                            <div class="row">
                                <div class="col-6">
                                    <div class="mt-3">
                                        <h4 class="m-b-5"><?php echo e($user->payments()->where('fk_intid', '!=', 0)->count()); ?></h4>
                                        <p class="mb-0 text-muted">Количество покупок</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mt-3">
                                        <h4 class="m-b-5"><?php echo e($user->payments()->where('fk_intid', '!=', 0)->sum('amount')); ?> ₽</h4>
                                        <p class="mb-0 text-muted">Сумма покупок</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 border-top">
                            <strong>Дата регистрации:</strong> <?php echo e($user->created_at); ?>

                        </div>

                    </div>

                </div>

            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <div class="text-right">
            <ul class="pagination justify-content-end pagination-split mt-0">
                <?php if($users->lastPage() > 1): ?>

                    <?php if($users->currentPage() !== 1): ?>
                        <li class="page-item">
                            <a class="page-link" href="<?php echo e($users->previousPageUrl()); ?>" aria-label="Previous">
                                <span aria-hidden="true">«</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>

                    <?php endif; ?>

                    <?php for($i = max(1, $users->currentPage()-5); $i <= min($users->currentPage() + 5, $users->lastPage()); $i++): ?>
                        <li class="page-item<?php echo e(($i == $users->currentPage()) ? " active" : ''); ?>"><a href="<?php echo e($users->url($i)); ?>" class="page-link"><?php echo e($i); ?></a></li>

                    <?php endfor; ?>

                    <?php if($users->lastPage() > $users->currentPage()): ?>
                        <li class="page-item">
                            <a class="page-link" href="<?php echo e($users->nextPageUrl()); ?>" aria-label="Next">
                                <span aria-hidden="true">»</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>

                    <?php endif; ?>

                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>
