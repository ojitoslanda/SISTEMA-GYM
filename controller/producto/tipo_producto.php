<?php
require_once("../model/db_tipo_producto.php");
$obj = new tipoproducto();
$datos=$obj->consultar_tipo_producto();
while($var_tipo=$datos->fetch_array(MYSQLI_ASSOC))
{
echo "<option label=".$var_tipo['nombre_producto']." value=".$var_tipo['id'].">".$var_tipo['costo_producto']."</option>";
}
?>