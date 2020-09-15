<div class="row">
    <div class="col-md-4">
        <div class="card-box">
            <h4 class="header-title m-b-30">Добавить вид спорта</h4>

            <form action="<?php echo e(route('sort.store')); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Игра<span class="text-danger">*</span></label>
                    <input type="text" name="name" placeholder="Имя" class="form-control" id="name" value="<?php echo e(old('name')); ?>">
                </div>
                <div class="form-group">
                    <label for="alias">URL адрес(alias)<span class="text-danger">*</span></label>
                    <input type="text" name="alias" placeholder="URL адрес(alias)" class="form-control" id="alias" value="<?php echo e(old('alias')); ?>">
                </div>
                <div class="form-group">
                    <label>Иконка<span class="text-danger">*</span></label>
                    <input type="file" name="icon" />
                </div>

                <?php if(count($errors->all()) > 0): ?>
                    <div class="alert alert-danger">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($error); ?> <br />
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>

                <div class="form-group text-left m-b-0">
                    <?php echo e(csrf_field()); ?>

                    <button class="btn btn-custom waves-effect waves-light" type="submit">
                        Добавить
                    </button>
                </div>

            </form>
        </div>
    </div>
    <div class="col-md-8">
        <?php echo $__env->make('admin.sorts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
</div> <!-- end row -->