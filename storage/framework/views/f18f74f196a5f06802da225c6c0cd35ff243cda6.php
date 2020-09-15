<div class="card-box table-responsive">
    <h4 class="m-t-0 header-title">Все види спортов</h4>

    <?php if(!empty(session('status'))): ?>
        <div class="alert alert-success">
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>

    <table id="datatable" class="table table-bordered">
        <thead>
        <tr>
            <th>Вид</th>
            <th>Имя</th>
            <th>URL адрес(alias)</th>
            <th></th>
        </tr>
        </thead>


        <tbody>

        <?php $__currentLoopData = $sorts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sort_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><img src="<?php echo e(URL::asset('images/'.$sort_item->icon)); ?>" width="18" alt="<?php echo e($sort_item->name); ?>" title="<?php echo e($sort_item->name); ?>"></td>
                <td><?php echo e($sort_item->name); ?></td>
                <td><?php echo e($sort_item->alias); ?></td>
                <td class="text-right">
                    <a href="<?php echo e(route('sort.edit', $sort_item->id)); ?>" class="btn btn-info btn-rounded waves-light waves-effect"><i class="fa fa-edit"></i></a>
                    <form action="<?php echo e(route('sort.destroy', $sort_item->id)); ?>" method="post" class="d-inline-block">
                        <input type="hidden" name="_method" value="delete">
                        <?php echo e(csrf_field()); ?>

                        <button type="submit" class="btn btn-danger btn-rounded waves-light waves-effect"><i class="fa fa-remove"></i></button>
                    </form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
    </table>
</div>