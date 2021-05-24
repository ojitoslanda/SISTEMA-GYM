<?php
require_once("conexion.php");
class cliente
{
	//##################### REGISTRAMOS LOS DATOS DEL EVENTOS ############################
	public function registrar_cliente_eventos($titulo,$descripcion,$color,$textColor,$start,$end,$id_cliente){
		$cn = new conexion();
		$cn->conectar();
		$sql="INSERT INTO eventos(title,descripcion,color,textColor,start,end,id_cliente) VALUES ('$titulo','$descripcion','$color','$textColor','$start','$end','$id_cliente')";
		return $cn->getEjecucionQuery($sql);
	}



	//##################### REGISTRAMOS LOS DATOS DEL CLIENTE ############################
	public function registrar_cliente($nombre,$fecha_cliente,$fecha_cliente_new,$hora_cliente,$pagado,$id_tipo_pago,$descuentoRutina,$rtn_baile,$rtn_maquinas,$precio_bm,$dias,$dineroAdelanto,$total_rutina,$cliente_estrella){
		$cn = new conexion();
		$cn->conectar();
		$sql="INSERT INTO clientes(nombre,fecha_clientes,fecha_clientes_new,hora,pagado,id_tipo_pago,descuento_rutina,rtn_baile,rtn_maquinas,precio_bm,dias,dinero_adelantado,total_rutina,cliente_estrella) VALUES ('$nombre','$fecha_cliente','$fecha_cliente_new','$hora_cliente','$pagado','$id_tipo_pago','$descuentoRutina','$rtn_baile','$rtn_maquinas','$precio_bm','$dias','$dineroAdelanto','$total_rutina','$cliente_estrella')";
		return $cn->getEjecucionQuery($sql);
	}
	
	//##################### REGISTRAMOS LOS DATOS DE LOS CLIENTE QUE INGRESAN X DIAS ############################

	public function registrar_cliente_tantos_dias($nombre,$monto,$date){
		$cn = new conexion();
		$cn->conectar();
		$sql="INSERT INTO cliente_tantosdias(id_cliente,monto_adelanto,fecha) VALUES ('$nombre','$monto','$date')";
		return $cn->getEjecucionQuery($sql);
	}
	

	//##################### OBTENER EL ULTIMO ID ############################
	public function last_id_cliente(){
		$cn = new conexion();
		$cn->conectar();
		$sql="SELECT MAX(id) AS last_id FROM clientes";
		return $cn->getEjecucionQuery($sql);
	}

	//##################### REGISTRAMOS LOS DETALLES DEL LIENTE############################
	public function registrar_cliente_detalle($id_cliente,$id_producto,$cant,$fecha_producto,$hora,$tproducto,$descuentoProducto){
		$cn = new conexion();
		$cn->conectar();
		$sql="INSERT INTO clientes_detalle(id_clientes,id_producto,cant,fecha_producto,hora_producto,total_producto,descuento_producto) VALUES ('$id_cliente','$id_producto','$cant','$fecha_producto','$hora','$tproducto','$descuentoProducto')";
		return $cn->getEjecucionQuery($sql);
	}

	//##################### ELIMINAMOS LOS DETALLES DE COMPRA  DEL CLIENTE ############################
	public function delete_detalle_cliente($codigo){
		$cn = new conexion();
		$cn->conectar();
		$sql="DELETE FROM clientes_detalle WHERE id_detalle = $codigo";
		return $cn->getEjecucionQuery($sql);
	}

	public function delete_cliente_sinPagar($codigo){
		$cn = new conexion();
		$cn->conectar();
		$sql="DELETE FROM clientes WHERE ID = $codigo";
		return $cn->getEjecucionQuery($sql);
	}
	//##################### actualizamos los datos del cliente ############################
	public function actualizar_cliente($codigo,$nombre,$activo,$pagado,$rutina,$descuento_rutina,$rtn_baile,$rtn_maquinas,$precio_bm,$dias,$dineroAdelantado,$total_rutina,$estrella){
		$cn = new conexion();
		$cn->conectar();
		$sql="	UPDATE clientes SET 
						nombre='$nombre', 
						estado='$activo', 
						pagado='$pagado', 
						id_tipo_pago='$rutina', 
						descuento_rutina='$descuento_rutina',
						rtn_baile = '$rtn_baile', 
						rtn_maquinas='$rtn_maquinas', 
						precio_bm='$precio_bm',
						dias='$dias',
						dinero_adelantado='$dineroAdelantado',
						total_rutina='$total_rutina', 
						cliente_estrella='$estrella'  WHERE ID = $codigo";
		return $cn->getEjecucionQuery($sql);
	}

