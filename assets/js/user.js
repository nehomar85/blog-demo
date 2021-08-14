$(document).ready(function(){

	$("#formRegUser").on("submit", function(c){
		c.preventDefault();
		var url = "controllers/crud_usuario.php";
		var action= "create";
		$.ajax({
		   type: "POST",
		   url: url,
		   data: $("#formRegUser").serialize() + "&action=" + action,
		   success: function(result){
			if (result == true) {
				alert("Correo registrado anteriormente, verifique datos de registro");
			}else{
				alert(result);
				window.location.reload(true);
			}
		   }
		});
		return false;
	});
	
	$(document).on('click', '.edit-usuario', function(){
		var id=$(this).val();
		var idUsuario=$('#idUsuario'+id).text();
		var nombre=$('#nombre'+id).text();
		var correo=$('#correo'+id).text();
		var telefono=$('#telefono'+id).text();
		var rol=$('#rol'+id).text();
		
		$('#modalUpdUser').modal('show');
		$('#idUsuarioUpd').val(idUsuario);
		$('#nombreUpd').val(nombre);
		$('#correoUpd').val(correo);
		$('#telefonoUpd').val(telefono);
		$('#rolUpd').val(rol);
	});
	
	$("#formUpdUser").on("submit", function(e){
		e.preventDefault();
		var url = "controllers/crud_usuario.php";
		var action= "update";
		$.ajax({
		   type: "POST",
		   url: url,
		   data: $("#formUpdUser").serialize() + "&action=" + action,
		   success: function(result){
			if (result == true) {
				alert("Correo registrado anteriormente, verifique datos de registro");
			}else{
				alert(result);
				window.location.reload(true);
			}
		   }
		});
		return false;
	});
	
	$(document).on('click', '.delete', function(){
		var nombre=$('#nombreUpd').val();
		var opcion = confirm('Confirma la eliminación de '+nombre+'?');
		if (opcion == true) {
			var idUsuario=$('#idUsuarioUpd').val();
			var action= "delete";
			$.ajax({
			  type: "POST",
			  url: "controllers/crud_usuario.php",
			  data: "idUsuarioDel=" + idUsuario + "&action=" + action,
			  success: function(result){
				alert(result);
				window.location.reload(true);
			  }
			});
		} else {
			return false;
		}
	});
	
});