$(document).ready(function(){
	alertify.logPosition("bottom right");
	//show
	$('[data-route]').click(function(e){
        e.preventDefault();;
        var depa = $(this).parents("tr").find("td").eq(1).html();
        var id = $(this).parents("tr").find("td").eq(0).html();
        $('input[name=VMDepartamento]').val(depa);
	    $('input[name=VMidDepartamento]').val(id);
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
	$('[data-update]').click(function(e){
		e.preventDefault();
		var txtDepartamento = $('input[name=VMDepartamento]').val();
		var id = $('input[name=VMidDepartamento]').val();
		var url = 'unidad-academica/'+id ;
		var token= $('input[name=_token]').val(); 
		debugger
	    $.ajax({
            data: {departamento:txtDepartamento},
            type: "PUT",
            dataType: "json",
            url: url,
            headers: {'X-CSRF-TOKEN': token},
        }).done(function( data, textStatus, jqXHR ){
			alertify.success(data.mensaje);
			location.reload();
		}).fail(function( jqXHR, textStatus) {
			debugger
			alertify.error('Error al actualizar');
	    });
	});
});  