<?php
require_once("../../model/reportes.php");
if(isset($_POST['cod'])){
  $obj= new Reportes();
  $codigo = $_POST['cod'];
  $obj->eliminar_egresos($codigo);
}
