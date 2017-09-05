$(document).ready(function(){
$("#agregar").on('click', function(){
	if($(".foto").attr("name")=='foto'){
		$(".foto").attr("name","foto1")
	}

	$('#agregar').on('click');
	if($(".foto1").attr("name")=='foto1'){
		$(".foto1").attr("name","foto2")
	}
	$('#agregar').off('click');
	if($(".foto2").attr("name")=='foto2'){
		$(".foto2").attr("name","foto3")
	}

	$("#tabla tbody tr:eq(0)").clone().removeClass('fila-base').appendTo("#tabla tbody");
	});
 
	// Evento que selecciona la fila y la elimina 
	$(document).on("click",".eliminar",function(){
		var parent = $(this).parents().get(0);
		$(parent).remove();
	});
});  