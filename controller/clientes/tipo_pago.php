<?php
require_once("../model/db_tipo_pago.php");
$obj = new tipopago();
$datos=$obj->consultar_tipo_pago();
while($var_tipo_pago=$datos->fetch_array(MYSQLI_ASSOC))
{
echo "<option label=".$var_tipo_pago['pago']." value=".$var_tipo_pago['ID']." >".$var_tipo_pago['costo_pago']."</option>";
}
?>