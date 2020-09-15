<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title">Все новости</h4>
            <p class="text-muted font-14 m-b-30">
                <a href="<?php echo e(route('news.create')); ?>" class="btn btn-primary">Добавить новый</a>
            </p>

            <?php if(!empty(session('status'))): ?>
                <div class="alert alert-success">
                    <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?>

            <table id="datatable" class="table table-bordered">
                <thead>
                <tr>
                    <th>Категория</th>
                    <th>Картинка</th>
                    <th>Имя</th>
                    <th>Текст</th>
                    <th>Время</th>
                    <th></th>
                </tr>
                </thead>


                <tbody>

                <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($item->category->name); ?></td>
                        <td><img src="<?php echo e(URL::asset('images/'.$item->image)); ?>" width="100" alt="<?php echo e($item->title); ?>" title="<?php echo e($item->title); ?>"></td>
                        <td><?php echo e($item->title); ?></td>
                        <td><?php echo e(str_limit($item->text, 250)); ?></td>
                        <td><?php echo e($item->created_at); ?></td>
                        <td class="text-right">
                            <a href="<?php echo e(route('news.edit', $item->id)); ?>" class="btn btn-info btn-rounded waves-light waves-effect"  title="Редактировать"><i class="fa fa-edit"></i></a>
                            <form action="<?php echo e(route('news.destroy', $item->id)); ?>" method="post" class="d-inline-block">
                                <input type="hidden" name="_method" value="delete">
                                <?php echo e(csrf_field()); ?>

                                <button type="submit" class="btn btn-danger btn-rounded btn-block waves-light waves-effect" title="Удалить"><i class="fa fa-remove"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
            </table>
            <ul class="pagination justify-content-end pagination-split mt-0">
                <?php if($news->lastPage() > 1): ?>

                    <?php if($news->currentPage() !== 1): ?>
                        <li class="page-item">
                            <a class="page-link" href="<?php echo e($news->previousPageUrl()); ?>" aria-label="Previous">
                                <span aria-hidden="true">«</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>

                    <?php endif; ?>

                    <?php for($i = max(1, $news->currentPage()-5); $i <= min($news->currentPage() + 5, $news->lastPage()); $i++): ?>
                        <li class="page-item<?php echo e(($i == $news->currentPage()) ? " active" : ''); ?>"><a href="<?php echo e($news->url($i)); ?>" class="page-link"><?php echo e($i); ?></a></li>

                    <?php endfor; ?>

                    <?php if($news->lastPage() > $news->currentPage()): ?>
                        <li class="page-item">
                            <a class="page-link" href="<?php echo e($news->nextPageUrl()); ?>" aria-label="Next">
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

