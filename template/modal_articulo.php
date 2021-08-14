<?php
$strCategoria = $blog_conn->query("SELECT * FROM categoria ORDER BY categoria");
$Categoria = '<option value=""></option>';
while($fila = $strCategoria->fetch_array()){
	$Categoria.='<option value="'.$fila["id_categoria"].'">'.$fila["categoria"].'</option>';
}
?>
<div class="modal fade" id="articuloNuevo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title">Nuevo Artículo</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>
		<form id="formRegArticulo">
		  <div class="modal-body">
			<div class="row">
				<div class="col-md-10 col-lg-10 mx-auto">
					<div class="control-group">
						<div class="form-group"><input class="form-control font-weight-bold" type="text" id="titulo" name="titulo" placeholder="Título" required ></div>
					</div>
					<div class="control-group">
						<div class="form-group"><select class="form-control" type="text" id="categoria" name="categoria" placeholder="Categoría" required ><?php echo $Categoria; ?></select></div>
					</div>
					<div class="control-group">
						<div class="form-group mb-3"><textarea class="form-control" id="textoCorto" name="textoCorto" placeholder="Texto Corto" rows="3" required ></textarea></div>
					</div>
					<div class="control-group">
						<div class="form-group mb-3"><textarea class="form-control" id="textoLargo" name="textoLargo" placeholder="Texto Largo..." rows="6" required ></textarea></div>
					</div>
				</div>
			</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary">Publicar</button>
		  </div>
		</form>
	</div>
  </div>
</div>