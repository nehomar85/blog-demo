<?php

	include_once('../connection/bd.php');

	$action = $_POST['action'];
	
	if($action == 'create'){
		$email = $_POST['emailReg'];
		$qry_email = $blog_conn->query("SELECT * FROM usuario WHERE correo='$email' AND estado='1'");
		$row_email = $qry_email->fetch_array(MYSQLI_BOTH);
		if($row_email[0]){
			$msg = true;
		}else{	
			$nombre = $_POST['nombreReg'];
			$telefono = $_POST['telefonoReg'];
			$password = $_POST['passwordReg'];
			$insUser = "INSERT INTO usuario (nombre, correo, contrasena, telefono, estado, id_rol, fecha_creacion)
						VALUES('$nombre', '$email', md5('$password'), '$telefono', '1', '2', date(now()))";
			$resultIns = $blog_conn->query($insUser);
			$msg = "Usuario Registrado Correctamente";
		}
		echo $msg;
	}	
	
	if($action == 'read'){
		$email = $_POST['email'];
		$password = $_POST['password'];
		$qry_email = $blog_conn->query("SELECT * FROM usuario WHERE correo='$email' AND contrasena=md5('$password')");
		$row_email = $qry_email->fetch_array(MYSQLI_BOTH);
		if($row_email[0]){
			session_start();
			$session = session_id();
			$updUsuario = "UPDATE usuario SET id_session='$session', fecha_session=now() WHERE correo='$email'";
			$resultUpd = $blog_conn->query($updUsuario);
			$msg = true;
		}else{
			$msg = "Usuario y/o Contraseña incorrecto";
		}
		echo $msg;
	}
	
	elseif($action == 'update'){
		$email = $_POST['correoUpd'];
		$idUsuario = $_POST['idUsuarioUpd'];
		$qry_email = $blog_conn->query("SELECT * FROM usuario WHERE correo='$email' AND estado='1' AND id_usuario !='$idUsuario'");
		$row_email = $qry_email->fetch_array(MYSQLI_BOTH);
		if($row_email[0]){
			$msg = true;
		}else{
			$rol = $_POST['rolUpd'];
			$qry_rol = $blog_conn->query("SELECT id_rol FROM rol WHERE rol='$rol'");
			$idRol = $qry_rol->fetch_array(MYSQLI_BOTH);
			$nombre = $_POST['nombreUpd'];
			$telefono = $_POST['telefonoUpd'];
			$updUsuario = "UPDATE usuario SET nombre='$nombre', correo='$email', telefono='$telefono', id_rol='$idRol[0]' WHERE id_usuario='$idUsuario'";
			$resultUpd = $blog_conn->query($updUsuario);
			$msg = "Información de " . $nombre ." actualizada correctamente";
		}
		echo $msg;
	}
	
	elseif($action == 'delete'){
		$idUsuario = $_POST['idUsuarioDel'];
		$delUsuario = "UPDATE usuario SET estado=0 WHERE id_usuario=$idUsuario";
		$resultDel = $blog_conn->query($delUsuario);
		echo "Usuario Eliminado Correctamente";
	}

?>