<?php $__env->startSection('header'); ?>
  <?php echo $__env->make(env('THEME').'.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('navigation'); ?>
  <?php echo $navigation; ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <h1> Страница находится в разработке </h1>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer'); ?>
  <?php echo $__env->make(env('THEME').'.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(env('THEME').'.layouts.today', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>