<?php 

header('Content-Type: application/json');
$pdo = new PDO("mysql:dbname=system_gym;host:localhost","root","");

date_default_timezone_set('America/Lima');
$hoyDate = date('Y-m-d'); //Consulto la fecha de hoy
$hoyTime = date('H:m:s'); //Consulto la fecha de hoy

/* try {
	# Conexión a MySQL
	$pdo = new PDO("mysql:host=pdb22.runhosting.com;dbname=3658628_gym", "3658628_gym", "b37}^aJL8fHj1y)?");
  }
  catch(PDOException $e) {
	  echo $e->getMessage();
  } */
  

$accion = (isset($_GET['accion'])) ? $_GET['accion']:'leer';
switch($accion){
	case 'agregar':
				# Instruccion de agregado
				$sentenciaSQL = $pdo->prepare("INSERT INTO eventos(title,descripcion,color,textColor,start,end,id_cliente)VALUES(:title,:descripcion,:color,:textColor,:start,:end,:id_cliente)");
				$respuesta=$sentenciaSQL->execute(array(
					"title" => $_POST['title'],
					"descripcion" => $_POST['descripcion'],
					"color"=>$_POST['color'],
					"textColor"=>$_POST['textColor'],
					"start"=> $_POST['start'],
					"end"=> $_POST['end'],
					"id_cliente"=> $_POST['id_cliente']
					
				));
					echo json_encode($respuesta);

		break;
	case 'eliminar':
				$respuesta = false;
				if(isset($_POST['id'])){
					$sentenciaSQL = $pdo->prepare("DELETE FROM eventos WHERE id = :ID");
					$respuesta = $sentenciaSQL->execute(array("ID"=>$_POST['id']));
				}
				echo  json_encode($respuesta);
		break;
	case 'modificar':
				$sentenciaSQL = $pdo->prepare("UPDATE eventos SET 
					title = :title,
					descripcion = :descripcion,
					color = :color,
					textColor = :textColor,
					start = :start,
					end = :end
					WHERE id = :ID
					");

				$respuesta=$sentenciaSQL->execute(array(
					"ID" => $_POST['id'],
					"title" => $_POST['title'],
					"descripcion" => $_POST['descripcion'],
					"color"=>$_POST['color'],
					"textColor"=>$_POST['textColor'],
					"start"=> $_POST['start'],
					"end"=> $_POST['end']
					
				));
					echo json_encode($respuesta);
		break;

	default:
			$a = $_GET['cod'];
			//Seleccionar los eventos del calendario
			$sentenciaSQL = $pdo->prepare("SELECT * FROM eventos where id_cliente = :id");
			$sentenciaSQL->execute(array(":id"=>$a));
			//mostramos en un array que es FetchALL
			$resultado = $sentenciaSQL->fetchALL(PDO::FETCH_ASSOC);
			echo json_encode($resultado);
}




 ?>