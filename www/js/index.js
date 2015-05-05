
$('#formulario').submit(function() { 
	
	 
	// recolecta los valores que inserto el usuario
	var datosUsuario = $("#nombredeusuario").val()
	var datosPassword = $("#clave").val()
	
  	archivoValidacion = "http://172.27.71.14:280/dominio1/conexion.php?jsoncallback=?"

	$.getJSON( archivoValidacion, { usuario:datosUsuario ,password:datosPassword}).done(function(respuestaServer) {
		
		alert(respuestaServer.mensaje + "\nGenerado en: wwwww" + respuestaServer.hora + "\n" +respuestaServer.generador)
		if(respuestaServer.validacion == "ok"){
		 	/// si la validacion es correcta, muestra la pantalla "home"
			$.mobile.changePage("#home")
		}else{		  
		  /// ejecutar una conducta cuando la validacion falla
		}
  
	})
	return false;
})