<?php $__env->startSection('navigation'); ?>
    <?php echo $navigation; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make(env('THEME').'.layouts.tomorrow', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>