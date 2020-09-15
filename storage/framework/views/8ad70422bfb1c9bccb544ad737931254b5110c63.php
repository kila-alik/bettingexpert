<div class="row">
    <div class="col-md-4">
        <div class="card-box">
            <h4 class="header-title m-b-30">Обновить вид спорта</h4>

            <form action="<?php echo e(route('sort.update', $sort->id)); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Имя<span class="text-danger">*</span></label>
                    <input type="text" name="name" placeholder="Имя" class="form-control" id="name" value="<?php echo e($sort->name); ?>">
                </div>
                <div class="form-group">
                    <label for="alias">URL адрес(alias)<span class="text-danger">*</span></label>
                    <input type="text" name="alias" placeholder="URL адрес(alias)" class="form-control" id="alias" value="<?php echo e($sort->alias); ?>">
                </div>
                <div class="form-group">
                    <label>Иконка<span class="text-danger">*</span></label>
                    <input type="file" name="icon" />
                    <img src="<?php echo e(URL::asset('/images/'.$sort->icon)); ?>" alt="" height="50">
                </div>

                <?php if(count($errors->all()) > 0): ?>
                    <div class="alert alert-danger">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($error); ?> <br />
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>

                <div class="form-group text-left m-b-0 m-t-25">
                    <?php echo e(csrf_field()); ?>

                    <a href="<?php echo e(route('sort.index')); ?>" class="btn btn-info"><i class="fa fa-arrow-left"></i> назад</a>

                    <input type="hidden" name="_method" value="put">
                    <button class="btn btn-custom waves-effect waves-light pull-right" type="submit">
                        Обновить
                    </button>
                </div>

            </form>
        </div>
    </div>
    <div class="col-md-8">
        <?php echo $__env->make('admin.sorts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
</div>