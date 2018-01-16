$(document).ready(function(){
	alertify.logPosition("bottom right");
	//show
	$('[data-route]').click(function(e){
        e.preventDefault();;
        var depa = $(this).parents("tr").find("td").eq(1).html();
        var frase = $(this).parents("tr").find("td").eq(2).html();
        var logo = $(this).parents("tr").find("td").eq(3).html();
        var color = $(this).parents("tr").find("td").eq(4).html();
        var id = $(this).parents("tr").find("td").eq(0).html();
        var resumen = $(this).data('resumen');
        var contenido = $(this).data('contenido');
        var foto = $(this).data('foto');
        $('input[name=VMdepartamento]').val(depa);
        $('input[name=VMfrase]').val(frase);
        $('input[name=VMresumen]').val(resumen);
        $('#VMcontenido').text(contenido);
        $('input[name=VMfotoH]').val(foto);
        $('input[name=VMlogoH]').val(logo);
	    $('input[name=VMidDepartamento]').val(id);
        $('#VMcolor option[value="' + color + '"]').prop("selected", true);
	});
	//Delete
	$('.bnt-delete').click(function(e){
		e.preventDefault();
		var row = $(this).parents('tr');
		var form = $(this).parents('form');
		var url = form.attr('action');
		alertify.confirm("Está seguro que desea eliminar?",
			function(){
				$.post(url,form.serialize(), function(result){
					row.fadeOut();
					alertify.success(result.mensaje);
				}).fail(function(error){
					alertify.error('Error al eliminar');
				});
		    }
		);
	});
	//Update departamento
	$('[data-update]').click(function(e) {
        e.preventDefault();
        var formData = new FormData($('#uploadimage')[0]);
        var id = $('input[name=VMidDepartamento]').val();
        var ruta = $('input[name=ruta]').val();
        var url = ruta + id;
        debugger
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