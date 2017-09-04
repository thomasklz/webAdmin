$(document).ready(function(){
	alertify.logPosition("bottom right");
	//show
	$('[data-route]').click(function(e){
        e.preventDefault();;
        var catego = $(this).parents("tr").find("td").eq(1).html();
        var id = $(this).parents("tr").find("td").eq(0).html();
        $('input[name=VMCategoria]').val(catego);
	    $('input[name=idCategoria]').val(id);
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
	//Update
	$('[data-update]').click(function(e){
		e.preventDefault();
		var txtCategoria = $('input[name=VMCategoria]').val();
		var id = $('input[name=idCategoria]').val();
		var url = 'categoria/'+id ;
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