	//##################### ELIMINAMOS EL CLIENTE ############################
	public function delete_cliente($codigo){
		$cn = new conexion();
		$cn->conectar();
		$sql="UPDATE clientes SET estado = 'no'  WHERE ID = $codigo";
		return $cn->getEjecucionQuery($sql);
	}

		//##################### ACTUALIZAMOS EL PAGO DEL CLIENTE ############################
		public function update_clienteSinPagar($codigo,$pago){
			$cn = new conexion();
			$cn->conectar();
			$sql="UPDATE clientes SET pagado ='$pago' WHERE ID = $codigo";
			return $cn->getEjecucionQuery($sql);
		}
		//##################### ACTUALIZAMOS LA FECHA DEL CLIENTE  ############################
		public function update_clienteDate($codigo,$date,$monto){
			$cn = new conexion();
			$cn->conectar();
			$sql="UPDATE clientes SET fecha_clientes_new ='$date' , dinero_adelantado = '$monto' WHERE ID = $codigo";
			return $cn->getEjecucionQuery($sql);
		}
	//#### CONSULTO LOS PORDUCTOS CONSUMIDOS DEL CLIENTE DEL DIA DE HOY ####//
	public function productos_consumidos_hoy($id,$hoy){
		$cn = new conexion();
		$cn->conectar();
		$sql="SELECT db_tipo_producto.nombre_producto as nombre, clientes_detalle.cant as cantPro FROM clientes_detalle
		      INNER JOIN db_tipo_producto ON db_tipo_producto.id = clientes_detalle.id_producto
		      WHERE clientes_detalle.id_clientes = '$id' AND clientes_detalle.fecha_producto = '$hoy' ";
		return $cn->getEjecucionQuery($sql);
	}
	/*
	*
	*
	*
	*
	*
	*/
	//#### Consulta del cliente que vino tantos por dias ####//
		public function tantospordias_cliente($id){
			$cn = new conexion();
			$cn->conectar();
			$sql="SELECT * FROM cliente_tantosdias WHERE id_cliente = '$id' ";
			return $cn->getEjecucionQuery($sql);
		}
	/*
	*
	*
	*
	*
	*
	*/
	//##################### Consultar - Cliente - Diario ############################
	public function consultar_cliente_estrella($hoy){
		$cn = new conexion();
		$cn->conectar();
		$sql = "SELECT
					   db_tipo_pago.id as tipopago,
					   db_tipo_pago.pago,
					   clientes.ID,
				  	 clientes.nombre,
				  	 clientes.fecha_clientes,
				  	 clientes.hora,
				  	 clientes.estado,
				  	 clientes.pagado,
					   clientes.rtn_baile,
					   clientes.rtn_maquinas,
					   clientes.cliente_estrella
				FROM clientes
				 INNER JOIN db_tipo_pago ON db_tipo_pago.ID = clientes.id_tipo_pago
				 WHERE clientes.fecha_clientes = '$hoy' AND clientes.estado = 'si' AND  clientes.cliente_estrella = 'si' ";

		return $cn->SetEjecucionQuery($sql);
	}
	public function consultar_cliente_todos($hoy){
		$cn = new conexion();
		$cn->conectar();
		$sql = "SELECT
					   db_tipo_pago.id as tipopago,
					   db_tipo_pago.pago,
					   clientes.ID,
				  	 clientes.nombre,
				  	 clientes.fecha_clientes,
				  	 clientes.fecha_clientes_new,
				  	 clientes.hora,
				  	 clientes.estado,
				  	 clientes.pagado,
					   clientes.rtn_baile,
					   clientes.rtn_maquinas,
					   clientes.cliente_estrella
				FROM clientes
				 INNER JOIN db_tipo_pago ON db_tipo_pago.ID = clientes.id_tipo_pago
				 WHERE clientes.fecha_clientes_new = '$hoy' AND clientes.estado = 'si' ";

		return $cn->SetEjecucionQuery($sql);
	}

