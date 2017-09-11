$(document).ready(function() {
    alertify.logPosition("bottom right");
    //show proyecto
    $('[data-route]').click(function(e) {
        e.preventDefault();;
        var id = $(this).parents("tr").find("td").eq(0).html();
        var unidad = $(this).parents("tr").find("td").eq(1).html();
        var redSocial = $(this).parents("tr").find("td").eq(2).html();
        var link = $(this).parents("tr").find("td").eq(3).html();
        $('input[name=idRedesSociales]').val(id);
        $('input[name=VMlink]').val(link);
        $('input[name=VMredSocial]').val(redSocial);
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
        var form = $(this).parents('form');
        var ruta = $('input[name=ruta]').val();
        var id = $('input[name=idRedesSociales]').val();
        var url = ruta + id;
        var token = $('input[name=_token]').val();
        debugger
        $.ajax({
            data: form.serialize(),
            type: "PUT",
            dataType: "json",
            url: url,
            headers: { 'X-CSRF-TOKEN': token },
        }).done(function(data, textStatus, jqXHR) {
            alertify.success(data.mensaje);
            location.reload();
        }).fail(function(jqXHR, textStatus) {
            alertify.error('Error al actualizar');
        });
    });
});