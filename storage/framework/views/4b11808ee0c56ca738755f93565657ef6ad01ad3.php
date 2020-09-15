<div class="card-box">
    <h4 class="header-title m-b-30">Добавить новость</h4>

    <form action="<?php echo e(route('news.update', $news->id)); ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Имя<span class="text-danger">*</span></label>
            <input type="text" name="title" placeholder="Имя" class="form-control" id="name" value="<?php echo e($news->title); ?>">
        </div>
        <div class="form-group">
            <label for="alias">URL адрес(alias)</label>
            <input type="text" name="alias" placeholder="URL адрес(alias)" class="form-control" id="alias" value="<?php echo e($news->alias); ?>">
        </div>
        <div class="form-group">
            <label for="description">Текст <span class="text-danger">*</span></label>
            <textarea name="text" class="form-control" id="description" cols="30" rows="5" placeholder=""><?php echo e($news->text); ?></textarea>
        </div>
        <div class="form-group">
            <label for="keywords">Keywords<span class="text-danger">*</span></label>
            <input type="text" name="keywords" placeholder="Keywords" class="form-control" id="keywords" value="<?php echo e($news->keywords); ?>">
        </div>
        <div class="form-group">
            <label for="description">Description<span class="text-danger">*</span></label>
            <input type="text" name="description" placeholder="Description" class="form-control" id="description" value="<?php echo e($news->description); ?>">
        </div>
        <div class="form-group">
            <label>Картинка<span class="text-danger">*</span></label>
            <input type="file" name="image" />
        </div>
        <div class="form-group">
            <img src="<?php echo e(URL::asset('/images/'.$news->image)); ?>" height="200" alt="">
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

        <div class="form-group text-left m-b-0">
            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="_method" value="put">
            <button class="btn btn-custom waves-effect waves-light" type="submit">
                Обновить
            </button>
        </div>

    </form>
</div>