	public function consulta_masiva_cliente(){
		$cn = new conexion();
		$cn->conectar();
		$sql = "SELECT
					   db_tipo_pago.id as tipopago,
					   db_tipo_pago.pago,
					   clientes.ID,
				  	 clientes.nombre,
				  	 clientes.fecha_clientes,
				  	 clientes.hora,
				  	 clientes.estado,
				  	 clientes.pagado,
					   clientes.rtn_baile,
					   clientes.rtn_maquinas,
					   clientes.dias,
					   clientes.dinero_adelantado,
						 clientes.total_rutina,
					   clientes.cliente_estrella
				FROM clientes
				 INNER JOIN db_tipo_pago ON db_tipo_pago.ID = clientes.id_tipo_pago
				 WHERE  clientes.cliente_estrella = 'no'
				 			AND clientes.id_tipo_pago > 1 
				 		  AND clientes.estado = 'si' ";

		return $cn->SetEjecucionQuery($sql);
	}

	public function consultar_cliente_sinPagar($hoy){
		$cn = new conexion();
		$cn->conectar();
		$sql = "SELECT
					   db_tipo_pago.id as tipopago,
					   db_tipo_pago.pago,
					   clientes.ID,
				  	 clientes.nombre,
				  	 clientes.fecha_clientes,
				  	 clientes.hora,
				  	 clientes.estado,
				  	 clientes.pagado,
					   clientes.rtn_baile,
					   clientes.rtn_maquinas
				FROM clientes
				 INNER JOIN db_tipo_pago ON db_tipo_pago.ID = clientes.id_tipo_pago
				 WHERE clientes.fecha_clientes = '$hoy'
				 			AND clientes.pagado = 'no'
				 			AND clientes.cliente_estrella = 'no'
				 		  AND clientes.estado = 'si'
				 	    ";

		return $cn->SetEjecucionQuery($sql);
	}
	//##################### Consultar - Cliente - TantosDias ############################
	public function consultar_cliente_tantosDias($hoy){
		$cn = new conexion();
		$cn->conectar();
		$sql = "SELECT
							db_tipo_pago.id as tipopago,
							db_tipo_pago.pago,
							clientes.ID,
							clientes.nombre,
							clientes.fecha_clientes,
							clientes.fecha_clientes_new,
							clientes.hora,
							clientes.estado,
							clientes.descuento_rutina,
							clientes.dias,
							clientes.dinero_adelantado,
							clientes.rtn_baile,
							clientes.rtn_maquinas
				FROM clientes
				 INNER JOIN db_tipo_pago ON db_tipo_pago.ID = clientes.id_tipo_pago
				 WHERE   clientes.fecha_clientes_new = '$hoy'
				 			AND clientes.estado = 'si'
							AND clientes.cliente_estrella = 'no'
				 	    AND clientes.id_tipo_pago = 5";

		return $cn->SetEjecucionQuery($sql);
	}
	//################################################################################################
	/*
	*
	*
	*
	*
	*
	*/
	//##################### Consultar - Cliente - Diario ############################
	public function consultar_cliente_diario($hoy){
		$cn = new conexion();
		$cn->conectar();
		$sql = "SELECT
								db_tipo_pago.id as tipopago,
								db_tipo_pago.pago,
								clientes.ID,
								clientes.nombre,
								clientes.fecha_clientes,
								clientes.hora,
								clientes.estado,
								clientes.rtn_baile,
								clientes.rtn_maquinas
				FROM clientes
				 INNER JOIN db_tipo_pago ON db_tipo_pago.ID = clientes.id_tipo_pago
				 WHERE   clientes.fecha_clientes = '$hoy'
				 			AND clientes.estado = 'si'
							AND clientes.pagado = 'si'
							AND clientes.cliente_estrella = 'no'
				 	    AND clientes.id_tipo_pago = 1";

		return $cn->SetEjecucionQuery($sql);
	}
	//################################################################################################
	/*
	*
	*
	*
	*
	*
	*/
	//############################ Consultar - Cliente - Semanal ############################
	public function consultar_cliente_semanal(){
		$cn = new conexion();
		$cn->conectar();
		$sql = "SELECT
					   db_tipo_pago.id as tipopago,
					   db_tipo_pago.pago,
					   clientes.ID,
				  	 clientes.nombre,
				  	 clientes.fecha_clientes,
				  	 clientes.hora,
				  	 clientes.estado,
					   clientes.rtn_baile,
					   clientes.rtn_maquinas
				FROM clientes
				 INNER JOIN db_tipo_pago ON db_tipo_pago.ID = clientes.id_tipo_pago
				 WHERE clientes.estado = 'si'
							 AND clientes.id_tipo_pago = 2
							 AND clientes.pagado = 'si' ";
		return $cn->SetEjecucionQuery($sql);
	}
	//################################################################################################
	/*
	*
	*
	*
	*
	*
	*/
	########################## Consultar - Cliente - quincenal ############################
	public function consultar_cliente_quincenal(){
		$cn = new conexion();
		$cn->conectar();
		$sql = "SELECT
					   db_tipo_pago.id as tipopago,
					   db_tipo_pago.pago,
					   clientes.ID,
				  	   clientes.nombre,
				  	   clientes.fecha_clientes,
				  	   clientes.hora,
				  	   clientes.estado,
					   clientes.rtn_baile,
					   clientes.rtn_maquinas
				FROM clientes
				 INNER JOIN db_tipo_pago ON db_tipo_pago.ID = clientes.id_tipo_pago
				 WHERE clientes.estado = 'si' 
				 			AND clientes.id_tipo_pago = 3
							AND clientes.pagado = 'si' ";

		return $cn->SetEjecucionQuery($sql);
	}
	//################################################################################################
	/*
	*
	*
	*
	*
	*
	*/
	########################## Consultar - Cliente - mensual ############################
	public function consultar_cliente_mensual(){
		$cn = new conexion();
		$cn->conectar();
		$sql = "SELECT
					   db_tipo_pago.id as tipopago,
					   db_tipo_pago.pago,
					   clientes.ID,
				  	   clientes.nombre,
				  	   clientes.fecha_clientes,
				  	   clientes.hora,
				  	   clientes.estado,
					   clientes.rtn_baile,
					   clientes.rtn_maquinas
				FROM clientes
				 INNER JOIN db_tipo_pago ON db_tipo_pago.ID = clientes.id_tipo_pago
				 WHERE clientes.estado = 'si' 
				 			AND clientes.id_tipo_pago = 4	
							AND clientes.pagado = 'si' ";

		return $cn->SetEjecucionQuery($sql);
	}
	/*
	*
	*
	*
	*
	*
	*/
	//############ PAGINA DE MODIFIICAR-ELIMINAR-CLIENTE ############
		/*
		 ALGORITMO DONDE SE ENCUENTRA TODO EL HISTORIAL DEL CLIENTE YA SEA
		  (DIARIO)-(SEMANAL)-(MENSUAL)-(QUINCENAL)
		*/
	//Historial del cliente diario
	public function consultar_historial_cliente_detalle_todo($id){
		$cn = new conexion();
		$cn->conectar();

		$sql = "SELECT
					   clientes_detalle.id_detalle,
					   clientes_detalle.cant,
					   clientes_detalle.total_producto,
					   clientes_detalle.hora_producto,
					   clientes_detalle.fecha_producto,
						 clientes_detalle.descuento_producto,
				  	   db_tipo_producto.nombre_producto,
				  	   db_tipo_producto.id as idproducto
				  FROM clientes_detalle
				  INNER JOIN db_tipo_producto ON db_tipo_producto.id = clientes_detalle.id_producto
				 WHERE clientes_detalle.id_clientes = '$id' ";

		return $cn->SetEjecucionQuery($sql);
	}


