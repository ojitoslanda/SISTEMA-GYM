<?php 

require_once("../model/reportes.php");
date_default_timezone_set('America/Lima');
$hoy = date('Y-m-d'); //Consulto la fecha de hoy
$obj=new Reportes();
$datos=$obj->resumen_rutina($hoy);

$suma_total = 0;
$suma_cant = 0;
$cantxcost = 0;

while($var=$datos->fetch_array(MYSQLI_ASSOC))
{	
	$cantidad_rutina = $var['cantidad'];
	$costo_rutina = $var['costo'];
	$cantxcost = $cantidad_rutina * $costo_rutina;

    echo '<tr>
			<td>'.$var['rutina'].'</td>
			<td>'.$var['cantidad'].'</td>
		 </tr>';

	$suma_total += $cantxcost;
	$suma_cant += $cantidad_rutina;
}
echo ' <tr>
        <td class="font-weight-bold">TOTAL</td>
         <td class="text-primary">
            <h5>'.$suma_cant.'</h5>
        </td>
       </tr>';
 ?>