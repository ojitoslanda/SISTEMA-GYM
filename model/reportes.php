<?php
require_once("conexion.php");
class Reportes{
// ###########CONSULTA DE CUALES SON LOS PRODUCTOS MAS VENDIDOS ###########
public function resumen_productos($hoy)
{
	$cn = new conexion();
	$cn->conectar();
	$sql = "SELECT DISTINCT (clientes_detalle.id_producto),
							db_tipo_producto.nombre_producto,
							db_tipo_producto.costo_producto,
							SUM(clientes_detalle.cant) AS cantidad,
							SUM(clientes_detalle.total_producto)  AS total
		  FROM clientes_detalle
		  INNER JOIN db_tipo_producto ON db_tipo_producto.id = clientes_detalle.id_producto
		  INNER JOIN clientes ON clientes.ID = clientes_detalle.id_clientes
		  WHERE clientes_detalle.fecha_producto = '$hoy' 
			AND clientes.estado = 'si'
		  GROUP BY clientes_detalle.id_producto  ";

/*
	$sql = "SELECT DISTINCT (clientes_detalle.id_producto),db_tipo_producto.nombre_producto
			FROM clientes_detalle
			INNER JOIN db_tipo_producto ON db_tipo_producto.id = clientes_detalle.id_producto" ;
*/
	return $cn->SetEjecucionQuery($sql);
}
// ########### CONSULTA DE CUALES SON LOS RUTINAS MAS VENDIDOS ###########
public function resumen_rutina($hoy)
{
	$cn = new conexion();
	$cn->conectar();
	$sql = "SELECT DISTINCT (clientes.id_tipo_pago),
			db_tipo_pago.pago as rutina,
			db_tipo_pago.costo_pago as costo,
			COUNT(*) as cantidad
			FROM clientes
			INNER JOIN db_tipo_pago ON db_tipo_pago.ID = clientes.id_tipo_pago
			WHERE clientes.fecha_clientes_new = '$hoy' 
			AND clientes.estado = 'si'
			AND clientes.pagado = 'si'
			AND clientes.cliente_estrella = 'no'
			GROUP BY clientes.id_tipo_pago";

/*
	$sql = "SELECT DISTINCT (clientes_detalle.id_producto),db_tipo_producto.nombre_producto
			FROM clientes_detalle
			INNER JOIN db_tipo_producto ON db_tipo_producto.id = clientes_detalle.id_producto" ;
*/
	return $cn->SetEjecucionQuery($sql);
}

//##################### registrar egresos ############################
	public function add_egresos($n,$d,$f,$c){
	$cn = new conexion();
	$cn->conectar();
	$sql="INSERT INTO t_egresos(nombre,descripcion,fecha,costo_total)VALUES('$n','$d','$f','$c')";
	return $cn->getEjecucionQuery($sql);
	}
	public function consulta_egresos($hoy){
	$cn = new conexion();
	$cn->conectar();
	$sql="SELECT * FROM t_egresos WHERE fecha = '$hoy'";
	return $cn->getEjecucionQuery($sql);
	}
	public function consulta_egresos_fecha($hoy){
		$cn = new conexion();
		$cn->conectar();
		$sql="SELECT DISTINCT fecha FROM t_egresos WHERE fecha = '$hoy'";
		return $cn->getEjecucionQuery($sql);
		}


	public function eliminar_egresos($id){
	$cn = new conexion();
	$cn->conectar();
	$sql="DELETE FROM t_egresos WHERE id = $id";
	return $cn->getEjecucionQuery($sql);
	}

	public function update_egresos($nombre,$descr,$costo_total,$id){
	$cn = new conexion();
	$cn->conectar();
	$sql="UPDATE t_egresos SET nombre ='$nombre', descripcion = '$descr' , costo_total=$costo_total WHERE id = $id";
	return $cn->getEjecucionQuery($sql);
	}

	public function consultar_ganancia_semanal_egreso($fecha){
	$cn = new conexion();
	$cn->conectar();
	$sql="SELECT SUM(costo_total) as total , COUNT(*) FROM t_egresos WHERE fecha = '$fecha' ";
	return $cn->getEjecucionQuery($sql);
	}

	public function consultar_ganancia_semanal_ingreso_fecha($fecha){
		$cn = new conexion();
		$cn->conectar();
		$sql="SELECT * FROM t_egreso WHERE fecha = '$fecha' ";
		return $cn->getEjecucionQuery($sql);
		}
	//##################### registrar ingresos ############################
	public function add_ingreso($fecha,$costo_total){
	$cn = new conexion();
	$cn->conectar();
	$sql="INSERT INTO t_ingresos(fecha,costo_total)VALUES('$fecha','$costo_total')";
	return $cn->getEjecucionQuery($sql);
	}

	public function consultar_ganancia_semanal_ingreso($fecha){
	$cn = new conexion();
	$cn->conectar();
	$sql="SELECT fecha,costo_total AS total FROM t_ingresos WHERE fecha = '$fecha' ";
	return $cn->getEjecucionQuery($sql);
	}



