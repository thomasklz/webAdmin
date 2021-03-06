$(document).ready(function() {
    alertify.logPosition("bottom right");
    //show proyecto
    $('[data-route]').click(function(e) {
        e.preventDefault();;
        var id = $(this).parents("tr").find("td").eq(0).html();
        var unidad = $(this).parents("tr").find("td").eq(1).html();
        var titulo = $(this).parents("tr").find("td").eq(2).html();
        var detalle = $(this).parents("tr").find("td").eq(3).html();
        var url = $(this).parents("tr").find("td").eq(4).html();
        var fecha = $(this).parents("tr").find("td").eq(5).html();
        var lugar = $(this).parents("tr").find("td").eq(6).html();
        $('input[name=idEvento]').val(id);
        $('input[name=VMtitulo]').val(titulo);
        $('input[name=VMdetalle]').val(detalle);
        $('input[name=VMurl]').val(url);
        $('input[name=VMfecha]').val(fecha);
        $('input[name=VMlugar]').val(lugar);
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
    //Update  evento
    $('[data-update]').click(function(e) {
        e.preventDefault();
        var form = $(this).parents('form');
        var id = $('input[name=idEvento]').val();
        var ruta = $('input[name=ruta]').val();
        var url = ruta + id;
        var token = $('input[name=_token]').val();
        debugger
        $.ajax({
            url: url,
            headers: { 'X-CSRF-TOKEN': token },
            type: "POST",
            dataType: "json",
            data: form.serialize(),
        }).done(function(data, textStatus, jqXHR) {
            alertify.success(data.mensaje);
            location.reload();
        }).fail(function(jqXHR, textStatus) {
            alertify.error('Error al  actualizar');
        });
    });
});