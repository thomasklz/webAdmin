$(document).ready(function() {
    alertify.logPosition("bottom right");
    //show noticia
    $('[data-route]').click(function(e) {
        e.preventDefault();
        var form = $(this).parents('form');
        var url = form.attr('action');
        $.get(url, form.serialize(), function(result) {
            $.each(result, function(key, value) {
                $('input[name=idNoticia]').val(value.id);
                $('input[name=VMfecha]').val(value.fechaPublicacion);
                $('input[name=VMtitulo]').val(value.titulo);
                $('#VMresumen').text(value.resumen);
                $('#VMcontenido').text(value.contenido);
                $('#VMpublicar option[ids="' + value.publicar + '"]').prop("selected", true);
                $('#VMunidad option[ids="' + value.unidad + '"]').prop("selected", true);
                $('#VMcategoria option[ids="' + value.categoria + '"]').prop("selected", true);
            }); 
        }).fail(function(error) {
           alertify.error('Error al eliminar');
        });
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
        debugger
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
            debugger
            alertify.error('Error al actualizar');
        });
    });
});