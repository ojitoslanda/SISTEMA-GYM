<?php
date_default_timezone_set('America/Lima');
require_once("../model/clientes.php");
$hoy = date('Y-m-d'); //Consulto la fecha de hoy
$obj=new cliente();
$resultado=$obj->consultar_cliente_mensual();
while($fila = $resultado -> fetch_array(MYSQLI_ASSOC))
{
	# code...
	echo "<tr>
	<td>
	<a target='_blank' href='../view/clientes/modificar-&-eliminar-cliente.php?cod=".$fila["ID"]."'>
	<i class='fa fa-id-card-o' style='font-size:30px;color:blue'></i>
	</a>
	</td>
	<td style='text-align: left'>".$fila["nombre"]."</td>
	<td>".$fila['fecha_clientes']."</td>
	<td>".$fila['hora']."</td>
	<td><button type='button' class='btn btn-link' data-toggle='modal' data-target='#modal_lista_producto'  onclick='sendIDUser(".$fila['ID'].",".'"'.$fila['fecha_clientes'].'"'.")' >Ver Producto</button></td>
	<td>".$fila['pago']."</td>";
	echo ($fila['rtn_baile'] === "on") ? '<td>Si</td>' : '<td>No</td>';
	echo ($fila['rtn_maquinas'] === "on") ? '<td>Si</td>' :  '<td>No</td>';
	echo "</tr>";


}



?>
