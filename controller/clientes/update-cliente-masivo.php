<?php
require_once("../../model/clientes.php");
$obj=new cliente();   
$idCliente = $_POST['idCode'];
$fecha_cliente = $_POST['fechaCliente'];
$hora_cliente = $_POST['horaCliente'];
$fecha_time = $fecha_cliente. " " . $hora_cliente;
$monto_adelantado = $_POST['monto'];
echo "php_" . $idCliente . "\n";
echo "php_" . $fecha_time. "\n";
echo "php_" . $monto_adelantado; 

$obj->registrar_cliente_eventos("X","","#000000","#FFF",$fecha_time,$fecha_time,$idCliente);
$obj->registrar_cliente_tantos_dias($idCliente,$monto_adelantado,$fecha_cliente);
$obj->update_clienteDate($idCliente,$fecha_cliente,$monto_adelantado);