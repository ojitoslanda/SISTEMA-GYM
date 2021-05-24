<?php 
require_once('../../model/clientes.php');
$cli = new cliente();

if(isset($_POST['id'])){
	$cod = $_POST['id'];
	$val = $_POST['val'];
	switch ($val) {
		case 'si':
			$cli->update_clienteSinPagar($cod,"no");
			break;
		case 'no':
			$cli->update_clienteSinPagar($cod,"si");
			break;
		default:
			break;
	}
}

 ?>