<?php 

require_once("../../model/clientes.php");
$obj=new cliente();    //INVOCA A LA CLASE CLINTE


$variable_global_cliente_estrella = "no";

$nombre = $_POST['nombre'];
$fecha_cliente = $_POST['fecha'];
$hora_cliente = $_POST['hora'];
$tipo_pago = $_POST['tipo'];
$producto = $_POST['producto'] ?? 0;
$cant = $_POST['cant'] ?? 0;
$cost = $_POST['cost'] ?? 0;
$costoRutina = $_POST['costorutina'];
$costoProducto = $_POST['costoproducto'];
$totalRutinaBlMaqn = $_POST['totalRutina'];
$checkBaile = $_POST['checkBaile'] ?? "off";
$checkMaquina = $_POST['checkMaquina'] ?? "off";
$cst_bl_mqna = $_POST['cst_bl_mqna'];
$fecha_time = $fecha_cliente. " " . $hora_cliente;
$cliente_pagado = $_POST['estado_pagado'] ?? null;
$txtdescuentoRutina = $_POST['txtdescuentoRutina'];
$txtdescuentoProducto = $_POST['txtdescuentoProducto'];
$selectPrivilegios = $_POST['selectPrivilegios'] ?? null;
$tantos_dias = $_POST['txtTDias'] ?? null;
$monto_adelantado = $_POST['txtMontoxDias'] ?? null;

// echo "Nombre : ".$nombre.
// "<br> Fecha: ".$fecha_cliente.
// "<br>Hora: ".$hora_cliente.
// "<br/>Tipo de pago o Rutina: ".$tipo_pago.
// "<br/>Tipo de Producto: ".$producto.
// "<br/> Cant: ".$cant.
// "<br/>Costo: ".$cost;

// echo "<br/> ¿Baile?: ". $checkBaile;
// echo "<br/> ¿Maquina? : ". $checkMaquina;
// echo "<br/> Costo de Baile y Maquina: " . $cst_bl_mqna;
// echo "<br/>  ¿Cliente Pago?: " . $cliente_pagado;


// echo "<br/>Costo Rutina (Tipo De pago) : ".$costoRutina;
// echo "<br/>Costo Producto: ".$costoProducto;

// echo "<br/> Descuento en RUTINA : ".$txtdescuentoRutina;
// echo "<br/> DEscuento en Producto: ".$txtdescuentoProducto;

// echo "<br/> VENTA TOTAL " . $totalRutinaBlMaqn;

// echo "<br/> PRIVILEGIOS " . $selectPrivilegios;


// echo "<br/> ¿Cuántos días?  : " . $tantos_dias;
// echo "<br/> Monto Adelantado : " . $monto_adelantado;



