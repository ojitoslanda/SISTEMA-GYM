<?php 
require_once("../../model/usuario.php");
$cod = $_POST['id'];
 ?>

<form action="../controller/usuario/delete-user" method="POST">
		<div class="container-fluid">
			<div class="row text-center">
							<input type="hidden" value="<?php echo $cod;?>" name="cod">
					<div class="col-md-6">
						<button type="submit" class="btn btn-danger btn-lg">Eliminar</a>
					</div>
					<div class="col-md-6">
						<button type="button" class="btn btn-secondary btn-lg"  data-dismiss="modal">Cancelar</a>
					</div>
			</div>
		</div>

</form>