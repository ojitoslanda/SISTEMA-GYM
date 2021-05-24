<?php 
require_once("../../model/tantosxdias.php");
date_default_timezone_set('America/Lima');
$hoy = date('Y-m-d'); //Consulto la fecha de hoy
$obj=new TantoxDias();   
$accion = (isset($_GET['accion'])) ? $_GET['accion']:'leer';

switch ($accion) {
  case 'save':
              $id = $_POST['idcode'];
              $monto = $_POST['monto'];
              $fecha = $_POST['fecha'];
              $idCliente = $_POST['id_cliente'];

          
              if($hoy == $fecha)
              {
                $obj->actualizar_cliente($idCliente,$monto);
                $obj->update($id,$monto);
              }else{
                $obj->update($id,$monto);
              }
    break;
  case 'delete':
              $idDelete = $_POST['id_code'];
              $cliente = $_POST['id_cliente'];
              $obj->actualizar_cliente($cliente,"0");
              $obj->update($idDelete,"0");
  break;
  default:
    # code...
    break;
}

?>