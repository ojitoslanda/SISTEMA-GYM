<?php
date_default_timezone_set("America/Lima");
$hoy = date('Y-m-d');
require_once("../../model/reportes.php");
$obj=new Reportes();
$total = $_POST['total'];
$r = $obj->add_ingreso($hoy,$total);
if($r){header("Location: ../../view/cpanel-consultas?m=t");}

 ?>
