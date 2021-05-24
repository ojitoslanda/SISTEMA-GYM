<?php
require_once("../model/usuario.php");
$obj=new usuario();
$result=$obj->getCantUser();
$tot = $result->fetch_assoc();
foreach ($tot as $key => $value)
{
echo  $cantidad=$value[0];
}
?>