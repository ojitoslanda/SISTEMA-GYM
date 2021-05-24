<?php 
require_once("../model/reportes.php");
if(!empty($_POST))//si el codigo tiene un valor a buscar
{
$nom = $_POST['nom'];
	if(isset($nom) && !empty($nom)){
//###############################################
?>
<table id="table1" class="table-hover display" style="width:100%">
	<thead>
	    <tr>
		<th>Historial</th>
		<th>Nombre</th>
		<th>Fecha</th>
		<th>Hora</th>
		<th>Rutina</th>
	    </tr>
	</thead>
	<tbody>
		<?php 
		$obj=new Reportes();
		$resultado=$obj->consultar_nom_cliente($nom);
		while ($fila=$resultado->fetch_array(MYSQLI_ASSOC))
			{ 
							$resultado2=$obj->get_tipo_Pago($fila['id_tipo_pago']);
							while ($fila2=$resultado2->fetch_array(MYSQLI_ASSOC)){
								$nombre_pago = $fila2['pago'];
							}
							 	echo "
			                           	<tr>
										<td class='text-center'>
										<a target='_black' href='../view/clientes/modificar-&-eliminar-cliente.php?cod=".$fila["ID"]."'>
										<i class='fa fa-id-card-o' style='font-size:30px;color:blue'></i>
										</a>
										</td>
			                           	<td>".$fila['nombre']."</td>
									  	<td>".$fila['fecha_clientes']."</td>
										<td>".$fila['hora']."</td>
										<td>".$nombre_pago."</td>
										</tr>
			                           	  ";
			                          
			  				 
			} 
		 ?>
	</tbody>
	<tfoot>
		<tr>
			<th>Historial</th>
			<th>Nombre</th>
			<th>Fecha</th>
			<th>Hora</th>
			<th>Rutina</th>
		</tr>
	</tfoot>
</table>
 <?php
//###############################################
	
	}else{
		echo "<center>DATOS NO ENCONTRADO</center>";
	}
}


 ?>