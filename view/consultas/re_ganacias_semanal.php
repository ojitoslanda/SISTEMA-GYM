
<?php
date_default_timezone_set('America/Lima');
require_once('../model/reportes.php');
$cli = new Reportes();
$dias = 7;
if(!empty($_POST)){
	
if(isset($_POST['fecha']) && !empty($_POST['fecha'])){
		$fecha = $_POST['fecha'];
		$diasArrayss = array("domingo","lunes","martes","miércoles","jueves","viernes","sábado");


		/************************ INGRESOS ******************************* */
		//Consulto la una fecha exacta
		$resultado = $cli->consultar_ganancia_semanal_ingreso($fecha);
		while($fila=$resultado->fetch_array(MYSQLI_ASSOC))
		{
				//Calcular esa fecha exacta y sumar en 7 dias
				for ($i=0; $i  <  $dias ; $i++)
				{  
				$nuevafecha = strtotime ( "+ ". $i." day" , strtotime ( $fila['fecha']) );
				$nuevafecha = date ( 'Y-m-d' , $nuevafecha); //formatea nueva fecha completo. 			 
				// echo "<br>Fecha más {$i} dias : " . $nuevafecha ; //retorna valor de la fecha

				//Guardo en un array
				$datos[] = $nuevafecha;
			
				//Consulto las fechas de los 7 dias y lo suma todos sus ganancias
				$resultado_fechas_nuevas = $cli->consultar_ganancia_semanal_ingreso($nuevafecha);
				foreach($resultado_fechas_nuevas as $val){
				$datosG[] = $val['total'];
				}
				}
		}
		/*************************** EGRESOS ****************************** */
			$resultEgreso = $cli->consulta_egresos_fecha($fecha);
			while($filaEgreso = $resultEgreso->fetch_array(MYSQLI_ASSOC)){
				//echo "Egresos: " . $filaEgreso['fecha'];
				for($i = 0; $i < $dias; $i++){
					$nuevafechaEgreso = strtotime ( "+ ". $i." day" , strtotime ($filaEgreso['fecha'] ) );
					$nuevafechaEgreso = date ( 'Y-m-d' , $nuevafechaEgreso ); //formatea nueva fecha.
				//	echo "<br>Fecha màs {$i} dias EGRESOS : ",$nuevafechaEgreso;  //retorna valor de la fecha
					$datosEgresos[] = $nuevafechaEgreso;

						//Consulto las fechas de los 7 dias y lo suma todos sus ganancias
					$resultado = $cli->consultar_ganancia_semanal_egreso($nuevafechaEgreso);
					foreach ($resultado as $var){
						$datosEgresosTotal[] = $var['total'];
					}

				}
			}
	/********************************************************* */
	}else {
		//echo "No Existe y esta vacio";
		$datos= array("00/00/0000","00/00/0000","00/00/0000","00/00/0000","00/00/0000","00/00/0000","00/00/0000");
		$diasArrayss = array("Día","Día","Día","Día","Día","Día","Día");
		$datosG = array("0","0","0","0","0","0","0");

		$datosEgresos = array("00/00/0000","00/00/0000","00/00/0000","00/00/0000","00/00/0000","00/00/0000","00/00/0000");
		$datosEgresosTotal = array("000.00","000.00","000.00","000.00","000.00","000.00","000.00");
	}
}else{
	//echo "No Existe y esta vacio";
	$fecha = "00/00/0000";
	$datos= array("00/00/0000","00/00/0000","00/00/0000","00/00/0000","00/00/0000","00/00/0000","00/00/0000");
	$datosEgresosTotal = array("0","0","0","0","0","0","0");
	$diasArrayss = array("Día","Día","Día","Día","Día","Día","Día");
	$datosEgresos = array("00/00/0000","00/00/0000","00/00/0000","00/00/0000","00/00/0000","00/00/0000","00/00/0000");
	$datosG = array("0","0","0","0","0","0","0");
}
?>

<div class="container-fluid pt-4">
	<div class="row">
		<div class="col-md-3 mx-auto cmb-3">
			 <div class="card">
		      <div class="card-body">
						<form action="#" method="post">
		        <h5 class="card-title font-weight-light">Filtrar por fecha</h5>
		        <div class="input-group">
								<input type="date" name="fecha" class="form-control" required>
								<div class="input-group-prepend">
								 <input type="submit" class="btn btn-outline-danger" value="Buscar">
							  </div>
						</div>
						</form>
		      </div>
		    </div>
		</div>
