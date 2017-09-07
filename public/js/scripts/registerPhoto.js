$(document).ready(function(){
	var num=1;
	$("#agregar").on('click', function(){
		$("#tabla tbody tr:eq(0)").clone().removeClass('fila-base').appendTo("#tabla tbody");
		$("#foto").attr("name","foto"+num)
		$("#publicar").attr("name","publicar"+num)
		$("#principal").attr("name","principal"+num)
		$("#agregar").on('click');
		num=num+1;
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