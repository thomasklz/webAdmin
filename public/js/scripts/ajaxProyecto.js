$(document).ready(function(){
	alertify.logPosition("bottom right");
	//show
	$('[data-route]').click(function(e){
        e.preventDefault();;
        var id = $(this).parents("tr").find("td").eq(0).html();
        var autor = $(this).parents("tr").find("td").eq(1).html();
        var titulo = $(this).parents("tr").find("td").eq(2).html();
        var contenido = $(this).parents("tr").find("td").eq(3).html();
        var unidad = $(this).parents("tr").find("td").eq(4).html();
        var categoria = $(this).parents("tr").find("td").eq(5).html();
        var estado = $(this).parents("tr").find("td").eq(6).html();
        $('input[name=idProyecto]').val(id);
        $('input[name=autor]').val(autor);
        $('input[name=titulo]').val(titulo);
        $('input[name=contenido]').val(contenido);
        $('input[name=idUnidadAcademica]').val(unidad);
        $('input[name=idCategoriaproyecto]').val(categoria);
        $('input[name=idEstadoproyecto]').val(estado);
	});
});