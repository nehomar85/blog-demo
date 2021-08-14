$(document).ready(function(){

	$("#formRegArticulo").on("submit", function(c){
		c.preventDefault();
		var url = "controllers/reg_articulo.php";
		var action= "create";
		$.ajax({
		   type: "POST",
		   url: url,
		   data: $("#formRegArticulo").serialize() + "&action=" + action,
		   success: function(result){
				alert(result);
				window.location.reload(true);
		   }
		});
		return false;
	});

});