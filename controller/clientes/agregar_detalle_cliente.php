<?php 
date_default_timezone_set('America/Lima');
require_once("../../model/clientes.php");
$obj=new cliente(); 
$idCliente = $_POST['id_cliente'];
$tipo_producto = $_POST['tipo'];
$cant = $_POST['cantidad_d'] ?? null;
$fecha = $_POST['fecha_d'];
$hora = date("H:i:s"); 
$costo_producto = $_POST['total_d']; //Total de producto ya concluido
$descuento_producto = $_POST['DescuentoProducto'];

// echo "Tipo Producto: ".$tipo_producto."<br>";
// echo "ID_CLIENTE : ".$idCliente."<br>";
// echo "CANTIDAD :".$cant."<br>";
// echo "FECHA :".$fecha."<br>";
// echo "TOTAL :".$costo_producto."<br>";
// echo "DESCUENTO :".$descuento_producto."<br>";


if($cant == null){
	$ruta="Location: ../../view/clientes/modificar-&-eliminar-cliente.php?cod=".$idCliente;
	header($ruta);
}else{

	if($obj->registrar_cliente_detalle($idCliente,$tipo_producto,$cant,$fecha,$hora,$costo_producto,$descuento_producto)){
		$ruta="Location: ../../view/clientes/modificar-&-eliminar-cliente.php?cod=".$idCliente;
	}else{
		$ruta="Location: ../../view/clientes/modificar-&-eliminar-cliente.php?cod=".$idCliente;
	}
	
		header($ruta);
}


?>