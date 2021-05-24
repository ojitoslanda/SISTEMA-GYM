<?php 

require_once("../model/reportes.php");
date_default_timezone_set('America/Lima');
$hoy = date('Y-m-d'); //Consulto la fecha de hoy
$obj=new Reportes();
$datosBaile=$obj->consulta_cant_baile($hoy);
$datosMaquina=$obj->consulta_cant_maquina($hoy);

$suma = 0; 
$cantBaile = 0;
$cantMaquinas = 0;
while($var=$datosBaile->fetch_array(MYSQLI_ASSOC))
{

echo '<tr>
		<td>Baile</td>
		<td>'.$var['cantbaile'].'</td>
	</tr>';

	$cantBaile += $var['cantbaile'];
}

while($var=$datosMaquina->fetch_array(MYSQLI_ASSOC))
{

echo '<tr>
		<td>Maquinas</td>
		<td>'.$var['cantmaquinas'].'</td>
	</tr>';

	$cantMaquinas += $var['cantmaquinas'];
}


$sumacantbailemaquinas  = ($cantMaquinas) + ($cantBaile);
echo '<tr>
		<td class="font-weight-bold">Total</td>
		<td class="text-primary">
		<h5>'.$sumacantbailemaquinas.'</h5>
	</td>
	</tr>';
 ?>