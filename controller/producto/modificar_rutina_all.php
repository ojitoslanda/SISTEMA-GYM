<?php 
require_once("../../model/db_tipo_pago.php");
$obj=new tipopago();
$cod = $_POST['id'];
$cost = $_POST['costo'];

if($obj->update_allRutina($cod,$cost)){ echo "Si"; }


 ?>