<?php 
  include_once '../controller/header-conexion.php';
  include_once '../config/config.php';
  if($rol == "Administrador"){
  	require_once 'cpanel-index.php';
  }elseif($rol == "Usuario"){
		require_once 'cpanel-cliente.php';
  }else{
  	echo "NO PENDEJO,NO PUEDES ENTRAR";
  }
?>
