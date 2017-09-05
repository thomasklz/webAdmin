$(document).ready(function(){
	var num=0;
	$("#agregar").on('click', function(){
		$("#tabla tbody tr:eq(0)").clone().removeClass('fila-base').appendTo("#tabla tbody");
		num=num+1;
		$("#foto").attr("name","foto"+num)
		$("#publicar").attr("name","publicar"+num)
		$("#principal").attr("name","principal"+num)
		$("#agregar").on('click');
		if(num==4){
			$("#agregar").off('click');
		}
	});

	// Evento que selecciona la fila y la elimina 
	$(document).on("click",".eliminar",function(){
		var parent = $(this).parents().get(0);
		$(parent).remove();
	});
});  