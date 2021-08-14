$(document).ready(function(){
	$("#loginForm").on("submit", function(e){
		e.preventDefault();
		var url = "controllers/crud_usuario.php";
		var action= "read";
		$.ajax({
		   type: "POST",
		   url: url,
		   data: $("#loginForm").serialize() + "&action=" + action,
		   success: function(result){
			if (result == true) {
				window.location.reload(true);
			}else{
				alert("Correo registrado anteriormente, verifique datos de registro");
			}
		   }
		});
		return false;
	});
	
	$(document).on('click', '.logout', function(){
		var userId = $("#userId").val();
		var url = "connection/session_destroy.php";
		$.ajax({
		   type: "POST",
		   url: url,
		   data: userId,
		   success: function(result){
			if (result == true) {
				alert("Su sesion ha finalizado correctamente");
				window.location.replace("articulo.php");
			}
		   }
		});
		return false;		
	});
});