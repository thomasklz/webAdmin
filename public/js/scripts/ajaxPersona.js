$(document).ready(function() {
    alertify.logPosition("bottom right");
    //show proyecto
    $('[data-route]').click(function(e) {
        e.preventDefault();
        var id = $(this).parents("tr").find("td").eq(0).html();
        var unidad = $(this).parents("tr").find("td").eq(1).html();
        var nombre = $(this).parents("tr").find("td").eq(2).html();
        var apellido = $(this).parents("tr").find("td").eq(3).html();
        var cedula = $(this).parents("tr").find("td").eq(4).html();
        var cargo = $(this).parents("tr").find("td").eq(5).html();
        var telefono = $(this).parents("tr").find("td").eq(6).html();
        var email = $(this).parents("tr").find("td").eq(7).html();
        var foto = $(this).parents("tr").find("td").eq(8).html();
        $('input[name=idPersona]').val(id);
        $('input[name=VMnombre]').val(nombre);
        $('input[name=VMapellido]').val(apellido);
        $('input[name=VMcedula]').val(cedula);
        $('input[name=VMcargo]').val(cargo);
        $('input[name=VMtelefono]').val(telefono);
        $('input[name=VMemail]').val(email);
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
        var id = $('input[name=idPersona]').val();
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