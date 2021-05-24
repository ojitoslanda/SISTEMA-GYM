i = 0
$(document).ready(function() {
	
for (i; i < 8; i++) {
	console.log(i);
	 	$.ajax({
	      url: '../controller/ganancia/reporte_semanal.php',
	      type: 'POST',
	      data: {
	        id:i
	        }
	    }).done(
	            function (respuestaServidor)
	            {
	             //$("#" + (i+1) + "").html(respuestaServidor);
	            $("#" + (i+1) + "").val(respuestaServidor);
	           	 console.log(respuestaServidor);
	            }         
	         );


	   }

});


