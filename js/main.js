$(document).ready(function() {
	// OBTENIENDO LOS DATOS
	function obtenerDatos() {
		$.ajax({
			url: "services/mostrarDatos.php",
			method: "POST",
			success: function(data) {
				$("#result").html(data)
			}
		});
	}

	obtenerDatos();
	// OBTENIENDO LOS DATOS

	// AGREGAR DATOS
	$(document).on("click", "#add", function() {
		var nombre_add = $("#nombre_add").text();
		var apellido_add = $("#apellido_add").text();

		$.ajax({
			url: "services/insertar.php",
			method: "POST",
			data: {nombre: nombre_add, apellido: apellido_add},
			success: function(data) {
				obtenerDatos();
			}
		});
	});
	// AGREGAR DATOS

	// ACTUALIZAR DATOS
	function actualizarDatos(id, texto, columna) {
		$.ajax({
			url: "services/actualizar.php",
			method: "POST",
			data: {id: id, texto: texto, columna: columna},
			success: function(data) {
				obtenerDatos();
			}
		});
	}

	$(document).on("blur", "#nombre_usuario", function(){
		var id = $(this).data("id_usuario");
		var nombre = $(this).text();

		actualizarDatos(id, nombre, "NOMBRE");
	});

	$(document).on("blur", "#apellido_usuario", function(){
		var id = $(this).data("id_apellido");
		var apellido = $(this).text();

		actualizarDatos(id, apellido, "APELLIDO");
	});
	// ACTUALIZAR DATOS

	// ELIMINAR DATOS
	$(document).on("click", "#eliminar", function(){
		if(confirm("Esta seguro de que desea eliminar este registro")) {

			var id = $(this).data("id");

			$.ajax({
				url: "services/eliminar.php",
				method: "POST",
				data: {id: id},
				success: function(data) {
					obtenerDatos();
				}
			});
		}
	});
	// ELIMINAR DATOS
});