	public function consultar_historial_cliente_detalle($id,$hoy){
		$cn = new conexion();
		$cn->conectar();

		$sql = "SELECT
					   clientes_detalle.id_detalle,
					   clientes_detalle.cant,
					   clientes_detalle.hora_producto,
					   clientes_detalle.total_producto,
					   clientes_detalle.descuento_producto,
					   clientes_detalle.fecha_producto,
				  	   db_tipo_producto.nombre_producto,
				  	   db_tipo_producto.id as idproducto
				  FROM clientes_detalle
				  INNER JOIN db_tipo_producto ON db_tipo_producto.id = clientes_detalle.id_producto
				 WHERE clientes_detalle.id_clientes = '$id'  AND clientes_detalle.fecha_producto = '$hoy'";

		return $cn->SetEjecucionQuery($sql);
	}


	public function consultar_historial_cliente($id){
		$cn = new conexion();
		$cn->conectar();
		$sql = "SELECT
		  			   db_tipo_pago.ID as tipopago,
				  	   db_tipo_pago.pago,
				  	   clientes.ID,
				  	   clientes.nombre,
				  	   clientes.fecha_clientes,
				  	   clientes.fecha_clientes_new,
				  	   clientes.hora,
				  	   clientes.estado,
				  	   clientes.pagado,
				  	   clientes.id_tipo_pago,
				  	   clientes.descuento_rutina,
				  	   clientes.rtn_baile,
				  	   clientes.rtn_maquinas,
				  	   clientes.precio_bm,
				  	   clientes.dias,
				  	   clientes.dinero_adelantado,
				  	   clientes.total_rutina,
				  	   clientes.cliente_estrella,
							 SUM(cliente_tantosdias.monto_adelanto) as cantDinero
				  FROM clientes
				  INNER JOIN db_tipo_pago ON db_tipo_pago.ID = clientes.id_tipo_pago
					INNER JOIN cliente_tantosdias ON cliente_tantosdias.id_cliente = clientes.ID
				 WHERE clientes.ID = '$id'  " ;

		return $cn->SetEjecucionQuery($sql);
	}
	/*
	*
	*
	*
	*
	*
	*/
	// ###########CONSULTA DE CUALES SON LOS PRODUCTOS MAS VENDIDOS ###########
		public function productos_mas_vendidos($hoy)
		{
			$cn = new conexion();
			$cn->conectar();
			$sql = "SELECT db_tipo_producto.nombre_producto,
						   clientes_detalle.id_producto,
						   SUM(clientes_detalle.cant) as cantidad
					FROM clientes_detalle
					INNER JOIN db_tipo_producto ON db_tipo_producto.id = clientes_detalle.id_producto
					INNER JOIN clientes ON clientes.ID = clientes_detalle.id_clientes
					WHERE clientes_detalle.fecha_producto = '$hoy' AND clientes.estado = 'si'
					GROUP BY id_producto HAVING COUNT(*) > 1 LIMIT 3" ;

			return $cn->SetEjecucionQuery($sql);
		}
	/*
	*
	*
	*
	*
	*
	*/
		########Consultar - Cliente - total #######
	public function consultar_reporte_hoy($hoy){
		$cn = new conexion();
		$cn->conectar();
		$sql = "SELECT
					 	db_tipo_pago.id as tipopago,
					  db_tipo_pago.pago,
						clientes.ID,
						clientes.nombre,
						clientes.fecha_clientes_new,
						clientes.hora,
						clientes.pagado,
						clientes.estado,
						clientes.rtn_baile,
						clientes.rtn_maquinas,
						clientes.cliente_estrella
				FROM clientes
				 INNER JOIN db_tipo_pago ON db_tipo_pago.ID = clientes.id_tipo_pago
				 WHERE  clientes.fecha_clientes_new = '$hoy' AND clientes.estado = 'si' ";

		return $cn->SetEjecucionQuery($sql);
	}
/*
 * 
 * 
 */
		########Consultar - Cliente - total - pagadp #######
		public function consultar_reporte_hoy_pagado($hoy){
			$cn = new conexion();
			$cn->conectar();
			$sql = "SELECT
							clientes_detalle.total_producto,
							clientes_detalle.descuento_producto,33333
							clientes.ID,
							clientes.nombre,
							clientes.fecha_clientes_new,
							clientes.hora,
							clientes.pagado,
							clientes.estado,
							clientes.dinero_adelantado,
							clientes.rtn_baile,
							clientes.rtn_maquinas
					FROM clientes
					 INNER JOIN clientes_detalle 
					 		ON clientes_detalle.id_clientes = clientes.ID
					 WHERE  clientes.fecha_clientes_new = '$hoy' 
							AND clientes.estado = 'si'
							AND clientes.pagado = 'si'
							AND clientes.cliente_estrella = 'no' ";
	
			return $cn->SetEjecucionQuery($sql);
		}
	
