<?php
require_once("../model/clientes.php");
date_default_timezone_set('America/Lima');
$hoy = date('Y-m-d'); //Consulto la fecha de hoy
$obj=new cliente();
$result=$obj->getCantClientes_estrellas($hoy);
$tot = $result->fetch_assoc();
foreach ($tot as $key => $value)
{
    $cantidad = $value;
    echo $cantidad;
    
}
?>