<?php

	include_once('../connection/bd.php');

	$action = $_POST['action'];
	
	if($action == 'create'){
		$categoria = $_POST['categoriaReg'];
		$qry_categoria = $blog_conn->query("SELECT * FROM categoria WHERE categoria='$categoria'");
		$row_categoria = $qry_categoria->fetch_array(MYSQLI_BOTH);
		if($row_categoria[0]){
			$msg = true;
		}else{
			$insCategoria = "INSERT INTO categoria (categoria) VALUES('$categoria')";
			$resultIns = $blog_conn->query($insCategoria);
			$msg = "Categoría creada correctamente";
		}
		echo $msg;
	}
	
	elseif($action == 'update'){
		$categoria = $_POST['categoriaUpd'];
		$qry_categoria = $blog_conn->query("SELECT * FROM categoria WHERE categoria='$categoria'");
		$row_categoria = $qry_categoria->fetch_array(MYSQLI_BOTH);
		if($row_categoria[0]){
			$msg = true;
		}else{
			$idCategoria = $_POST['idCategoriaUpd'];
			$updCategoria = "UPDATE categoria SET categoria='$categoria' WHERE id_categoria='$idCategoria'";
			$resultUpd = $blog_conn->query($updCategoria);
			$msg = "Categoría actualizada correctamente";
		}
		echo $msg;
	}

	elseif($action == 'delete'){
		$idCategoria = $_POST['idCategoriaDel'];
		$delCategoria = "DELETE FROM categoria WHERE id_categoria='$idCategoria'";
		$resultDel = $blog_conn->query($delCategoria);
		echo "Categoría eliminada correctamente";
	}

?>