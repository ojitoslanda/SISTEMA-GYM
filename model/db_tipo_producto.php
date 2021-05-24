<?php 
require_once("conexion.php");
class tipoproducto{


//##################### OBTENER BD TIPO DE PRODUCTO ############################
	public function consultar_tipo_producto(){
		$cn = new conexion();
		$cn->conectar();
		$sql="SELECT * FROM db_tipo_producto";
		return $cn->SetEjecucionQuery($sql);
	}

//##################### ELIMINAR PRODUCTO ############################
	public function delete_producto($id){
		$cn = new conexion();
		$cn->conectar();
		$sql="DELETE FROM db_tipo_producto WHERE id = $id";
		return $cn->SetEjecucionQuery($sql);
	}
//##################### AGREGAR PRODUCTO ############################
	public function agregar_producto($nombre,$costo){
		$cn = new conexion();
		$cn->conectar();
		$sql="INSERT INTO db_tipo_producto(nombre_producto,costo_producto) VALUES ('$nombre','$costo')";
		return $cn->getEjecucionQuery($sql);
	}
//##################### ACTUALIZAR PRODUCTO ############################
	public function update_producto($id,$nombre,$costo)
	{
		$cn = new conexion();
		$cn->conectar();
		$sql="UPDATE db_tipo_producto SET nombre_producto='$nombre', costo_producto=$costo WHERE id = $id";
		return $cn->getEjecucionQuery($sql);
	}



}




 ?>