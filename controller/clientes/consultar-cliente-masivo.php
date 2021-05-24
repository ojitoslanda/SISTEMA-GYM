<?php
 //Consultar clientes si existe en la base de datos para que el cajero no vuelva a registrar otra vez si en caso contrario no se encuentra registrado

require_once("../../model/clientes.php");
$obj=new cliente();
$resultado=$obj->consulta_masiva_cliente();
while($fila = $resultado -> fetch_array(MYSQLI_ASSOC))
{ 
     $arrayCliente[] = $fila; 
}
echo json_encode($arrayCliente);

$resultado->close(); // El script automáticamente liberará el resultado y cerrará la conexión

?>