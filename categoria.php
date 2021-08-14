<?php
include_once('connection/bd.php');
include('connection/session_start.php');

$qry_Categoria = "SELECT * FROM categoria";
$Categoria = $blog_conn->query($qry_Categoria);
$row_Categoria = $Categoria->fetch_assoc();
?>
<!DOCTYPE html>
<html>
	<!--head-->
	<?php include('template/head.php'); ?>

<body>
	<!-- nav-bar -->
	<?php include('template/navbar.php'); ?>

    <header class="masthead" style="background-image:url('assets/img/post-bg.jpg');">
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
		<div class="clearfix"><button class="btn btn-primary float-right" type="button" data-toggle="modal" data-target="#categoriaNuevo">+&nbsp; Nueva Categoría</button></div><br/>
		<div class="row">
            <div class="col-md-10 col-lg-12">
				<div class="table-responsive-lg">
					<table class="table table-bordered">
					  <thead>
						<tr>
						  <th>Id</th>
						  <th>Categoría</th>
						</tr>
					  </thead>
					  <tbody>
					  <?php if(isset($row_Categoria['id_categoria'])){ 
					  do { ?>
						<tr>
						  <td id="idCategoria<?php echo $row_Categoria['id_categoria'];?>"><strong><button type="button" class="border-0 bg-transparent edit-categoria" value="<?php echo $row_Categoria['id_categoria'];?>"/><?=$row_Categoria['id_categoria']?></button></strong></td>
						  <td id="categoria<?php echo $row_Categoria['id_categoria'];?>" value="<?php echo $row_Categoria['categoria'];?>"><?=$row_Categoria['categoria']?></td>
						</tr>
					  <?php } while ($row_Categoria = mysqli_fetch_assoc($Categoria)); 
					  } ?>
					  </tbody>
					</table>
				</div>
			</div>
        </div>
		
    </div>
	
		<!-- Modal User -->
		<?php include('template/modal_categoria.php'); ?>
		<?php include('template/modal_categoria_upd.php'); ?>
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
<script>$.getScript("assets/js/categoria.js");</script>