<?php
require_once("../model/db_tipo_pago.php");
$obj=new tipopago();
$datos=$obj->consultar_tipo_pago();
while($var=$datos->fetch_array(MYSQLI_ASSOC))
{
  echo "<li>".$var['pago']."
        <span class='fa fa-long-arrow-right'></span> 
        <strong>
          S/.".$var['costo_pago']."
        </strong>
        </li>";
}
?>