

<?php 
require_once("../../../model/clientes.php");
$cod = $_POST['id'];
$date= $_POST['hoy'];
$obj=new cliente();
$resultado  = $obj->productos_consumidos_hoy($cod,$date);
$registros = $resultado->num_rows;


if($registros < 1 ){
	echo "No tiene niguna compra";
}else{
	while ($fila = $resultado->fetch_array(MYSQLI_ASSOC))
			{
				if($fila['nombre'] !== "Ninguno")
				{
					$datos = $fila['nombre']."(".$fila['cantPro'].")";
					echo "<ul>";
					echo '<li class="font-weight-bold">'.strtoupper($datos).'</li>';
					echo "</ul>";
				}else{
					echo "No tiene ninguna compra";
				}
		

			}
}




 ?>