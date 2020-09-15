<?php $__env->startSection('content'); ?>
    <?php echo $content; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $('a.open_this_table').click(function(e){
            e.preventDefault();
            var parent =  $(this).parent().parent();
            parent.find('.hide_table_td').toggle();
            parent.find(".table_coeff_border_none").toggleClass('table_coeff_border');
            parent.find('.hide_date').toggle();
            $(this).find('.icon-plus-square').toggleClass('icon-minus-square');

        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.site', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>