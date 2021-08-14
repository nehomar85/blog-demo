$(document).ready(function(){

	$("#formRegCategoria").on("submit", function(c){
		c.preventDefault();
		var url = "controllers/crud_categoria.php";
		var action= "create";
		$.ajax({
		   type: "POST",
		   url: url,
		   data: $("#formRegCategoria").serialize() + "&action=" + action,
		   success: function(result){
			if (result == true) {
				alert("La Categoría ya se encuentra registrada, verifique la información");
			}else{
				alert(result);
				window.location.reload(true);
			}
		   }
		});
		return false;
	});
	
	$(document).on('click', '.edit-categoria', function(){
		var id=$(this).val();
		var idCategoria=$('#idCategoria'+id).text();
		var categoria=$('#categoria'+id).text();
		
		$('#modalUpdCategoria').modal('show');
		$('#idCategoriaUpd').val(idCategoria);
		$('#categoriaUpd').val(categoria);
	});
	
	$("#formUpdUser").on("submit", function(e){
		e.preventDefault();
		var url = "controllers/crud_categoria.php";
		var action= "update";
		$.ajax({
		   type: "POST",
		   url: url,
		   data: $("#formUpdUser").serialize() + "&action=" + action,
		   success: function(result){
			if (result == true) {
				alert("Categoría ya registrada, verifique la información");
			}else{
				alert(result);
				window.location.reload(true);
			}
		   }
		});
		return false;
	});
	
	$(document).on('click', '.delete-categoria', function(){
		var categoria=$('#categoriaUpd').val();
		var opcion = confirm('Confirma la categoría '+categoria+'?');
		if (opcion == true) {
			var idCategoria=$('#idCategoriaUpd').val();
			var action= "delete";
			$.ajax({
			  type: "POST",
			  url: "controllers/crud_categoria.php",
			  data: "idCategoriaDel=" + idCategoria + "&action=" + action,
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