switch ($selectPrivilegios) {
	case 'cliente_descuento':
		if($tipo_pago > 1)
		{
				if($obj->registrar_cliente($nombre,$fecha_cliente,$fecha_cliente,$hora_cliente,$cliente_pagado,$tipo_pago,$txtdescuentoRutina,$checkBaile,$checkMaquina,$cst_bl_mqna,$tantos_dias,$monto_adelantado,$costoRutina,"no"))
				{	
					$last_id_cliente=$obj->last_id_cliente();
					$id_cliente = mysqli_fetch_assoc($last_id_cliente);
					$idCli = $id_cliente['last_id'];

					$obj->registrar_cliente_tantos_dias($idCli,$monto_adelantado,$fecha_cliente);
					$obj->registrar_cliente_eventos("X","","#000000","#FFF",$fecha_time,$fecha_time,$idCli);

					if($obj->registrar_cliente_detalle($idCli,$producto,$cant,$fecha_cliente,$hora_cliente,$costoProducto,$txtdescuentoProducto)){
						$ruta="Location: ../../view/cpanel-cliente";
						echo "Si x1";
					}else{
						$ruta="Location: ../../view/cpanel-cliente";
						echo "Si x2";

					}
				}else{
					$ruta="Location: ../../view/cpanel-cliente";
						echo "Si x3";
				}
				 header($ruta);
		}
		else
		{
			if($obj->registrar_cliente($nombre,$fecha_cliente,$fecha_cliente,$hora_cliente,$cliente_pagado,$tipo_pago,$txtdescuentoRutina,$checkBaile,$checkMaquina,$cst_bl_mqna,$tantos_dias,$monto_adelantado,$costoRutina,"no"))
			{	
						$last_id_cliente=$obj->last_id_cliente();
						$id_cliente = mysqli_fetch_assoc($last_id_cliente);

						$idCli = $id_cliente['last_id'];

						if($obj->registrar_cliente_detalle($idCli,$producto,$cant,$fecha_cliente,$hora_cliente,$costoProducto,$txtdescuentoProducto))
						{
							$ruta="Location: ../../view/cpanel-cliente";
							echo "Si x4";
						}else{
							$ruta="Location: ../../view/cpanel-cliente";
							echo "Si x5";
						}
			}else{
				$ruta="Location: ../../view/cpanel-cliente";
				echo "Si x6";

			}
				header($ruta);
		}
					
		break;
	case 'cliente_estrella':
				$clientes_estrellas = "si";
				$clientes_estrellas_pagado = "si";
				$clientes_diario = 1; //Los clientes estrellas por defecto se van a tipo de pago DIARIO
				if($obj->registrar_cliente($nombre,$fecha_cliente,$fecha_cliente,$hora_cliente,$clientes_estrellas_pagado,	$clientes_diario,$txtdescuentoRutina,$checkBaile,$checkMaquina,$cst_bl_mqna,$tantos_dias,$monto_adelantado,$costoRutina,$clientes_estrellas))
				{	
					$ruta="Location: ../../view/cpanel-cliente";
					echo "Si x7";
				}else{
					$ruta="Location: ../../view/cpanel-cliente";
					echo "Si x8";
				}
				header($ruta);
		break;
	default:
			
/******************************************************** */
if($tipo_pago > 1 )
{
	if(empty($cant) || $cant == 0)
	{

			if($obj->registrar_cliente($nombre,$fecha_cliente,$fecha_cliente,$hora_cliente,$cliente_pagado,$tipo_pago,$txtdescuentoRutina,$checkBaile,$checkMaquina,$cst_bl_mqna,$tantos_dias,$monto_adelantado,$costoRutina,"no"))
			{	
				$last_id_cliente=$obj->last_id_cliente();
				$id_cliente = mysqli_fetch_assoc($last_id_cliente);
				$idCli = $id_cliente['last_id'];
				$obj->registrar_cliente_tantos_dias($idCli,$monto_adelantado,$fecha_cliente);
				$obj->registrar_cliente_eventos("X","","#000000","#FFF",$fecha_time,$fecha_time,$idCli);

				$ruta="Location: ../../view/cpanel-cliente";
				echo "Si x9";
			}else{
				$ruta="Location: ../../view/cpanel-cliente";
				echo "Si x10";

			}
				header($ruta);
	}else
	{		

		if($obj->registrar_cliente($nombre,$fecha_cliente,$fecha_cliente,$hora_cliente,$cliente_pagado,$tipo_pago,$txtdescuentoRutina,$checkBaile,$checkMaquina,$cst_bl_mqna,$tantos_dias,$monto_adelantado,$costoRutina,"no"))
				{	
							$last_id_cliente=$obj->last_id_cliente();
							$id_cliente = mysqli_fetch_assoc($last_id_cliente);
							$idCli = $id_cliente['last_id'];
							$obj->registrar_cliente_tantos_dias($idCli,$monto_adelantado,$fecha_cliente);
							$obj->registrar_cliente_eventos("X","","#000000","#FFF",$fecha_time,$fecha_time,$idCli);
							if($obj->registrar_cliente_detalle($idCli,$producto,$cant,$fecha_cliente,$hora_cliente,$costoProducto,$txtdescuentoProducto)){
								$ruta="Location: ../../view/cpanel-cliente";
								echo "Si x11";
							}else{
								$ruta="Location: ../../view/cpanel-cliente";
								echo "Si x12";
							}
				}else{
								$ruta="Location: ../../view/cpanel-cliente";
								echo "Si x13";
				}
				header($ruta);
	}

}else
{

	if(empty($cant) || $cant == 0)
	{

			if($obj->registrar_cliente($nombre,$fecha_cliente,$fecha_cliente,$hora_cliente,$cliente_pagado,$tipo_pago,$txtdescuentoRutina,$checkBaile,$checkMaquina,$cst_bl_mqna,$tantos_dias,$monto_adelantado,$costoRutina,"no"))
			{	
				$ruta="Location: ../../view/cpanel-cliente";
				echo "Si x14";
			}else{
				$ruta="Location: ../../view/cpanel-cliente";
				echo "Si x15";
			}
				header($ruta);
	}else
	{	
		if($obj->registrar_cliente($nombre,$fecha_cliente,$fecha_cliente,$hora_cliente,$cliente_pagado,$tipo_pago,$txtdescuentoRutina,$checkBaile,$checkMaquina,$cst_bl_mqna,$tantos_dias,$monto_adelantado,$costoRutina,"no"))
		{	
							//echo "<br/>Yesx1";
						$last_id_cliente=$obj->last_id_cliente();
						$id_cliente = mysqli_fetch_assoc($last_id_cliente);

						$idCli = $id_cliente['last_id'];
						if($obj->registrar_cliente_detalle($idCli,$producto,$cant,$fecha_cliente,$hora_cliente,$costoProducto,$txtdescuentoProducto)){
							$ruta="Location: ../../view/cpanel-cliente";
							echo "Si x16";
						}else{
							$ruta="Location: ../../view/cpanel-cliente";
							echo "Si x17";
						}
						
			}else{
					$ruta="Location: ../../view/cpanel-cliente";
					echo "Si x18";
			}
				header($ruta);
	}
}
/********************************************************* */
		break;
}



