<?php 
require_once("../model/reportes.php");
date_default_timezone_set('America/Lima');
$hoy = date('Y-m-d'); //Consulto la fecha de hoy
$obj=new Reportes();
$datos=$obj->resumen_productos($hoy);
$sumap_total = 0;
$sumap_cant = 0;
$pcantxcost = 0;

while($var=$datos->fetch_array(MYSQLI_ASSOC))
{

	$cantidad_producto = $var['cantidad'];
	$costo_prodcuto = $var['total'];
	$sumap_cant += $cantidad_producto;
	$sumap_total += $costo_prodcuto;

	if($var['nombre_producto'] !== "Ninguno"){
	  echo '<tr>
			<td>'.$var['nombre_producto'].'</td>
			<td>'.$var['cantidad'].'</td>
  			</tr>';
		}
 
}

echo '<tr>
		<td class="font-weight-bold">TOTAL</td>
        <td class="text-primary">
            <h5>'.$sumap_cant.'</h5>
		</td>
     </tr>
	  ';
 ?>