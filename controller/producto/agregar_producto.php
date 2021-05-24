<?php 
require_once("../../model/db_tipo_producto.php");
$obj=new tipoproducto();
$npro = ucwords($_POST['nombre']);
$nombre_producto = str_replace(' ', '', $npro);
$cpro = $_POST['costo'];


if($obj->agregar_producto($nombre_producto,$cpro)){ header('Location: ../../view/cpanel-cliente'); }

 ?>