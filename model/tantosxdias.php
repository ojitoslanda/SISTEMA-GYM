<?php 
require_once("conexion.php");
class TantoxDias{
	public function update($id,$monto){
		$cn = new conexion();
		$cn->conectar();
		$sql="UPDATE cliente_tantosdias SET monto_adelanto = '$monto' WHERE id = $id ";
		return $cn->getEjecucionQuery($sql);
	}

	public function update2($id,$monto){
		$cn = new conexion();
		$cn->conectar();
		$sql="UPDATE cliente_tantosdias SET monto_adelanto = '$monto' WHERE id_cliente = $id";
		return $cn->getEjecucionQuery($sql);
	}

	public function update3($id,$monto,$fecha){
		$cn = new conexion();
		$cn->conectar();
		$sql="UPDATE cliente_tantosdias SET monto_adelanto = '$monto' WHERE id_cliente = $id AND fecha = '$fecha' ";
		return $cn->getEjecucionQuery($sql);
	}

	public function actualizar_cliente($codigo,$monto){
		$cn = new conexion();
		$cn->conectar();
		$sql="UPDATE clientes SET dinero_adelantado = '$monto' WHERE ID = $codigo";
		return $cn->getEjecucionQuery($sql);
	}

	public function actualizar_cliente_new($codigo,$monto,$fecha){
		$cn = new conexion();
		$cn->conectar();
		$sql="UPDATE clientes SET dinero_adelantado = '$monto', fecha_clientes_new = '$fecha' WHERE ID = $codigo ";
		return $cn->getEjecucionQuery($sql);
	}

	public function update4($codigo,$monto,$fecha){
		$cn = new conexion();
		$cn->conectar();
		$sql="INSERT INTO cliente_tantosdias(id_cliente,monto_adelanto,fecha) VALUES ('$codigo','$monto','$fecha')";
		return $cn->getEjecucionQuery($sql);
	}
}