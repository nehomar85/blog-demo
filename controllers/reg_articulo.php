<?php

	include_once('../connection/bd.php');

	$action = $_POST['action'];
	
	if($action == 'create'){
		$titulo = $_POST['titulo'];
		$idCategoria = $_POST['categoria'];
		$textoCorto = $_POST['textoCorto'];
		$textoLargo = $_POST['textoLargo'];
		$insUser = "INSERT INTO articulo (titulo, id_categoria, texto_corto, texto_largo, imagen, fecha_creacion)
					VALUES('$titulo', '$idCategoria', '$textoCorto', '$textoLargo', null, date(now()))";
		$resultIns = $blog_conn->query($insUser);
		$msg = "Artículo publicado correctamente";

		echo $msg;
	}	

?>