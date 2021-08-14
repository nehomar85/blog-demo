<?php
$strRol = $blog_conn->query("SELECT * FROM rol ORDER BY id_rol");
$Rol = '<option value=""></option>';
while($fila = $strRol->fetch_array()){
	$Rol.='<option value="'.$fila["rol"].'">'.$fila["rol"].'</option>';
}
?>
<div class="modal fade" id="modalUpdUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title">Usuario</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>
		<form id="formUpdUser">
		  <div class="modal-body">
			<div class="row">
				<div class="col-md-10 col-lg-10 mx-auto">
					<div class="container-fluid">
					  <div class="form-group row">
						<div class="col-sm-12">
						  <input type="text" class="form-control form-control-sm" id="nombreUpd" name="nombreUpd" placeholder="Nombre" required ></input>
						</div>
					  </div>
					  <div class="form-group row">
						<div class="col-sm-12">
						  <input type="text" class="form-control form-control-sm" id="correoUpd" name="correoUpd" placeholder="Correo electrónico" required />
						</div>
					  </div>
					  <div class="form-group row">
						<div class="col-sm-12">
						  <input type="text" class="form-control form-control-sm" id="telefonoUpd" name="telefonoUpd" placeholder="Telefono" required />
						</div>
					  </div>
					  <div class="form-group row">
						<div class="col-sm-12">
						  <select class="form-control form-control-sm" id="rolUpd" name="rolUpd" required ><?php echo $Rol; ?></select>
						</div>
					  </div>
					  <input class="form-control form-control-sm" id="idUsuarioUpd" name="idUsuarioUpd" hidden />
					</div>
				</div>
			</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-warning delete">Eliminar</button>
			<button type="submit" class="btn btn-primary">Actualizar</button>
		  </div>
		</form>
	</div>
  </div>
</div>