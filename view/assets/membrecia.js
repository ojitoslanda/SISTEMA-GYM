$(document).ready(function() {
    $('#exSemanal').DataTable();
    $('#exQuincenal').DataTable();
    $('#exMensual').DataTable();
} );


$('#deleteQ').on("click", function()
{
 var cod = $("#codcliente").val();
 $.ajax({
 	url: '../controller/clientes/delete_datos_clientes.php',
 	type: 'POST',
 	data:{
 			id:cod
 		 }
 }).done(function(respuestaServidor)
 			{
 			 window.location.href ="cpanel";
 			}

 		);
});


$('#delete').on("click", function()
{
 var cod = $("#codcliente").val();
 $.ajax({
 	url: '../controller/clientes/delete_datos_clientes.php',
 	type: 'POST',
 	data:{
 			id:cod
 		 }
 }).done(function(respuestaServidor)
 			{
 			 window.location.href ="cpanel";
 			}

 		);
});
