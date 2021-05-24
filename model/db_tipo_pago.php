<?php 
require_once("conexion.php");
class tipopago {


//##################### OBTENER BD TIPO DE PAGO ############################
public function consultar_tipo_pago(){
	$cn = new conexion();
	$cn->conectar();
	$sql="SELECT * FROM db_tipo_pago";
	return $cn->SetEjecucionQuery($sql);
}

//##################### ACTUALIZAR RUTINA ############################
public function update_allRutina($id,$costo)
{
	$cn = new conexion();
	$cn->conectar();
	$sql="UPDATE db_tipo_pago SET costo_pago = $costo WHERE ID = $id";
	return $cn->getEjecucionQuery($sql);
}
	
}




 ?>