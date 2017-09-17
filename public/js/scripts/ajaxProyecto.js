$(document).ready(function() {
    alertify.logPosition("bottom right");
    //show proyecto
    $('[data-route]').click(function(e) {
        e.preventDefault();;
        var id = $(this).parents("tr").find("td").eq(0).html();
        var autor = $(this).parents("tr").find("td").eq(3).html();
        var titulo = $(this).parents("tr").find("td").eq(4).html();
        var contenido = $(this).parents("tr").find("td").eq(5).html();
        var unidad = $(this).parents("tr").find("td").eq(1).html();
        var categoria = $(this).parents("tr").find("td").eq(2).html();
        var estado = $(this).parents("tr").find("td").eq(6).html();
        $('input[name=VMfoto]').val($('input[name=fotoTable]').val());
        $('input[name=idProyecto]').val(id);
        $('input[name=VMautor]').val(autor);
        $('input[name=VMtitulo]').val(titulo);
        $('#contenido').text(contenido);
        $('#idUnidadAcademica option[ids="' + unidad + '"]').prop("selected", true);
        $('#idCategoriaproyecto option[ids="' + categoria + '"]').prop("selected", true);
        $('#idEstadoproyecto option[ids="' + estado + '"]').prop("selected", true);
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
        var foo= $('input[name=VMfoto]').val();
        var formData = new FormData($('#uploadimage')[0]); 
        var id = $('input[name=idProyecto]').val();
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
            alertify.error('Error al actualizar');
        });
    });
});