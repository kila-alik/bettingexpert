<div class="card-box">
    <h4 class="header-title m-b-30">Добавить новость</h4>

    <form action="<?php echo e(route('news.store')); ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Имя<span class="text-danger">*</span></label>
            <input type="text" name="title" placeholder="Имя" class="form-control" id="name" value="<?php echo e(old('title')); ?>">
        </div>
        <div class="form-group">
            <label for="alias">URL адрес(alias)</label>
            <input type="text" name="alias" placeholder="URL адрес(alias)" class="form-control" id="alias" value="<?php echo e(old('alias')); ?>">
        </div>
        <div class="form-group">
            <label for="description">Текст <span class="text-danger">*</span></label>
            <textarea name="text" class="form-control" id="description" cols="30" rows="5" placeholder=""><?php echo e(old('text')); ?></textarea>
        </div>
        <div class="form-group">
            <label for="keywords">Keywords<span class="text-danger">*</span></label>
            <input type="text" name="keywords" placeholder="Keywords" class="form-control" id="keywords" value="<?php echo e(old('keywords')); ?>">
        </div>
        <div class="form-group">
            <label for="meta_description">Description<span class="text-danger">*</span></label>
            <input type="text" name="description" placeholder="Description" class="form-control" id="meta_description" value="<?php echo e(old('description')); ?>">
        </div>
        <div class="form-group">
            <label>Картинка<span class="text-danger">*</span></label>
            <input type="file" name="image" class="filestyle" data-buttontext="Select file" data-btnClass="btn-light">
        </div>
        <?php if(count($errors->all()) > 0): ?>
            <div class="alert alert-danger">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($error); ?> <br />
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>

        <?php if(!empty(session('status'))): ?>
            <div class="alert alert-success">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>

        <div class="form-group text-left m-b-0 m-t-50">
            <?php echo e(csrf_field()); ?>

            <button class="btn btn-custom waves-effect waves-light" type="submit">
                Добавить
            </button>
        </div>

    </form>
</div>