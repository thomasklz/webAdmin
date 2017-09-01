$(document).ready(function(){
	alertify.logPosition("bottom right");
	$('[data-route]').click(function(e){
        e.preventDefault();;
        var urls=($(this).data('route'));
	    $.ajax({
	        type: 'get',
	        url: urls,
	        success: function(data) {
	           $('input[name=VMCategoria]').val(data.categoria);
	        },
	    });
	});

	//Delete
	$('.bnt-delete').click(function(e){
		e.preventDefault();
		var row = $(this).parents('tr');
		var form = $(this).parents('form');
		var url = form.attr('action');
		debugger
		alertify.confirm("Está seguro que desea eliminar?",
			function(){
				$.post(url,form.serialize(), function(result){
					row.fadeOut();
					alertify.success(result.mensaje);
				}).fail(function(error){
					alertify.error('error message');
				});
		    }
		);
	});
	//Update
	$('[data-update]').click(function(e){
		e.preventDefault();
		var txtCategoria = $('input[name=VMCategoria]').val();
		var url=($(this).data('update'));
		debugger
	
			$.post(url,txtCategoria, function(result){
					alertify.success(result.mensaje);
					debugger
			}).fail(function(error){
					alertify.error('error message');
					debugger
				});

		
	});
});  