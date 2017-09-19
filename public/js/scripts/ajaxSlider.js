$(document).ready(function() {
    alertify.logPosition("bottom right");
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
        $('input[name=VMfoto]').val(foto);
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
        var formData = new FormData($('#uploadimage')[0]);
        debugger
        var id = $('input[name=idSlider]').val();
        var ruta = $('input[name=ruta]').val();
        var url = ruta + id;
        var token = $('input[name=_token]').val();
        $.ajax({
            url: url,
            headers: { 'X-CSRF-TOKEN': token },
            type: "POST",
            dataType: "json",
            contentType: false,
            processData: false,
            data: formData,
        }).done(function(data, textStatus, jqXHR) {
            alertify.success(data.mensaje);
            location.reload();
        }).fail(function(jqXHR, textStatus) {
            alertify.error('Error al  actualizar');
        });
    });
});