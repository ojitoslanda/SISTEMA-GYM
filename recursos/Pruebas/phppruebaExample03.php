<style>
*{margin: auto; padding: 0 , top: 0; margin-top: 30px; text-align: center;}
</style>
<form action="#" method="post">
      <label for="fecha">Fecha</label>
      <input type="date" name="fecha" >
      <input type="submit" value="Enviar">
</form>

<?php
date_default_timezone_set('America/Lima');
require_once('../../model/reportes.php');
$cli = new Reportes();
if(!empty($_POST)){
  if(isset($_POST['fecha']) && !empty($_POST['fecha'])){
      $fecha = $_POST['fecha'];
      $dias = 7;

      //Calcular el ingreso en 7 dias
      for ($i=0; $i  <  $dias ; $i++)
        {
          $nuevafecha = strtotime ( "+ ". $i." day" , strtotime ( $fecha ) );
          $nuevafecha = date ( 'Y-m-d' , $nuevafecha ); //formatea nueva fecha.
          //echo "<br>Fecha màs {$i} dias : ",$nuevafecha; //retorna valor de la fecha
          $datos[] = $nuevafecha;
          $diassiente =  $nuevafecha;
          #Consulta (fecha,costo_total) de la base de datos t_egresos
          $resultado = $cli->consultar_ganancia_semanal_ingreso($nuevafecha);
          foreach ($resultado as $var){
              $datosG[] = $var['total'];
          }
        }
      //Calcular el egreso en 7 dias
      for ($i=0; $i  <  $dias ; $i++)
        {
            $nuevafecha = strtotime ( "+ ". $i." day" , strtotime ( $fecha ) );
            $nuevafecha = date ( 'Y-m-d' , $nuevafecha ); //formatea nueva fecha.
            //echo "<br>Fecha màs {$i} dias : ",$nuevafecha; //retorna valor de la fecha
            $datosEgresos[] = $nuevafecha;
            $diassiente =  $nuevafecha;
            #Consulta (fecha,costo_total) de la base de datos t_egresos

            $result = $cli->consulta_egresos($nuevafecha);
            foreach ($result as $key){
                $datosEgresosNombre[] = $key['nombre'];
            }

            $resultado = $cli->consultar_ganancia_semanal_egreso($nuevafecha);
            foreach ($resultado as $var){
              $datosEgresosTotal[] = $var['total'];
            }

        }




}else {
  //echo "No Existe y esta vacio";
  $fecha = "00/00/0000";
  $diassiente =  "00/00/0000";
  $datos= array("00/00/0000","00/00/0000","00/00/0000","00/00/0000","00/00/0000","00/00/0000","00/00/0000");
  $datosEgresosTotal = array("000.00","000.00","000.00","000.00","000.00","000.00","000.00");
  $datosEgresos = array("00/00/0000","00/00/0000","00/00/0000","00/00/0000","00/00/0000","00/00/0000","00/00/0000");
  $datosG = array("000.00","000.00","000.00","000.00","000.00","000.00","000.00");
}


}else{
  //echo "No Existe y esta vacio";
  $fecha = "00/00/0000";
  $diassiente =  "00/00/0000";
  $datos= array("00/00/0000","00/00/0000","00/00/0000","00/00/0000","00/00/0000","00/00/0000","00/00/0000");
  $datosEgresosTotal = array("000.00","000.00","000.00","000.00","000.00","000.00","000.00");
  $datosEgresos = array("00/00/0000","00/00/0000","00/00/0000","00/00/0000","00/00/0000","00/00/0000","00/00/0000");
  $datosG = array("000.00","000.00","000.00","000.00","000.00","000.00","000.00");

}
 ?>



<h5>GANANCIA SEMANAL (INGRESOS)</h5>
<?php echo "<i> " . $fecha .  " al  ". $diassiente . "</i>" ?>
<table border="1">
  <tr>
    <th>Lunes</th>
    <th>Martes</th>
    <th>Miercoles</th>
    <th>Jueves</th>
    <th>Viernes</th>
    <th>Sabado</th>
    <th>Domingo</th>
    <td>Total</td>
  </tr>
  <tr>
    <?php
      $sum = 0;
      foreach ($datosG as $var ) {
        echo '<td>'.$var.'</td>';
        $sum += $var;
      }
      echo '<td rowspan="2">'.$sum.'</td>';
     ?>

  </tr>
  <tr>
      <?php
        foreach ($datos as $val ) {
          echo '<td>'.$val.'</td>';
        }
       ?>
  </tr>
</table>



<hr>


<h5>GANANCIA SEMANAL (EGRESOS)</h5>
<?php echo "<i> " . $fecha .  " al  ". $diassiente . "</i>" ?>
<table border="1">
  <tr>
    <th>Lunes</th>
    <th>Martes</th>
    <th>Miercoles</th>
    <th>Jueves</th>
    <th>Viernes</th>
    <th>Sabado</th>
    <th>Domingo</th>
    <td>Total</td>
  </tr>
  <tr>
    <?php
      $sum = 0;
      foreach ($datosEgresosTotal as $var ) {
        echo '<td>'.$var.'</td>';
        $sum += $var;
      }
      echo '<td rowspan="2">'.$sum.'</td>';
     ?>

  </tr>
  <tr>
      <?php
        foreach ($datosEgresos as $val ) {
          echo '<td>'.$val.'</td>';
        }
       ?>
  </tr>
</table>
<br>
