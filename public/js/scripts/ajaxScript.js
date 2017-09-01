$(document).ready(function(){

	// $('[data-id]').click(function(e){
 //        e.preventDefault();
 //       // $("#modelafiliado").html("<p><img src='/img/ajax-loader.gif'> Buscando...</p>");
 //        var id=($(this).data('id'));
 //       // var url = $('#modelafiliado').attr('data-path');
 //       debugger
	//     $.ajax({
	//         type: 'get',
	//         url: 'categoria/'.id,
	//         data: {
 //                '_token': $('input[name=_token]').val()
 //            },
	//         success: function(data) {
	//            debugger
	//         },

	//     });debugger

	//     $('#name').val('');
	// });
	$('.bnt-delete').click(function(e){
		e.preventDefault();
		var row = $(this).parents('tr');
		var form = $(this).parents('form');
		var url = form.attr('action');
		debugger
		alertify.confirm("Está seguro que desea eliminar",
			 function(){
				$.post(url,form.serialize(), function(result){
					row.fadeOut();
					alertify.success(result.mensaje);
				}).fail(function(error){
					alertify.error('error message');
					debugger
				});
			 });
	});
});  