<!--Ganancias Semanales INGRESOS-->
		<div class="col-md-12 reGananciasMensuales">
			<h5 class="font-weight-light">Ganancias Semanales <b>INGRESOS</b></h5>
			<table class="table table-bordered text-center">
					<tr>
							<?php 
							if(isset($datosG)){
								foreach ($datos as $val){
									$diaSemana= date('w', strtotime ( $val )); // Que dia de la semana estamos
									echo '<td> <strong>'.ucfirst($diasArrayss[$diaSemana]) ."</strong><br/>(".$val.")".'</td>';
								} 
							}else{
									echo '<th>Día <br/> Fecha</th>';
									echo '<th>Día <br/> Fecha</th>';
									echo '<th>Día <br/> Fecha</th>';
									echo '<th>Día <br/> Fecha</th>';
									echo '<th>Día <br/> Fecha</th>';
									echo '<th>Día <br/> Fecha</th>';
									echo '<th>Día <br/> Fecha</th>';
							}
							?>
									<th>TOTAL</th>
					</tr>
						<?php
							$sumIN = 0;
							if(isset($datosG)){
								echo '<tr>';
								$cont = count($datosG);
									#########################################################
										if($cont < 7){
													foreach ($datosG as $var) {
														echo '<td>S/.'.$var.'</td>';
														 $sumIN += $var;
													 }
													 for ($i= $cont; $i < 7  ; $i++) {
															echo '<td>S./0</td>';
													 }
											}

									#########################################################
											if($cont >= 7){
															foreach ($datosG as $var) {
					 										 echo '<td>S/.'.$var.'</td>';
					 										 $sumIN += $var;
					 									 }
												}
									#########################################################
								echo '<td rowspan="2" class"text-center"><input type="hidden" id="total_ingresos" value='.$sumIN.'><h2>'.$sumIN.'</h2></td>';
								echo '</tr>';
							}else{
										echo '<tr><td>S./0</td>';
										echo '<td>S./0</td>';
										echo '<td>S./0</td>';
										echo '<td>S./0</td>';
										echo '<td>S./0</td>';
										echo '<td>S./0</td>';
										echo '<td>S./0</td>';
							    	echo '<td rowspan="2" class"text-center"><input type="hidden" id="total_ingresos" value='.$sumIN.'><h2>'.$sumIN .'</h2></td></tr>';
							}
						 ?>
			</table>
		</div>
		<div class="container-fluid"><hr style="height:3px; border:none; color:rgb(60,90,180); background-color:rgb(60,90,180)"></div>
<!--Ganancias Semanales EGRESOS-->
		<div class="col-md-12 reGananciasMensuales">
			<h5 class="font-weight-light">Ganancias semanales <b>EGRESOS</b></h5>
			<table class="table table-bordered text-center">
				<thead>
					<tr>
						<?php
							if(isset($datosEgresos)){
									foreach ($datosEgresos as $val ) {
									$diaSemanaEgreso = date('w', strtotime ( $val )); // Que dia de la semana estamos
									echo '<td> <strong>'.ucfirst($diasArrayss[$diaSemanaEgreso]) ."</strong><br/>(".$val.")".'</td>';
									 }
							}else{
									echo '<th>Día <br/> Fecha</th>';
									echo '<th>Día <br/> Fecha</th>';
									echo '<th>Día <br/> Fecha</th>';
									echo '<th>Día <br/> Fecha</th>';
									echo '<th>Día <br/> Fecha</th>';
									echo '<th>Día <br/> Fecha</th>';
									echo '<th>Día <br/> Fecha</th>';
							}
						?>
								<th>TOTAL</th>
					</tr>
				</thead>
				<tbody>
						<tr>
							<?php
								 $sumE = 0;
								 if(isset($datosEgresosTotal)){
									foreach ($datosEgresosTotal as $var ) {
										if(!empty($var)){
										   echo '<td>S/.'.$var.'</td>';
										}else{
										   echo '<td>S/.0</td>';
										}
									   $sumE += $var;
								   }
								   echo '<td rowspan="2" class"text-center"><input type="hidden" id="total_egresos" value='.$sumE.'><h2>'.$sumE.'</h2></td>';
								 }else{
									echo '<tr><td>S./0</td>';
									echo '<td>S./0</td>';
									echo '<td>S./0</td>';
									echo '<td>S./0</td>';
									echo '<td>S./0</td>';
									echo '<td>S./0</td>';
									echo '<td>S./0</td>';
							    	echo '<td rowspan="2" class"text-center"><input type="hidden" id="total_egresos" value='.$sumE.'><h2>'.$sumE .'</h2></td></tr>';
								 }
							 ?>
						</tr>
					<tr>
							<?php
							 if(isset($datosEgresosTotal)){
								foreach ($datosEgresos as $val ) {
									echo "<td>
										  <button class='btn btn-outline-dark btn-sm' data-toggle='modal' data-target='#modalEgreso' onclick='reportListEgresos(".'"'.$val.'"'.")'>Ver lista</button>
										  </td>";
								}
							 }
							
							 ?>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="col-md-12 text-center font-weight-light">Ingreso - Egreso<h4 class="divResultado"></h4></div>
</div>
</div>



<!-- Modal -->
<div class="modal fade" id="modalEgreso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title font-weight-light" id="exampleModalLabel">LISTA DE EGRESO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<div class="container">
				<div class="row">
					<div class="col-md-12 table-responsive">
						<input type="hidden" id="date_egreso_today">
						<table id='tableEgresos' class='table text-center'>
							<thead>
								<tr>
									<th>Nombre</th>
									<th>Descripción</th>
									<th>Fecha</th>
									<th>Precio</th>
								</tr>
							</thead>
							<tbody id="egreso_lista_consultar"></tbody>
							<tfoot>
								<tr>
									<th>Nombre</th>
									<th>Descripción</th>
									<th>Fecha</th>
									<th>Precio</th>
								</tr>
							</tfoot>
						</table>	 								
					</div>
				</div>
			</div>
      </div>
    </div>
  </div>
</div>



