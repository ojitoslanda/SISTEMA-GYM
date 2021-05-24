<?php
date_default_timezone_set('America/Lima');
require_once("../model/clientes.php");
$hoy = date('Y-m-d'); //Consulto la fecha de hoy
$obj=new cliente();
$resultado=$obj->consultar_cliente_sinPagar($hoy);
while($fila = $resultado -> fetch_array(MYSQLI_ASSOC))
{
	# code...
	echo "<tr>
  <td class='text-center'> 	
  <a href='#' class='txt-center' onclick='btnEliminarClienteSinPagar(".$fila['ID'].")'>
	<i class='fa fa-trash-o' style='font-size:26px;color:red;'></i>
	</a>
  </td>";
  echo "  
  <td> 	
    <button type='button' class='btn btn btn-secondary btn-sm' onclick='btnClientePagado(".$fila['ID'].",".'"'.$fila["pagado"].'"'.")'>".ucfirst($fila["pagado"])."</button>
  </td>";
  echo"<td>".$fila["nombre"]."</td>
	<td>".$fila['fecha_clientes']."</td>
	<td>".$fila['hora']."</td>
	<td><button type='button' class='btn btn-link' data-toggle='modal' data-target='#modal_lista_producto'  onclick='sendIDUser(".$fila['ID'].",".'"'.$fila['fecha_clientes'].'"'.")' >Ver Producto</button></td>
	<td>".$fila['pago']."</td>";
	echo ($fila['rtn_baile'] === "on") ? '<td>Si</td>' : '<td>No</td>';
	echo ($fila['rtn_maquinas'] === "on") ? '<td>Si</td>' :  '<td>No</td>';
	echo "</tr>";
}



?>
