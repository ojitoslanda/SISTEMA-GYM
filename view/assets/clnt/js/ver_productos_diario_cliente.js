  
function sendIDUser(id,hoy){

  $("#codigo").val(id);
  $("#date_today").val(hoy);
  //console.log(id+" "+hoy);
	 $(document).ready(function() {
 		 var cod = $("#codigo").val();
 		 var date =  $("#date_today").val();
	  //  console.log(cod);
	 	$.ajax({
	      url: '../controller/clientes/modal/modal_ver_productos_cliente_diario.php',
	      type: 'POST',
	      data: {
	        id:cod,hoy:date
	        }
	    }).done(
	            function (respuestaServidor)
	            {
	             $('#usuario_consultar').html(respuestaServidor);
	            }         
	         );
	});
}
  
