<?php 
require_once("../../model/db_tipo_producto.php");
$obj=new tipoproducto();
$cod = $_POST['id'];
$nom = ucwords($_POST['nombre']);
$cost = $_POST['costo'];

if($obj->update_producto($cod,$nom,$cost)){
echo "Si";
}else{}


 ?>