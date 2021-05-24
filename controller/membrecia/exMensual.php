<?php
date_default_timezone_set('America/Lima');
require_once('../model/reportes.php');





$obj = new Reportes();
$consultaAll = $obj->consultarMembreciaMensual();
while($k = $consultaAll -> fetch_array(MYSQLI_ASSOC))
{

  $clienteId = $k['ID'];
 // print_r($k);
//------------------------------------------------------------------------
        //######## FECHA PRIMERA MATRICULA  ###########
  $result=$obj->consultarMembreciaMIN($clienteId);
  while($fila = $result -> fetch_array(MYSQLI_ASSOC))
  {
    $id = $fila['idc'];
    $nombre = $fila['cliente'];
    $fecha =  $fila['fecha'];
    //Separo la fecha y la hora
    $var  = explode(" ",$fecha);
    $date = $var[0];
    $year  = date('Y' , strtotime($date));
    $month = date('m' , strtotime($date));
    $day   = date('d' , strtotime($date));
   // echo "<br/>PRIMERA FECHA ".$year. "-" . $month . "-" . $day;
  }
  
//------------------------------------------------------------------------
            //######## FECHA ULTIMA #############
    $resultado=$obj->consultarMembreciaMAX($clienteId);
    while($fila2 = $resultado -> fetch_array(MYSQLI_ASSOC)){ $fechaExpira =  $fila2['fecha']; }
    $varlast  = explode(" ",$fechaExpira);
    $dateExpira = $varlast[0];
   // echo "<br/>ULTIMA FECHA ".$dateExpira;

//-----------------------------------------------------------------------
//Algoritmo de cambiar fecha +1mes
$dateMonth = mktime( 0, 0, 0, $month, $day, $year );
$nuevafecha = date("Y-m-d", strtotime('+1 month', $dateMonth));
//echo "<br/>fecha de vencimiento".date("Y-m-d", strtotime('+1 month', $dateMonth));


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
