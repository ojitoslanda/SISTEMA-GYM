<?php 
require_once("../../model/usuario.php");
$id = $_POST['id'];
$nom = $_POST['nombre'];
$user = $_POST['user'];
$clave = $_POST['clave'];
$rol = $_POST['rol'];
////////////////////////////////////////
$nombre_imagen=$_FILES['imagen']['name'];
$tipo_imagen=$_FILES['imagen']['type'];
$tamaño_imagen=$_FILES['imagen']['size'];



//if($tamaño_imagen<=1000000){ esto es en BYTE
/*ruta de la carpeta*/

if($tipo_imagen=="image/jpeg" || $tipo_imagen=="image/jpg" || $tipo_imagen=="image/png"){
  
$carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'/GymSystem/view/usuarios/usuarios-images/';
//$carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'/view/usuarios/usuarios-images/';
//movemos la imagen del directirio temporal al directorio escogido.
move_uploaded_file($_FILES['imagen']['tmp_name'],$carpeta_destino.$nombre_imagen);

//print_r($tipo_imagen);
///////////////////////////////////////
}else{
//echo "SOLO SE PUEDE SUBIR FORMATO DE IMAGENES";
}

//}else{
//	echo "EL TAMAÑO ES DEMASIADO GRANDE";
//}






$obj=new usuario(); 
if($obj->actualizar_user($id,$nom,$user,$clave,$rol,$nombre_imagen))
{
 $ruta="Location: ../../view/cpanel-consultar-usuario?msj=good"; 
 header($ruta);
}
else
{
  $ruta="Location: . ../../cpanel-consultar-usuario?msj=bad";
  header($ruta);
}




 ?>