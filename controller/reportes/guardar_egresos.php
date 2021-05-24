<?php
date_default_timezone_set("America/Lima");
$hoy = date('Y-m-d');
require_once("../../model/reportes.php");
$obj=new Reportes();
$nom = $_POST['nombre'];
$cost = $_POST['costo'];
$descrip = $_POST['descripcion'];
$resultado=$obj->add_egresos($nom,$descrip,$hoy,$cost);
if($resultado){header("Location: ../../view/cpanel-consultas"); }
 ?>
