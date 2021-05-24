<?php
require_once("../../model/reportes.php");
$obj=new Reportes();
$cod = $_POST['id'];
$nombre = ucwords($_POST['nombre']);
$descr  = $_POST['descr'];
$costo_total = $_POST['cost'];
echo  $cod,$nombre,$descr,$costo_total;
if($obj->update_egresos($nombre,$descr,$costo_total,$cod)){
echo "Si";
}else{}

 ?>