	//##################### OBTENER CANTIDAD DE CLIENTES TOTALES DE HOY ############################
	public function getCantClientes($hoy){
		$cn = new conexion();
		$cn->conectar();
		$sql = "SELECT COUNT(*) 
						FROM clientes 
						WHERE fecha_clientes_new = '$hoy'
					  AND estado = 'si'";
		return $cn->getEjecucionQuery($sql);
	}
	
	//##################### OBTENER CANTIDAD DE CLIENTES PAGADO DE HOY ############################
	public function getCantClientes_Pagados($hoy){
		$cn = new conexion();
		$cn->conectar();
		$sql = "SELECT COUNT(*) FROM clientes 
						WHERE fecha_clientes_new = '$hoy' 
									AND estado = 'si' 
									AND pagado = 'si'
									AND cliente_estrella = 'no' ";
		return $cn->getEjecucionQuery($sql);
	}	
	
	//##################### OBTENER CANTIDAD DE CLIENTES NO PAGADO DE HOY ############################
	public function getCantClientes_NoPagados($hoy){
		$cn = new conexion();
		$cn->conectar();
		$sql = "SELECT COUNT(*) FROM clientes 
						WHERE fecha_clientes_new = '$hoy' 
						AND estado = 'si' 
						AND pagado = 'no' 
						AND cliente_estrella = 'no' ";
		return $cn->getEjecucionQuery($sql);
	}
		
