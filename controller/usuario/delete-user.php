<?php

require_once('../../model/usuario.php');

$codigo=$_POST['cod'];


$cn = new usuario();
if($cn->delete_user($codigo))
{
 $ruta="Location: ../../view/cpanel-consultar-usuario"; 
 header($ruta);
}else{
$ruta="Location: ../../view/cpanel-consultar-usuario"; 
 header($ruta);
}


?>
