$(document).ready(function() {
    alertify.logPosition("bottom right");
   // var filename="";
    //show proyecto
    $('[data-route]').click(function(e) {
        e.preventDefault();;
        var id = $(this).parents("tr").find("td").eq(0).html();
        var unidad = $(this).parents("tr").find("td").eq(1).html();
        var titulo = $(this).parents("tr").find("td").eq(2).html();
        var link = $(this).parents("tr").find("td").eq(3).html();
        var foto = $(this).parents("tr").find("td").eq(4).html();
        $('input[name=idSlider]').val(id);
        $('input[name=VMtitulo]').val(titulo);
        $('input[name=VMlink]').val(link);
        $('input[name=fileFoto]').val(foto);
        //$('#VMfoto').val();
        $('#idUnidadAcademica option[ids="' + unidad + '"]').prop("selected", true);

    });
    //Delete proyecto
    $('.bnt-delete').click(function(e) {
        e.preventDefault();
        var row = $(this).parents('tr');
        var form = $(this).parents('form');
        var url = form.attr('action');
        alertify.confirm("Está seguro que desea eliminar?",
            function() {
                $.post(url, form.serialize(), function(result) {
                    row.fadeOut();
                    alertify.success(result.mensaje);
                }).fail(function(error) {
                    alertify.error('Error al eliminar');
                });
            }
        );
    });



    //Update  proyecto
    $('[data-update]').click(function(e) {
        e.preventDefault();
        var titulo = $('input[name=VMtitulo]').val();
        var link = $('input[name=VMlink]').val();
        var FileImage = $('#VMfoto')[0];
        var filess = FileImage.files[0];
        var formData = new FormData();
         formData.append('archivo',filess);
        //if (filename==""){
       //    filename =  $('input[name=fileFoto]').val();
       // }
        var unidad = $('#idUnidadAcademica option:selected').val();
        var id = $('input[name=idSlider]').val();
        var ruta = $('input[name=ruta]').val();
        var url = ruta + id;
        var token = $('input[name=_token]').val();
        debugger
        $.ajax({
            data: formData,
            type: "PUT",
            dataType: "json",
            url: url,
            cache: false,
            contentType: false,
            processData: false,
            headers: { 'X-CSRF-TOKEN': token },
        }).done(function(data, textStatus, jqXHR) {
            debugger
            alertify.success(data.mensaje);
            location.reload();
        }).fail(function(jqXHR, textStatus) {
            debugger
            alertify.error('Error al actualizar');
        });
    });
});