<?php
date_default_timezone_set('America/Lima');
require_once('../model/reportes.php');
$obj = new Reportes();
$consultaAll = $obj->consultarMembreciaSemanal();
while($k = $consultaAll -> fetch_array(MYSQLI_ASSOC))
{

  $clienteId = $k['ID'];
//------------------------------------------------------------------------
//######## FECHA PRIMERA MATRICULA ###########
  $result=$obj->consultarMembreciaMIN($clienteId);
  while($fila = $result -> fetch_array(MYSQLI_ASSOC))
  {
    $id = $fila['idc'];
    $nombre = $fila['cliente'];
    $fecha =  $fila['fecha'];
  }
  //Separo la fecha y la hora
  $var  = explode(" ",$fecha);
  $date = $var[0];

//------------------------------------------------------------------------
 //######## FECHA ULTIMA #############
 $resultado=$obj->consultarMembreciaMAX($clienteId);
 while($fila2 = $resultado -> fetch_array(MYSQLI_ASSOC)){ $fechaExpira =  $fila2['fecha']; }
 $varlast  = explode(" ",$fechaExpira);
 $dateExpira = $varlast[0];
//-----------------------------------------------------------------------
//variable 7 dias
$dias = 7;
//Algoritmo de cambiar fecha
$nuevafecha = strtotime ( "+ ". $dias ." day" , strtotime ( $date  ) );
$nuevafecha = date ( 'Y-m-d' , $nuevafecha ); //formatea nueva fecha.

//-----------------------------------------------------------------------

if($nuevafecha < $dateExpira){
  echo "<tr class='table-danger'>
        <td>
        <a href='../view/clientes/modificar-&-eliminar-cliente.php?cod=".$id."'>".$nombre."</a>
        </td>".
        "<td>".$date."</td>".
       "<td>".$nuevafecha."</td>
       <!-- <td>
          <input type='hidden' id='codcliente' disabled value='{$id}'>
          <button type='button' class='btn btn-danger btn-sm' id='delete'>X</button>
        </td> -->
       </tr>";

}elseif($nuevafecha == $dateExpira){
    echo "<tr class='table-warning'>
          <td>
          <a href='../view/clientes/modificar-&-eliminar-cliente.php?cod=".$id."'>".$nombre."</a>

          </td>".
          "<td>".$date."</td>".
         "<td>".$nuevafecha."</td>
         <!-- <td>
            <input type='hidden' id='codcliente' disabled value='{$id}'>
            <button type='button' class='btn btn-danger btn-sm' id='delete'>X</button>
          </td> -->
         </tr>";
}else{
  echo "<tr>
        <td>
          <a href='../view/clientes/modificar-&-eliminar-cliente.php?cod=".$id."'>".$nombre."</a>
        </td>".
       "<td>".$date."</td>".
       "<td>".$nuevafecha."</td>
       <!--  <td>
          <input type='hidden' id='codcliente' disabled value='{$id}'>
          <button type='button' class='btn btn-danger btn-sm' id='delete'>X</button>
        </td> -->
       </tr>";
}



}




 ?>
