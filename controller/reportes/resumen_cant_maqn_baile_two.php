<?php 
require_once("../model/reportes.php");
date_default_timezone_set('America/Lima');
$hoy = date('Y-m-d'); //Consulto la fecha de hoy
$obj=new Reportes();
$datosPreciosBM = $obj->consulta_precioBM($hoy);

$cantxprecio = 0;
$suma_totalBM = 0;
$suma_cantBM = 0;

while($datosBM = $datosPreciosBM->fetch_array(MYSQLI_ASSOC)){
		$datos=$obj->consulta_cant_BM($hoy,$datosBM['precio_bm']);
		while($var=$datos->fetch_array(MYSQLI_ASSOC))
		{

			$cantAmbos = $var['cantAmbos'];
			$precioBM =$var['precio_bm'];
			$cantxprecio = $cantAmbos * $precioBM;
			echo '<tr>';
			echo '<td><small>Baile + Maquina</small></td>
						<td>'.$var['cantAmbos'].'</td>';
			echo '<td>'.$var['precio_bm'].'</td>
				<td>'.$cantxprecio.'</td>
				</tr>';
				
			$suma_cantBM += $cantAmbos;
			$suma_totalBM += $cantxprecio;
		}
}

echo ' <tr>
        <td class="font-weight-bold">Totales</td>
         <td class="text-primary">
            <h5>'.$suma_cantBM.'</h5>
		</td>
		<td></td>
        <td class="text-danger">
            <h5>'.$suma_totalBM.'</h5>
         </
       </tr>';


 ?>