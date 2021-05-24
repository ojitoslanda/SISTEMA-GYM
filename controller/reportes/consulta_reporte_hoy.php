<?php 
date_default_timezone_set('America/Lima');
require_once("../model/clientes.php");
$hoy = date('Y-m-d'); //Consulto la fecha de hoy
?>
<table id="table1" class="table-hover display  " style="width:100% ">
	<thead>
	    <tr>
	     	    <th>Opciones</th>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Productos</th>
                <th>Rutina</th>
                <th>Baile</th>
                <th>Maquina</th>
                <th>Pagado</th>
                <th>Estrella</th>

	    </tr>
	</thead>
	<tbody class="text-center">
		<?php 
		$obj=new cliente();
		$resultado=$obj->consultar_reporte_hoy($hoy);
		while($fila = $resultado -> fetch_array(MYSQLI_ASSOC))
		{
			# code...
			echo "<tr>
			<td>
			<a target='_black' href='../view/clientes/modificar-&-eliminar-cliente.php?cod=".$fila["ID"]."'>
			<i class='fa fa-id-card-o' style='font-size:30px;color:blue'></i>
			</a>
			</td>
			<td style='text-align: left'>".$fila["nombre"]."</td>
			<td>".$fila['fecha_clientes_new']."</td>
			<td>".$fila['hora']."</td>
			<td><button type='button' class='btn btn-link' data-toggle='modal' data-target='#modal_lista_producto'  onclick='sendIDUser(".$fila['ID'].",".'"'.$fila['fecha_clientes_new'].'"'.")' >Ver Producto</button></td>
			<td>".$fila['pago']."</td>";
			echo ($fila['rtn_baile'] === "on") ? '<td>Si</td>' : '<td>No</td>';
			echo ($fila['rtn_maquinas'] === "on") ? '<td>Si</td>' :  '<td>No</td>';
			echo ($fila['pagado'] === "si") ? '<td><span class="badge badge-pill badge-success">Si pagado</span></td>' :  '<td><span class="badge badge-pill badge-danger">No pagado</span></td>';
			echo ($fila['cliente_estrella'] === "si") ? '<td><span class="badge badge-pill badge-warning">Si</span></td>' :  '<td>No</td>';
			echo "</tr>";
			
		}



		 ?>
	</tbody>
	<tfoot>
		<tr>
			<th>Opciones</th>
			<th>Nombre</th>
			<th>Fecha</th>
			<th>Hora</th>
			<th>Productos</th>
			<th>Rutina</th>
			<th>Baile</th>
			<th>Maquina</th> 
			<th>Pagado</th>
			<th>Estrella</th>
		</tr>
	</tfoot>
</table>






<!-- Modal impresión, excel - pdf -->
<div class="modal fade" id="modalprint" tabindex="-1" role="dialog" aria-labelledby="modalprintLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table id="table_imprimir" class="display" style="width:100%">
			<thead>
			    <tr>
		                <th>Nombre</th>
		                <th>Fecha</th>
		                <th>Hora</th>
		                <th>Rutina</th>
			    </tr>
			</thead>
			<tbody>
				<?php 
				$obj=new cliente();
				$resultado=$obj->consultar_reporte_hoy($hoy);
				while($fila = $resultado -> fetch_array(MYSQLI_ASSOC))
				{
					# code...
					echo "<tr>
					<td style='text-align: left'>".$fila["nombre"]."</td>
					<td>".$fila['fecha_clientes_new']."</td>
					<td>".$fila['hora']."</td>
					<td>".$fila['pago']."</td>
					</tr>";	

				}
				 ?>
			</tbody>
			<tfoot>
				<tr>
		                <th>Nombre</th>
		                <th>Fecha</th>
		                <th>Hora</th>
		                <th>Rutina</th> 
				</tr>
			</tfoot>
		</table>
      </div>
    </div>
  </div>
</div>

