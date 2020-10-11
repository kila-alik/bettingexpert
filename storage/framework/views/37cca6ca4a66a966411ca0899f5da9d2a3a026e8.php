<?php $__env->startSection('header'); ?>
  <?php echo $__env->make(env('THEME').'.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('navigation'); ?>
  <?php echo $navigation; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('baner'); ?>
  <?php echo $__env->make(env('THEME').'.baner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  Коэффициент игры <?php echo $content; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
  <?php echo $__env->make(env('THEME').'.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(env('THEME').'.layouts.today', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH W:\domains\bettingexpert.loc\resources\views/bett/index.blade.php ENDPATH**/ ?>