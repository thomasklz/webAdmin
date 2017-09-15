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
                $('#VMpublicar option[value="' + value.publicar + '"]').prop("selected", true);
                $('#VMunidad option[ids="' + value.unidad + '"]').prop("selected", true);
                $('#VMcategoria option[ids="' + value.categoria + '"]').prop("selected", true);
            }); 
        }).fail(function(error) {
           alertify.error('Error al eliminar');
        });
    });
    //show noticia/fotos
    $('[data-foto]').click(function(e) {
        e.preventDefault();
        $("#ChangePhotos").empty();
        $('#loader').html("<img src='../img/loader.gif'>");
        var form = $(this).parents('form');
        var url = form.attr('action');
        var dir= "../img/noticia/";
        var count= 1;
        $.get(url, form.serialize(), function(result) {
            $.each(result, function(key, value) {
                $.each(value, function(key, value1) {
                    $('#ChangePhotos').append('<div class="col-md-12 text-center" style="padding-top: 15px;"><img src="'+dir+value1.fotos+'" width="50%"></div>');
                    $('#ChangePhotos').append('<div class="col-md-12 text-center">');
                    $('#ChangePhotos').append("<input type='file' name='foto"+count+"' style='padding-left:25%; padding-top: 10px;'></div>");
                    count=count+1;
                });
                $("#loader").empty(); 
            }); 
        }).fail(function(error) {
           alertify.error('Error al eliminar');
        });
    });
    //Delete noticia
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
    //Update  noticia
    $('[data-update]').click(function(e) {
        e.preventDefault();
        var form = $(this).parents('form');
        var id = $('input[name=idNoticia]').val();
        var ruta = $('input[name=ruta]').val();
        var url = "../"+ruta+id;
        var token = $('input[name=_token]').val();
        $.ajax({
            url: url,
            headers: { 'X-CSRF-TOKEN': token },
            type: "PUT",
            dataType: "json",
            data: form.serialize(),
        }).done(function(data, textStatus, jqXHR) {
            alertify.success(data.mensaje);
            location.reload();
        }).fail(function(jqXHR, textStatus) {
            alertify.error('Error al actualizar');
        });
    });
});