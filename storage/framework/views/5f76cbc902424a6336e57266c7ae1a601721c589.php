

<?php $__env->startSection('content'); ?>
    <?php echo $content; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <!--Wysiwig js-->
    <script src="<?php echo e(URL::asset('admin/assets/plugins/tinymce/tinymce.min.js')); ?>"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            if($("#description").length > 0){
                tinymce.init({
                    selector: "textarea#description",
                    theme: "modern",
                    height:300,
                    plugins: [
                        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                        "save table contextmenu directionality emoticons template paste textcolor"
                    ],
                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                    style_formats: [
                        {title: 'Bold text', inline: 'b'},
                        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                        {title: 'Example 1', inline: 'span', classes: 'example1'},
                        {title: 'Example 2', inline: 'span', classes: 'example2'},
                        {title: 'Table styles'},
                        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                    ]
                });
            }
        });

        $('#paid').change(function () {
            if($(this).val()==1){
                $('#price_group').hide();
            }else{
                $('#price_group').show();
            }
        });

        if($( "#paid option:selected" ).val()==1){
            $('#price_group').hide();
        }

        $('#sort_ord').change(function () {
            if($(this).val()==0){
                $('#forecasts_express').hide();
                $('#sort_ordinar').show();
            }else{
                $('#forecasts_express').show();
                $('#sort_ordinar').hide();
            }
        });

        if($( "#sort_ord option:selected" ).val()==0){
            $('#sort_ordinar').show();
            $('#forecasts_express').hide();
        }else{
            $('#sort_ordinar').hide();
            $('#forecasts_express').show();
        }

        function changeCoeff()
        {
            var sum = 0;
            $('.coeff_input').each(function() {
                sum += Number($(this).val());
            });
            $('#coeff_summ span').html(sum.toFixed(2));
        }

        $('#plus-forecast').click(function(e){
            e.preventDefault();
            var forecast = $('#forecasts_express .form-row');
            forecast.first().clone(true).find("input:text").val("").end().appendTo('#forecasts_express:last');
            changeCoeff();
        });

        $('#forecasts_express .form-row').on('click', '.minus-forecaste', function(e){
            e.preventDefault();
            var count_elements = $('#forecasts_express .form-row').length;
            if(count_elements !== 1) {
                $(this).parent().parent().remove();
            }else{
                alert('Первый элемент не можно удалить!')
            }
            changeCoeff();
        });

        $('#forecasts_express .form-row .coeff_input').on("change paste keyup", function(){
            changeCoeff();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>