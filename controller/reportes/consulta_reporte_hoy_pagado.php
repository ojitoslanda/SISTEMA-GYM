<?php 
date_default_timezone_set('America/Lima');
require_once("../model/clientes.php");
$hoy = date('Y-m-d'); //Consulto la fecha de hoy
?>
<table id="table_cpagado" class="table-hover display" style="width:100% ">
	<thead>
	    <tr>
					<th>Opciones</th>
					<th>Nombre</th>
					<th>Hora</th>
					<th>Productos</th>
					<th>Descuento Productos</th>
					<th>Rutina</th>
					<th>Descuento Rutina</th>
					<th>Baile</th>
					<th>Maquina</th>
					<th>Din. Adelanto</th>
	    </tr>
	</thead>
	<tbody class="text-center">
		<?php 
		$obj=new cliente();
		$resultado=$obj->consultar_reporte_hoy_pagado($hoy);
		while($fila = $resultado -> fetch_array(MYSQLI_ASSOC))
		{
			echo "<tr>
			<td>
			<a target='_black' href='../view/clientes/modificar-&-eliminar-cliente.php?cod=".$fila["ID"]."'>
			<i class='fa fa-id-card-o' style='font-size:30px;color:blue'></i>
			</a>
			</td>
			<td style='text-align: left'>".$fila["nombre"]."</td>
			<td>".$fila['hora']."</td>
			<td><button type='button' class='btn btn-link' data-toggle='modal' data-target='#modal_lista_producto'  onclick='sendIDUser(".$fila['ID'].",".'"'.$fila['fecha_clientes_new'].'"'.")' >Ver Producto</button></td>
			<td>".$fila['pago']."</td>";
			echo ($fila['rtn_baile'] === "on") ? '<td>Si</td>' : '<td>No</td>';
			echo ($fila['rtn_maquinas'] === "on") ? '<td>Si</td>' :  '<td>No</td>';
			echo ($fila['pagado'] === "si") ? '<td><span class="badge badge-pill badge-success">Si pagado</span></td>' :  '<td><span class="badge badge-pill badge-danger">No pagado</span></td>';
			echo '<td>'.$fila['dinero_adelantado'].'</td>';
			echo "</tr>";
			
		}
		 ?>
	</tbody>
	<tfoot>
		<tr>
					<th>Opciones</th>
					<th>Nombre</th>
					<th>Hora</th>
					<th>Productos</th>
					<th>Descuento Productos</th>
					<th>Rutina</th>
					<th>Descuento Rutina</th>
					<th>Baile</th>
					<th>Maquina</th>
					<th>Dinero Adelanto</th>
		</tr>
	</tfoot>
</table>



