<?php 
require_once("../../../model/reportes.php");
$date = $_POST['hoy'];
$obj=new Reportes();
$resultado  = $obj->consulta_egresos($date);
$registros = $resultado->num_rows;


 if($registros < 1 ){
	 echo " <tr>
                <td colspan='4'>En esa fecha no hubo datos</td>
            </tr>";
}else{
    while ($fila = $resultado->fetch_array(MYSQLI_ASSOC))
    {
      echo " <tr>
                <td>".$fila['nombre']."</td>
                <td>".$fila['descripcion']."</td>
                <td>".$fila['fecha']."</td>
                <td>".$fila['costo_total']."</td>
            </tr>";
        
    }
     
/* 	
				 if($fila['nombre'] !== "Ninguno")
				{
					$datos = $fila['nombre']."(".$fila['cantPro'].")";
					echo "<ul>";
					echo '<li class="font-weight-bold">'.strtoupper($datos).'</li>';
					echo "</ul>";
				}else{
					echo "No tiene ninguna compra";
				} 
		

			 */ 
}

?>
 