	//##################### OBTENER CANTIDAD DE CLIENTES NO PAGADO DE HOY ############################
		public function getCantClientes_estrellas($hoy){
			$cn = new conexion();
			$cn->conectar();
			$sql = "SELECT COUNT(*) FROM clientes 
							WHERE fecha_clientes_new = '$hoy' 
							AND estado = 'si' 
							AND cliente_estrella = 'si' ";
			return $cn->getEjecucionQuery($sql);
		}
	
	
	//##################### OBTENER CANT de PERSONAS diario  HOY ############################
	public function getCantDiaria($hoy){
		$cn = new conexion();
		$cn->conectar();
		$sql = "SELECT COUNT(*) 
						FROM clientes 
						WHERE id_tipo_pago = 1 
						AND fecha_clientes_new = '$hoy'
						AND estado = 'si'
						AND pagado = 'si'
						AND cliente_estrella = 'no' ";
		return $cn->getEjecucionQuery($sql);
	}

	//##################### OBTENER CANT PERSONAS SEMANAL  HOY############################
	public function getCantS($hoy){
		$cn = new conexion();
		$cn->conectar();
		$sql = "SELECT COUNT(*) 
						FROM clientes 
						WHERE id_tipo_pago = 2 
						AND fecha_clientes_new = '$hoy'
						AND estado = 'si'
						AND pagado = 'si'
						AND cliente_estrella = 'no' ";
		return $cn->getEjecucionQuery($sql);
	}
	//##################### OBTENER CANT PERSONAS QUINCENAL  HOY ############################
	public function getCantQ($hoy){
		$cn = new conexion();
		$cn->conectar();
		$sql = "SELECT COUNT(*) 
						FROM clientes 
						WHERE id_tipo_pago = 3 
						AND fecha_clientes_new = '$hoy'
						AND estado = 'si'
						AND pagado = 'si'
						AND cliente_estrella = 'no' ";
		return $cn->getEjecucionQuery($sql);
	}
	//##################### OBTENER CANT PERSONAS MENSUAL HOY  ############################
	public function getCantM($hoy){
		$cn = new conexion();
		$cn->conectar();
		$sql = "SELECT COUNT(*) 
						FROM clientes 
						WHERE id_tipo_pago = 4 
						AND fecha_clientes_new = '$hoy'
						AND estado = 'si'
						AND pagado = 'si'
						AND cliente_estrella = 'no' ";
		return $cn->getEjecucionQuery($sql);
	}
}


?>
