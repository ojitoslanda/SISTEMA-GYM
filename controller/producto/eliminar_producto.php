<?php 
require_once("../../model/db_tipo_producto.php");
$obj=new tipoproducto();
if(isset($_POST['cod']))
{
	$codigo = $_POST['cod'];
	$obj->delete_producto($codigo);
	echo "Eliminado";
}

 ?>