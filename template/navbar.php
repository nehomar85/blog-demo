<nav class="navbar navbar-light navbar-expand-lg fixed-top" id="mainNav">
	<div class="container"><a class="navbar-brand" href="articulo.php">BLOG</a><button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
					<li class="nav-item"><a class="nav-link" href="articulo.php">Artículos</a></li>
				<?php if(empty($_SESSION['usuario'])) { ?>
				<?php } else { ?>
					<li class="nav-item"><a class="nav-link" href="usuario.php">Usuarios</a></li>
				<?php } ?>
				<?php if(empty($_SESSION['categoria'])) { ?>
				<?php } else { ?>
					<li class="nav-item"><a class="nav-link" href="categoria.php">Categorías</a></li>
				<?php } ?>
				<?php if(empty($id_usuario)) { ?>
					<li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#login">Login</a></li>
				<?php } else { ?>
					<li class="nav-item logout"><a class="nav-link">Logout<?php $_SESSION['id_usuario'];?></a></li>
					<input id="userId" value="<?php echo $_SESSION['id_usuario'];?>" hidden >
				<?php } ?>
			</ul>
		</div>
	</div>
</nav>