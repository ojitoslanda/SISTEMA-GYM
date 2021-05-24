
<?php 
require_once("../model/usuario.php");

$obj=new usuario();
$resultado=$obj->consultar_y_modificar();
while ($fila=$resultado->fetch_array(MYSQLI_ASSOC))
 {	
echo "<tr>
    <td style='text-align:center;width:2%;'>#</td>
	<td>".$fila["nombre"]."</td>
    <td>".$fila["user"]."</td>
    <td>".$fila["clave"]."</td>
    <td>".$fila["rol"]."</td>
    <td style='text-align:center;width:19%'>
    <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#mUser' 
    onclick='sendUser(".$fila['ID'].")'>Modificar</button>
    <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#mUser2' 
    onclick='send_delete_User(".$fila['ID'].")'>Eliminar</button>
    </td>
   </tr>";
 	
}



 ?>














