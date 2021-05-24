<?php
header('Content-Type: application/json');
$conexion = mysqli_connect("localhost", "root", "", "system_gym");

/* comprueba la conexión */
if (!$conexion) {
  echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
  echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
  echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
  exit;
}


$sql = "SELECT ID,nombre,fecha_clientes,id_tipo_pago FROM clientes WHERE cliente_estrella = 'no' ";
$result = mysqli_query($conexion, $sql);
while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
 $arrayCliente[] = $row; 
}
echo json_encode($arrayCliente);

// $listaClientes = "json/listaClientes.json";
// $data = json_encode($arrayCliente); 
// // Ojo, deberemos de tener creada la carpeta 'json'
// if ($fp = fopen($listaClientes, "w")){
//     fwrite($fp, $data);
// }
// fclose($fp);



mysqli_free_result($result); // El script automáticamente liberará el resultado y cerrará la conexión
mysqli_close($conexion); // a MySQL cuando finalice, aunque aquí lo vamos a hacer nostros mismos