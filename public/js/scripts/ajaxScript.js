$(document).ready(function(){
	alertify.logPosition("bottom right");
	//show
	$('[data-route]').click(function(e){
        e.preventDefault();;
        var estado = $(this).parents("tr").find("td").eq(1).html();
        var id = $(this).parents("tr").find("td").eq(0).html();
        $('input[name=VMCategoria]').val(estado);
	    $('input[name=idCategoria]').val(id);
	});
	//show modal estado proyecto 
	$('[data-estado]').click(function(e){
        e.preventDefault();;
        var catego = $(this).parents("tr").find("td").eq(1).html();
        var id = $(this).parents("tr").find("td").eq(0).html();
        $('input[name=VMEstado]').val(catego);
	    $('input[name=idEstado]').val(id);
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
	//Delete estado proyecto
	$('.bnt-deleteEstado').click(function(e){
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
	//Update estado proyecto
	$('[data-updateProyecto]').click(function(e){
		e.preventDefault();
		var txtEstado = $('input[name=VMEstado]').val();
		var id = $('input[name=idEstado]').val();
		var ruta= $('input[name=ruta]').val(); 
		var url = ruta+id ;
		var token= $('input[name=_token]').val(); 
	    $.ajax({
            data: {estado:txtEstado},
            type: "PUT",
            dataType: "json",
            url: url,
            headers: {'X-CSRF-TOKEN': token},
        }).done(function( data, textStatus, jqXHR ){
			alertify.success(data.mensaje);
			location.reload();
		}).fail(function( jqXHR, textStatus) {
			alertify.error('Error al actualizar');
	    });
	});
	//Update categoria
	$('[data-update]').click(function(e){
		e.preventDefault();
		var txtCategoria = $('input[name=VMCategoria]').val();
		var id = $('input[name=idCategoria]').val();
		var ruta= $('input[name=ruta]').val(); 
		var url = ruta+id ;
		var token= $('input[name=_token]').val(); 
	    $.ajax({
            data: {categoria:txtCategoria},
            type: "PUT",
            dataType: "json",
            url: url,
            headers: {'X-CSRF-TOKEN': token},
        }).done(function( data, textStatus, jqXHR ){
			alertify.success(data.mensaje);
			location.reload();
		}).fail(function( jqXHR, textStatus) {
			alertify.error('Error al actualizar');
	    });
	});
});  