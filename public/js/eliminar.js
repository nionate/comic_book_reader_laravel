$(function(){
    /*$.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
    });*/

    $(document).on('click', '#btn-eliminar', function(){
        var url = $(this).data('href');
        var comic_id = $(this).data('id');
        bootbox.confirm("¿Está seguro de eliminar este comic?", function(result){
            if(result)
            {
                $.post(url, {id:comic_id}).done(function (data) {
                    iziToast.success({
                        title: 'OK',
                        message: 'Comic eliminado',
                    });

                    //eliminar elemento de la lista
                    console.log($(this).parent().parent());
                });

                $("[data-href='"+url+"']").parent().parent().fadeOut('slow');

            }
        });
    });
});