	//##################### Consultar Baile y Maquinas ############################
	public function consulta_cant_baile($date){
		$cn = new conexion();
		$cn->conectar();
		$sql="SELECT COUNT(rtn_baile) as cantbaile 
					FROM clientes 
					WHERE fecha_clientes_new = '$date' 
					AND rtn_baile = 'on'  
					AND rtn_maquinas = 'off' 
					AND pagado = 'si'
					AND estado = 'si' 
					AND cliente_estrella = 'no' ";
		return $cn->getEjecucionQuery($sql);
	}

	public function consulta_cant_maquina($date){
		$cn = new conexion();
		$cn->conectar();
		$sql="SELECT COUNT(rtn_maquinas) as cantmaquinas
				 FROM clientes 
				 WHERE fecha_clientes_new = '$date' 
				 AND rtn_maquinas = 'on' 
				 AND rtn_baile = 'off' 
				 AND pagado = 'si'
				 AND estado = 'si' 
				 AND cliente_estrella = 'no' ";
		return $cn->getEjecucionQuery($sql);
	}

	public function consulta_cant_BM($date,$precioBM){
		$cn = new conexion();
		$cn->conectar();
		$sql="SELECT  COUNT(*) as cantAmbos, precio_bm  
					FROM clientes 
					WHERE fecha_clientes_new = '$date' 
					AND pagado = 'si'
					AND estado = 'si'
					AND cliente_estrella = 'no'
					AND rtn_maquinas = 'on' 
					AND rtn_baile = 'on' 
					AND precio_bm = '$precioBM' ";
		return $cn->getEjecucionQuery($sql);
	}

	public function consulta_precioBM($date){
		$cn = new conexion();
		$cn->conectar();
		$sql="SELECT DISTINCT precio_bm 
					FROM clientes 
					WHERE fecha_clientes_new = '$date' 
					AND rtn_maquinas = 'on' 
					AND rtn_baile = 'on' 
					AND pagado = 'si'
					AND estado = 'si'
					AND cliente_estrella = 'no'
					";
		return $cn->getEjecucionQuery($sql);
	}


	//##################### Buscar consulta fecha DESDE Y HASTA ############################

	public function buscar_fecha_desde_hasta($desde,$hasta){
		$cn = new conexion();
		$cn->conectar();
		$sql="SELECT * FROM clientes WHERE fecha_clientes BETWEEN '$desde' AND  '$hasta' ORDER BY ID ASC ";
		return $cn->getEjecucionQuery($sql);
	}

	public function get_tipo_Pago($id){
		$cn = new conexion();
		$cn->conectar();
		$sql="SELECT * FROM db_tipo_pago WHERE ID = $id ";
		return $cn->getEjecucionQuery($sql);
	}




	//##################### CONSULTAR NOMBRE DEL CLIENTE ############################
	public function consultar_nom_cliente($cliente){
		$cn = new conexion();
		$cn->conectar();
		$sql="SELECT * FROM clientes WHERE nombre LIKE '%".$cliente."%' ";
		return $cn->SetEjecucionQuery($sql);
	}


	//##################### CONSULTAR MEMBRECIA  ############################
	public function consultarMembreciaSemanal(){
		$cn = new conexion();
		$cn->conectar();
		$sql="SELECT ID,nombre	
					FROM clientes 
					WHERE id_tipo_pago  = 2 
					AND estado = 'si' 
					AND cliente_estrella = 'no' ";
		return $cn->SetEjecucionQuery($sql);
	}
	public function consultarMembreciaQuincenal(){
		$cn = new conexion();
		$cn->conectar();
		$sql="SELECT ID,nombre 
					FROM clientes 
					WHERE id_tipo_pago  = 3 
					AND estado = 'si' 
					AND cliente_estrella = 'no' ";
		return $cn->SetEjecucionQuery($sql);
	}

	public function consultarMembreciaMensual(){
		$cn = new conexion();
		$cn->conectar();
		$sql="SELECT ID,nombre
					FROM clientes 
					WHERE id_tipo_pago  = 4 
					AND estado = 'si' 
					AND cliente_estrella = 'no' ";
		return $cn->SetEjecucionQuery($sql);
	}

//##################### CONSULTAR MEMBRECIA MAX Y MIN ############################
	public function consultarMembreciaMIN($id){
		$cn = new conexion();
		$cn->conectar();
		$sql="SELECT clientes.ID as idc , clientes.nombre as cliente , MIN(eventos.start) as fecha
					FROM clientes
					INNER JOIN eventos ON  eventos.id_cliente = clientes.ID
					WHERE clientes.ID = $id";
		return $cn->SetEjecucionQuery($sql);
	}

	public function consultarMembreciaMAX($id){
		$cn = new conexion();
		$cn->conectar();
		$sql="SELECT clientes.nombre as cliente , MAX(eventos.start) as fecha
					FROM clientes
					INNER JOIN eventos ON  eventos.id_cliente = clientes.ID
				  WHERE clientes.ID = $id";
		return $cn->SetEjecucionQuery($sql);
	}

	//##################### */membrecias arriba ############################




}
 ?>
