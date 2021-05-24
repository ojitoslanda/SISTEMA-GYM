<?php
date_default_timezone_set('America/Lima');
require_once("../model/reportes.php");
$hoy = date('Y-m-d'); //Consulto la fecha de hoy
$obj = new Reportes();
$resultado=$obj->consulta_egresos($hoy);
while($fila = $resultado -> fetch_array(MYSQLI_ASSOC))
{
  # code...
  echo '<tr>
  <td>'.$fila["nombre"].'</td>
  <td  width="25%">'.$fila['descripcion'].'</td>
  <td>'.$fila['fecha'].'</td>
  <td>'.$fila['costo_total'].'</td>
  <td>
  <input type="button" class="btn btn-danger" value="Eliminar" onclick="eliEgreso('.$fila["id"].')">
  <button type="button" class="btn btn-success" onclick="modEgreso('.$fila["id"].','."'".$fila['nombre']."'".','."'".$fila['descripcion']."'".','.$fila["costo_total"].');">Editar</button>
  </td>
  </tr>';

}
 ?>
