$(document).ready(function(){

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


	$('.bnt-delete').click(function(e){
		e.preventDefault();
		var row = $(this).parents('tr');
		var form = $(this).parents('form');
		var url = form.attr('action');
		alertify.confirm("Está seguro que desea eliminar",
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
});  