<?php
include_once('connection/bd.php');
include('connection/session_start.php');

$qry_Usuario = "SELECT u.*, r.id_rol, r.rol rol FROM usuario u LEFT JOIN rol r ON u.id_rol = r.id_rol WHERE estado = '1' ORDER BY u.id_usuario";
$Usuario = $blog_conn->query($qry_Usuario);
$row_Usuario = $Usuario->fetch_assoc();
?>
<!DOCTYPE html>
<html>
	<!--head-->
	<?php include('template/head.php'); ?>

<body>
	<!-- nav-bar -->
	<?php include('template/navbar.php'); ?>

    <header class="masthead" style="background-image:url('assets/img/user-bg.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8 mx-auto">
                    <div class="site-heading">
                        <h1>Blog</h1><span class="subheading">Blog Theme</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
		<div class="row">
            <div class="col-md-10 col-lg-12">
				<div class="table-responsive-lg">
					<table class="table table-bordered">
					  <thead>
						<tr>
						  <th>Id</th>
						  <th>Nombre</th>
						  <th>Correo</th>
						  <th>Telefóno</th>
						  <th>Rol</th>
						</tr>
					  </thead>
					  <tbody>
					  <?php if(isset($row_Usuario['id_usuario'])){ 
					  do { ?>
						<tr>
						  <td id="idUsuario<?php echo $row_Usuario['id_usuario'];?>"><strong><button type="button" class="border-0 bg-transparent edit-usuario" value="<?php echo $row_Usuario['id_usuario'];?>"/><?=$row_Usuario['id_usuario']?></button></strong></td>
						  <td id="nombre<?php echo $row_Usuario['id_usuario'];?>" value="<?php echo $row_Usuario['nombre'];?>"><?=$row_Usuario['nombre']?></td>
						  <td id="correo<?php echo $row_Usuario['id_usuario'];?>"><?=$row_Usuario['correo']?></td>
						  <td id="telefono<?php echo $row_Usuario['id_usuario'];?>"><?=$row_Usuario['telefono']?></td>
						  <td id="rol<?php echo $row_Usuario['id_usuario'];?>"><?=$row_Usuario['rol']?></td>
						</tr>
					  <?php } while ($row_Usuario = mysqli_fetch_assoc($Usuario)); 
					  } ?>
					  </tbody>
					</table>
				</div>
			</div>
        </div>
		
    </div>
	
		<!-- Modal User -->
		<?php include('template/modal_user.php'); ?>
    <footer>
		<!-- nav-bar -->
		<?php include('template/footer.php'); ?>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/clean-blog.js"></script>
</body>

</html>
<script>$.getScript("assets/js/login.js");</script>
<script>$.getScript("assets/js/user.js");</script>