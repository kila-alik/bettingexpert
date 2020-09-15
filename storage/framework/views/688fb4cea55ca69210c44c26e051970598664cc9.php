<section id="testimonials-4col-2row" class="pt-75 pb-125 text-left light">
    <div class="container">
        <div class="container gallery">
            <div class="page-header">
                <h1 id="timeline">Отзывы наших клиентов</h1>
                <a href="#add-review" target="_self" class="smooth btn btn-primary btn-sm">
                    <span style="" class="spr-option-textedit-link"><i class="icon icon-plus-square"></i> Оставить отзыв </span>
                </a>
            </div>
            <ul class="timeline">
                <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($k % 2 == 0): ?>
                        <li>
                    <?php else: ?>
                        <li class="timeline-inverted">
                    <?php endif; ?>
                            <img src="<?php echo e(Gravatar::src($review->user->email, 80)); ?>" height="30" class="timeline-badge warning avatar" title="<?php echo e($review->user->name); ?>" alt="<?php echo e($review->user->name); ?>">
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title"><?php echo e(ucfirst($review->user->name)); ?></h4>
                                    <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i><?php echo e($review->created_at->format('Y-m-d H:i')); ?></small></p>
                                </div>
                                <div class="timeline-body">
                                    <?php if($review->screenshot): ?>
                                        <a href="<?php echo e(URL::asset('/images/'.$review->screenshot)); ?>" class="gallery-box gallery-style-4">
                                            <span class="caption"><strong class="word-wrap"><?php echo e($review->review); ?></strong></span>
                                            <img src="<?php echo e(URL::asset('/images/'.$review->screenshot)); ?>" class="height-200" alt="screen">
                                        </a>
                                    <?php endif; ?>
                                    <p>
                                        <?php echo e($review->review); ?>

                                    </p>
                                </div>
                            </div>
                        </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <?php if(count($reviews) < 1): ?>
            <h3>Нет отзывы</h3>
        <?php endif; ?>

        <div class="pagination p13">
            <ul>
                <?php if($reviews->lastPage() > 1): ?>

                    <?php if($reviews->currentPage() !== 1): ?>
                        <a href="<?php echo e($reviews->previousPageUrl()); ?>"><li><</li></a>
                    <?php endif; ?>


                    <?php for($i = max(1, $reviews->currentPage()-5); $i <= min($reviews->currentPage() + 5, $reviews->lastPage()); $i++): ?>
                        <a href="<?php echo e($reviews->url($i)); ?>" class="<?php echo e(($i == $reviews->currentPage()) ? "is-active" : ''); ?>"><li><?php echo e($i); ?></li></a>

                    <?php endfor; ?>

                    <?php if($reviews->lastPage() > $reviews->currentPage()): ?>
                        <a href="<?php echo e($reviews->nextPageUrl()); ?>"><li>></li></a>
                    <?php endif; ?>

                <?php endif; ?>
            </ul>
        </div>
    </div>
    <hr>
    <div class="container" id="add-review">
        <div class="col-md-6 mb-40">
            <h2 class="">Оставить отзыв</h2>
            <h4 class="mb-50">Вы очень важны для нас,
                <br>оставьте свои отзывы о наших прогнозах.</h4>
        </div>
        <div class="col-md-6 mb-40">
            <form action="<?php echo e(route('addReview')); ?>" method="post" enctype="multipart/form-data" class="contact_form" novalidate="novalidate" id="add-review-form-2-form">
                <div class="form-group">
                    <label for="">Скриншот ставки</label> <input type="file" name="screenshot" class="file-box form-control form-control-file"  <?php if(auth()->guard()->guest()): ?> disabled="disabled" <?php endif; ?>>
                </div>
                <div class="form-group">
                    <label for="">Отзыв <span class="text-danger">*</span></label>
                    <textarea <?php if(auth()->guard()->guest()): ?> disabled="disabled" <?php endif; ?> class="spr-textarea form-control" rows="3" placeholder="<?php if(auth()->guard()->guest()): ?>Отзыв может оставить только зарегистрированные пользователи... <?php else: ?>Ваш отзыв... <?php endif; ?>" name="review" required="required"></textarea>
                </div>
                <?php echo e(csrf_field()); ?>

                <button <?php if(auth()->guard()->guest()): ?> disabled="disabled" <?php endif; ?> type="submit" data-loading-text="•••" data-complete-text="Ваш отзыв успешно отправлен на проверку!" data-reset-text="Попробуйте позже..." class="btn btn-block btn-primary"><i class="icon-paper-plane icon-position-left icon-size-m"></i><span class="spr-option-textedit-link">Оставить отзыв</span></button>
            </form>
            <?php if(count($errors->all()) > 0): ?>
                <div class="alert alert-danger text-center">
                    <strong><?php echo e($errors->all()[0]); ?></strong>
                </div>
            <?php endif; ?>
            <?php if(session('status')): ?>
                <div class="alert alert-success text-center">
                    <strong><?php echo e(session('status')); ?></strong>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="bg"></div>
</section>