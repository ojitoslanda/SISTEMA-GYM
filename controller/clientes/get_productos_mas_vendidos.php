<?php
require_once("../model/clientes.php");
date_default_timezone_set('America/Lima');
$hoy = date('Y-m-d'); //Consulto la fecha de hoy
$obj=new cliente();
$datos=$obj->productos_mas_vendidos($hoy);
while($var=$datos->fetch_array(MYSQLI_ASSOC))
{
	if( $var['nombre_producto'] !== 'Ninguno'){
		echo '<tr>
		<td class="text-left">'.$var['nombre_producto'].' &nbsp;</td>
		<td>  <span class="fa fa-long-arrow-right"></span>  </td>
		<td>'.$var['cantidad'].'</td>
	  </tr>';
	}
}
?>