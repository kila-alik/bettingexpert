@extends('layouts.site')

@section('content')
    {!! $content !!}
@endsection

@section('scripts')
    <script>
        $('a.open_this_table').click(function(e){
            e.preventDefault();
            var parent =  $(this).parent().parent();
            parent.find('.hide_table_td').toggle();
            parent.find(".table_coeff_border_none").toggleClass('table_coeff_border');
            parent.find('.hide_date').toggle();
            $(this).find('.icon-plus-square').toggleClass('icon-minus-square');
        });

        $('#benefit-2col .row a.open_table').click(function(e){
            e.preventDefault();
            var parent =  $(this).parent().parent();
            parent.find('.hide_table').toggle();
        });

        $('#switch-paid-free').change(function(){
            if($(this).is(':checked')) {
                $('#paid').hide();
                $('#free').show();
            }else{
                $('#paid').show();
                $('#free').hide();
            }
        })
    </script>
@endsection