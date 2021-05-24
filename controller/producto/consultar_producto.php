<?php

require_once("../model/db_tipo_producto.php");
$obj=new tipoproducto();
$resultado=$obj->consultar_tipo_producto();
while($fila = $resultado -> fetch_array(MYSQLI_ASSOC)){


	if($fila['nombre_producto'] !== "Ninguno" )
	{
		echo '<tr>
			<td class="text-left">'.$fila["nombre_producto"].'</td>
			<td class="text-center font-weight-bold"> S/. '.$fila['costo_producto'].'</td>
			<td>
              <button class="btn btn-danger btn-sm" onclick="delete_producto('.$fila["id"].');">Eliminar</button>
               <button class="btn btn-success btn-sm modificar_p"
					onclick="modificar_producto('.$fila["id"].','."'".$fila['nombre_producto']."'".','."'".$fila['costo_producto']."'".');">Modificar</button>
			</td>
		  </tr>';	
	}
	
}

?>
