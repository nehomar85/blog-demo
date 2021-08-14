<?php
// Inicio session
session_start();
$Session = session_id();

$queryUser = "SELECT u.*, r.* FROM usuario u LEFT JOIN rol r ON u.id_rol = r.id_rol WHERE u.id_session = '".$Session."'";
$resultUser = $blog_conn->query($queryUser);
$usuario = $resultUser->fetch_array(MYSQLI_BOTH);

if ($usuario[0]) {
	$_SESSION['id_usuario'] = $usuario['id_usuario'];
	$_SESSION['nombre'] = $usuario['nombre'];
	$_SESSION['correo'] = $usuario['correo'];
	$_SESSION['telefono'] = $usuario['telefono'];
	$_SESSION['articulo'] = $usuario['articulo'];
	$_SESSION['usuario'] = $usuario['usuario'];
	$_SESSION['categoria'] = $usuario['categoria'];

	$id_usuario = $usuario['id_usuario'];
}
?>