
<?php

require_once('../../model/clientes.php');
require_once('../../model/tantosxdias.php');
date_default_timezone_set('America/Lima');
$hoy = date('Y-m-d'); //Consulto la fecha de hoy


$rutina =$_POST['rutina']; 
$precio =$_POST['precio']; 
$estrella = $_POST['estrella'];
$cod = $_POST['cod']; 
$nombre =$_POST['nombre'];
$cliente_pago =$_POST['cliente_pago'];
$descuento_rutina =$_POST['descuento_rutina'];
$activo = $_POST['activo'];
$baile_cliente = $_POST['baile_cliente'] == "true" ? "on" : "off";
$maquina_cliente = $_POST['maquina_cliente'] == "true" ? "on" : "off";
$costoAmbosBM = $_POST['costoAmbosBM'];
$CantTantoxDias = $_POST['cantTantoxDias'] ?? 0;
$MontoTantoxDias = $_POST['montoTantoxDias'] ?? 0;
$FechaActualizada_UltimoMonto = $_POST['fechaAdelantoM'];

echo "php_ID: ". $cod . "\n";
echo "php_Nombre: ". $nombre .  "\n";
echo "php_Rutina: ". $rutina .  "\n";
echo "php_Precio_Rutina: ". $precio .  "\n";
echo "php_Descuento_Rutina: ". $descuento_rutina .  "\n";
echo "php_Cliente-Estrella: ". $estrella .  "\n";
echo "php_cliente_pago: ". $cliente_pago .  "\n";
echo "php_Maquina: ". $maquina_cliente .  "\n";
echo "php_Baile: ". $baile_cliente . "\n";
echo "php_CostoAmbosBM: ". $costoAmbosBM . "\n";
echo "php_CantTantoxDias: ". $CantTantoxDias . "\n";
echo "php_MontoTantoxDias: ". $MontoTantoxDias . "\n";
echo "FechaActualizada_UltimoMonto: ". $FechaActualizada_UltimoMonto . "\n";
echo "Fecha de hoy: ". $hoy . "\n";

$cli = new cliente();
$tantosxdias = new TantoxDias();

if($rutina == 5){
	//echo "Es pago por dias";
if($estrella == "si"){
		if($cli->actualizar_cliente($cod,$nombre,$activo,"si",$rutina,0,$baile_cliente,$maquina_cliente,0,0,0,$precio,$estrella)){
		echo "Si";
		}else{ echo "No x1";	}
}else{
	if($cli->actualizar_cliente($cod,$nombre,$activo,$cliente_pago,$rutina,$descuento_rutina,$baile_cliente,$maquina_cliente,$costoAmbosBM,$CantTantoxDias,$MontoTantoxDias,$precio,$estrella)){
		if($hoy == $FechaActualizada_UltimoMonto)
		{
			echo "Las fechas son iguales";
			$tantosxdias->actualizar_cliente($cod,$MontoTantoxDias);
			$tantosxdias->update3($cod,$MontoTantoxDias,$FechaActualizada_UltimoMonto);
		}else{
			echo "Las fechas no son iguales";
			$tantosxdias->actualizar_cliente_new($cod,$MontoTantoxDias,$hoy);
			$tantosxdias->update4($cod,$MontoTantoxDias,$hoy);
		}
			echo "Si";
		}else{ echo "No x2" ; }
}

}else{
// 	echo "No es pago por dias";
	if($estrella == "si"){
			if($cli->actualizar_cliente($cod,$nombre,$activo,"si",$rutina,0,$baile_cliente,$maquina_cliente,0,0,0,$precio,$estrella)){
			echo "Si";
					
			}else{ echo "No x3";	}
	}else{
		if($cli->actualizar_cliente($cod,$nombre,$activo,$cliente_pago,$rutina,$descuento_rutina,$baile_cliente,$maquina_cliente,$costoAmbosBM,0,0,$precio,$estrella))
		{
			$tantosxdias->update2($cod,0);
			echo "Si";

		}else{ echo "No x4"; }
	}
}




?>