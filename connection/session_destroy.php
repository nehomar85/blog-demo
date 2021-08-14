<?php 
include_once('bd.php');

// Session iniciada
session_start();
$Session = session_id();

$queryUser = "UPDATE usuario SET id_session = null, fecha_session = null WHERE id_session = '".$Session."'";
$resultUser = $blog_conn->query($queryUser);
	
session_destroy();

echo true;

?>