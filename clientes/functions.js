$(document).ready(function(){
	$("#barraBuscar").on("keyup", function(){
		var nombre = $(this).val();
		$.post('buscarCliente.php', {nombre: nombre}, function(data) {
			$("#cuerpoTabla").html(data);
		});
	});
});

function borrar(id){
	$(document).ready(function() {
		$.post('borrar.php', {id : id}, function(data) {
			swal("Hecho!", "Cliente: "+data+" ha sido eleminado con exito", "success");
		});
	});
}