<?php

ob_start();
session_start();
require_once("../model/usuario.php");
date_default_timezone_set('America/Lima');

if(isset($_SESSION['user']))
{

#El usuario accedio correctamente
$nombre =$_SESSION['user']['nombre'];
$user =$_SESSION['user']['user'];
$rol = $_SESSION['user']['rol'];
$foto = $_SESSION['user']['foto'];

}
else {
  #MENSAJE DE  QUE NO TE LOGEASTE AL INGRESAR
header('Location: ./../index.php');
}
ob_end_flush();

 ?>
