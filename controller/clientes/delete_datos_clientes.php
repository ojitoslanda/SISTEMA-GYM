<?php 
require_once('../../model/clientes.php');
$cli = new cliente();

if(isset($_POST['id'])){
	$cod = $_POST['id'];
	$cli->delete_cliente($cod);
}else{}

if(isset($_POST['idd'])){
	$codD = $_POST['idd'];
	$cli->delete_detalle_cliente($codD);
}else{}


if(isset($_POST['idClienteNoPagado'])){
	$cod = $_POST['idClienteNoPagado'];
	$cli->delete_cliente_sinPagar($cod);
	$cli->delete_detalle_cliente($cod);
}else{}



 ?>