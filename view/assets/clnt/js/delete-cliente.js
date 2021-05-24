$('#delete').on("click", function()
{
 var cod = $("#codcliente").val();
 $.ajax({
 	url: '../../controller/clientes/delete_datos_clientes.php',
 	type: 'POST',
 	data:{
 			id:cod
 		 }
 }).done(function(respuestaServidor)
 			{	
 			//	window.location = "../../view/cpanel-cliente";
			 location.reload();
 			}

 		);


});


function deletedetalle(id){

 $.ajax({
 	url: '../../controller/clientes/delete_datos_clientes.php',
 	type: 'POST',
 	data:{
 			idd:id
 		 }
 }).done(function(respuestaServidor)
 			{
 				location.reload();
 			}

 		);

}


