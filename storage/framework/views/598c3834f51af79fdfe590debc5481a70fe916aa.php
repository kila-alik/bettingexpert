<section id="spec-inner-page" class="pb-125 pt-100 light">
    <div class="container">
        <div class="row">

            <div class="col-md-9">

                <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card">
                    <h2><a href="<?php echo e(route('newsShow', $item->alias)); ?>"><strong><?php echo e($item->title); ?></strong></a></h2>
                    <ul class="list-inline desc-text mb-10">
                        <li><i class="icon-calendar-empty icon-position-left"></i>
                            <span class="spr-option-textedit"><?php echo e($item->created_at->format('d.m.Y H:i')); ?></span>
                        </li>
                        <li><i class="icon-pickaxe icon-position-left"></i>
                            <span class="spr-option-textedit"><a href="<?php echo e(route('news.category', $item->category->alias)); ?>"><?php echo e($item->category->name); ?></a></span>
                        </li>
                    </ul>

                    <img src="<?php echo e(URL::asset('/images/'.$item->image)); ?>" alt="chart" class="screen mb-25">
                    <div class="mb-10">
                        <?php echo e(str_limit(strip_tags($item->text), 750)); ?>

                        <a href="<?php echo e(route('newsShow', $item->alias)); ?>" class="btn btn-light">Читать далее</a>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <div class="pagination p12">
                        <ul>
                            <?php if($news->lastPage() > 1): ?>

                                <?php if($news->currentPage() !== 1): ?>
                                    <a href="<?php echo e($news->previousPageUrl()); ?>"><li><</li></a>
                                <?php endif; ?>


                                <?php for($i = max(1, $news->currentPage()-5); $i <= min($news->currentPage() + 5, $news->lastPage()); $i++): ?>
                                    <a href="<?php echo e($news->url($i)); ?>" class="<?php echo e(($i == $news->currentPage()) ? "is-active" : ''); ?>"><li><?php echo e($i); ?></li></a>

                                <?php endfor; ?>

                                <?php if($news->lastPage() > $news->currentPage()): ?>
                                    <a href="<?php echo e($news->nextPageUrl()); ?>"><li>></li></a>
                                <?php endif; ?>

                            <?php endif; ?>
                        </ul>
                    </div>
            </div>

            <div class="col-md-3">
                <div class="widget border-box padding-box spr-option-copy-del">
                    <p>Свежие новости российского и мирового спорта, фоторепортажи и онлайны-трансляции главных матчей. Футбол, хоккей, баскетбол, теннис, биатлон, бокс, MMA, Formula 1 и другие виды спорта.</p>
                </div>

                <div class="widget">
                    <img class="screen" src="<?php echo e(URL::asset('images/news.jpg')); ?>" alt="banner">
                </div>
            </div>
            <div class="col-md-3">
                <ul class="list-group widget border-box padding-box spr-option-copy-del">

                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="list-group-item <?php echo e(Request::is('news/category/'.$category->alias) ? 'active' : ''); ?>">
                        <span class="badge"><?php echo e($category->news->count()); ?></span>
                        <a href="<?php echo e(route('news.category', $category->alias)); ?>"><?php echo e($category->name); ?></a>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="bg"></div>
</section>
