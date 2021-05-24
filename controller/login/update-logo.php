<?php 
require_once("../../model/usuario.php");
$id = 1;
////////////////////////////////////////
//$nombre_imagen=$_FILES['imagen']['name'];
$nombre_imagen="logo";
$tipo_imagen=$_FILES['imagen']['type'];
$tamaño_imagen=$_FILES['imagen']['size'];



//if($tamaño_imagen<=1000000){ esto es en BYTE
/*ruta de la carpeta*/

if($tipo_imagen=="image/jpeg" || $tipo_imagen=="image/jpg" || $tipo_imagen=="image/png"){

$tipo_imagen=$_FILES['imagen']['type'] == "image/png" ? ".png" : ".jpg";
  
$carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'/GymSystem/view/cpanel_login/logo-img/';
//$carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'/view/usuarios/usuarios-images/';

//movemos la imagen del directirio temporal al directorio escogido.
move_uploaded_file($_FILES['imagen']['tmp_name'],$carpeta_destino.$nombre_imagen.$tipo_imagen);

//print_r($tipo_imagen);
///////////////////////////////////////
}else{
//echo "SOLO SE PUEDE SUBIR FORMATO DE IMAGENES";
}

//}else{
//	echo "EL TAMAÑO ES DEMASIADO GRANDE";
//}






$obj=new usuario(); 
if($obj->actualizar_imagen_logo($id,$nombre_imagen.$tipo_imagen))
{
 $ruta="Location: ../../view/cpanel-login-logo?msj=good"; 
  header($ruta);
}
else
{
  $ruta="Location: . ../../cpanel-login-logo?msj=bad";
 header($ruta);
}




 ?>