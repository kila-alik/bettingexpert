@extends('layouts.admin')

@section('content')
    {!! $content !!}
@endsection

@section('scripts')
    <!--Wysiwig js-->
    <script src="{{ URL::asset('admin/assets/plugins/tinymce/tinymce.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            var editor_config = {
                path_absolute : "/control-panel/",
                selector: "textarea#description",
                language: 'ru',
                height: 300,
                plugins: [
                    'charactercount',
                    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                    "insertdatetime media nonbreaking save table contextmenu directionality",
                    "emoticons template paste textcolor colorpicker textpattern"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
                style_formats: [
                    {title: 'Bold text', inline: 'b'},
                    {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                    {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                    {title: 'Example 1', inline: 'span', classes: 'example1'},
                    {title: 'Example 2', inline: 'span', classes: 'example2'},
                    {title: 'Table styles'},
                    {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                ],
                relative_urls: false,
                file_browser_callback : function(field_name, url, type, win) {
                    var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                    var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                    var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                    if (type == 'image') {
                        cmsURL = cmsURL + "&type=Images";
                    } else {
                        cmsURL = cmsURL + "&type=Files";
                    }

                    tinyMCE.activeEditor.windowManager.open({
                        file : cmsURL,
                        title : 'Filemanager',
                        width : x * 0.7,
                        height : y * 0.7,
                        resizable : "yes",
                        close_previous : "no"
                    });
                }
            };

            tinymce.init(editor_config);


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
            let sum = 1;
            $('.coeff_input').each(function() {
                let coeff = Number($(this).val());

                if(Number($(this).val()) === 0){
                    coeff = 1;
                }

                sum *= coeff;
                console.log(sum);
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

        $('#title').on("change paste keyup", function(){
            var value = $(this).val();
            $(this).parent().find('span.text-success').html(value.length);
        });

        $('#meta_description').on("change paste keyup", function(){
            var value = $(this).val();
            $(this).parent().find('span.text-success').html(value.length);
        });



        /*
        Chnage Result
         */
        $('#datatable input[name="result"]').keypress(function(e){
            if (e.which === 13) {
                var forecastId = $(this).attr('id');
                var url = '{{ route('forecasts.updateResult', ":id") }}';
                url = url.replace(':id', forecastId);
                request = $.ajax({
                    url: url,
                    type: "post",
                    data: {'data': $(this).val()},
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                // Callback handler that will be called on success
                request.done(function (response, textStatus, jqXHR) {
                    // Log a message to the console
                    if(response.success==='true'){
                        alert('Результат успешно сохранено!');
                    }else{
                        alert('Ошибка!')
                    }
                });

                // Callback handler that will be called on failure
                request.fail(function (jqXHR, textStatus, errorThrown) {
                    // Log the error to the console
                    console.error(
                        "The following error occurred: " +
                        textStatus, errorThrown
                    );
                });
            }
        });
    </script>
@endsection
