<?php
include_once('connection/bd.php');
include('connection/session_start.php');

$qry_Articulo = "SELECT a.*, c.categoria categoria FROM articulo a LEFT JOIN categoria c ON a.id_categoria = c.id_categoria ORDER BY fecha_creacion DESC";
$Articulo = $blog_conn->query($qry_Articulo);
$row_Articulo = $Articulo->fetch_assoc();
?>
<!DOCTYPE html>
<html>
	<!--head-->
	<?php include('template/head.php'); ?>

<body>
	<!-- nav-bar -->
	<?php include('template/navbar.php'); ?>

    <header class="masthead" style="background-image:url('assets/img/main-bg.jpg');">
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
	  <?php if(empty($_SESSION['id_usuario'])) { ?>
		<div class="post-preview text-center">
			<h3 class="post-meta">Para ver los artículos del Blog debes <a href="#" class="nav-link text-primary" data-toggle="modal" data-target="#login">Iniciar Sesión</a></h3><br/>
			<h6 class="post-meta"><a href="#" class="nav-link text-primary" data-toggle="modal" data-target="#modalRegUser">Registrarme aquí</a></h6><br/>
		</div>
	  <?php } else { ?>
		<?php if(empty($_SESSION['categoria'])) { ?>
		<?php } else { ?>
			<div class="clearfix"><button class="btn btn-primary float-right" type="button" data-toggle="modal" data-target="#articuloNuevo">+&nbsp; Nuevo Artículo</button></div>
        <?php } ?>
		<div class="row">
            <div class="col-md-10 col-lg-8">
				<!-- Listado Artículos -->
				<?php if(isset($row_Articulo['id_articulo'])){ 
				do { ?>
					<div class="post-preview" id="textoResumen">
						<h2 class="post-title"><?php echo $row_Articulo['titulo'];?></h2>
						<a><h4 class="post-subtitle text-primary"><?php echo $row_Articulo['texto_corto'];?></h4></a>
						<p class="post-meta">Categoría: &nbsp;<?php echo $row_Articulo['categoria'];?>&nbsp;<a href="#" class="leer-articulo">Leer artículo completo</a></p>
					</div>
					<div class="post-preview" id="textoCompleto" style="display:none;">
						<h2 class="post-title"><?php echo $row_Articulo['titulo'];?></h2>
						<p><?php echo $row_Articulo['texto_largo'];?></p>
						<p class="post-meta">Categoría: &nbsp;<?php echo $row_Articulo['categoria'];?>&nbsp;<a href="#" class="leer-resumen">ver menos</a></p>
					</div>
					<hr>
				<?php } while ($row_Articulo = mysqli_fetch_assoc($Articulo)); 
				} ?>
            </div>
        </div>
	  <?php } ?>

    </div>
		<!-- Modal Artículo -->
		<?php include('template/modal_articulo.php'); ?>
		<!-- Modal Login -->
		<?php include('template/modal_login.php'); ?>
		<?php include('template/modal_registro.php'); ?>
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
<script>$.getScript("assets/js/articulo.js");</script>
<script>
$(document).ready(function(){
	$(document).on('click', '.leer-articulo', function(){
		document.getElementById("textoResumen").style.display = "none";
		document.getElementById("textoCompleto").style.display = "";
	});
	$(document).on('click', '.leer-resumen', function(){
		document.getElementById("textoResumen").style.display = "";
		document.getElementById("textoCompleto").style.display = "none";
	});
});
</script>