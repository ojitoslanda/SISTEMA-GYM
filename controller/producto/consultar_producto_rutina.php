<?php
require_once("../model/db_tipo_pago.php");
$obj=new tipopago();
$resultado=$obj->consultar_tipo_pago();
while($fila = $resultado -> fetch_array(MYSQLI_ASSOC)){
		echo '<tr>
			<td class="text-left">'.$fila["pago"].'</td>
			<td class="text-center font-weight-bold"> S/. '.$fila['costo_pago'].'</td>
			<td>
               <button class="btn btn-success btn-sm modificar_p"
					onclick="modificar_rutina('.$fila["ID"].','."'".$fila['pago']."'".','."'".$fila['costo_pago']."'".');">Modificar</button>
			</td>
		  </tr>';	
}

?>
