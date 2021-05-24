<?php date_default_timezone_set('America/Lima'); ?>
<div class="container">
		<div class="row">
			<div class="col-md-12"><br>
				<div id="CalendarioWeb"></div>
			</div>
		</div>
</div>


<div class="modal fade" id="show_calendar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TitleEvent"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
		<div class="modal-body">
			<div class="form-row">
				<input type="hidden" id="id_cliente" value="<?php echo $codigo; ?>" class="form-control">
				<input type="hidden" id="txtID" class="form-control">
				<input type="hidden" id="txtFecha" class="form-control">
				<div class="form-group">
				 	<label style="display: none;" >Titulo:</label>
					<input type="hidden" id="txtTitulo" class="form-control" value="X" placeholder="Titulo del Evento">
				</div>
				<div class="form-group col-md-4">
				 	<label>Hora:</label>
				 	<div class="input-group clockpicker" data-autoclose="true">
				 		<input type="text" id="txtHora" value="<?php echo date("H:i"); ?>" class="form-control">
				 	</div>
				</div>
				<div class="form-group col-md-8">
					<label>Color:</label>
					<input type="color" value="#000000" id="txtColor" class="form-control">
				</div>
 				<div class="form-group col-md-12">
 					<label>Descripción:</label>
					<textarea name="" id="txtDescripcion" rows="3" class="form-control" placeholder="Describe el evento"></textarea>
				</div>

			</div>
	  </div>
      <div class="modal-footer">
      	        <button type="button" class="btn btn-success" id="btn-guardar">Guardar</button>
				<button type="button" class="btn btn-success" id="btn-modificar">Modificar</button>
				<button type="button" class="btn btn-danger" id="btn-eliminar">Borrar</button>
       		    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
