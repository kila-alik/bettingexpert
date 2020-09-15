<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title">Все отзывы</h4>
            <?php if(!empty(session('status'))): ?>
                <div class="alert alert-success">
                    <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?>

            <table id="datatable" class="table table-bordered" style="table-layout: fixed; ">
                <thead>
                <tr>
                    <th>Пользователь</th>
                    <th>Отзыв</th>
                    <th>Скриншот</th>
                    <th>Время</th>
                    <th>Одобренный</th>
                    <th></th>
                </tr>
                </thead>


                <tbody>

                <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <img src="<?php echo e(Gravatar::src($item->user->email, 50)); ?>" class="rounded-circle img-thumbnail" alt="profile-image">
                            <b><?php echo e($item->user->name); ?></b><br />
                            <?php echo e($item->user->email); ?>

                        </td>
                        <td style="word-wrap: break-word;"><?php echo e(str_limit($item->review, 300)); ?></td>
                        <td><img src="<?php echo e(URL::asset('/images/'.$item->screenshot)); ?>" width="200" alt=""></td>
                        <td><?php echo e($item->created_at); ?></td>
                        <td>
                            <?php if($item->confirmed===1): ?>
                                <span class="badge badge-success">ДА</span>
                            <?php else: ?>
                                <span class="badge badge-secondary">НЕТ</span>
                            <?php endif; ?>

                        </td>
                        <td class="text-right">
                            <form action="<?php echo e(route('reviews.confirm')); ?>" method="post" class="d-inline-block">
                                <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="id" value="<?php echo e($item->id); ?>">
                                <button type="submit" class="btn btn-primary btn-rounded btn-block waves-light waves-effect" title="Одобрить"><i class="fa fa-check"></i></button>
                            </form>
                            <form action="<?php echo e(route('reviews.confirm')); ?>" method="post" class="d-inline-block">
                                <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="id" value="<?php echo e($item->id); ?>">
                                <button type="submit" name="submit_cancel" value="1" class="btn btn-warning btn-rounded btn-block waves-light waves-effect" title="Снять"><i class="fa fa-close"></i></button>
                            </form>
                            <form action="<?php echo e(route('reviews.destroy', $item->id)); ?>" method="post" class="d-inline-block">
                                <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="_method" value="delete">
                                <button type="submit" class="btn btn-danger btn-rounded btn-block waves-light waves-effect" title="Снять">Удалить</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
            </table>
        </div>
        <ul class="pagination justify-content-end pagination-split mt-0">
            <?php if($reviews->lastPage() > 1): ?>

                <?php if($reviews->currentPage() !== 1): ?>
                    <li class="page-item">
                        <a class="page-link" href="<?php echo e($reviews->previousPageUrl()); ?>" aria-label="Previous">
                            <span aria-hidden="true">«</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>

                <?php endif; ?>

                <?php for($i = max(1, $reviews->currentPage()-5); $i <= min($reviews->currentPage() + 5, $reviews->lastPage()); $i++): ?>
                    <li class="page-item<?php echo e(($i == $reviews->currentPage()) ? " active" : ''); ?>"><a href="<?php echo e($reviews->url($i)); ?>" class="page-link"><?php echo e($i); ?></a></li>

                <?php endfor; ?>

                <?php if($reviews->lastPage() > $reviews->currentPage()): ?>
                    <li class="page-item">
                        <a class="page-link" href="<?php echo e($reviews->nextPageUrl()); ?>" aria-label="Next">
                            <span aria-hidden="true">»</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>

                <?php endif; ?>

            <?php endif; ?>
        </ul>
    </div>
</div> <!-- end row -->

