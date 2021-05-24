  
function sendUser(id){
  $("#codigo").val(id);
  console.log(id);


	 $(document).ready(function() {
 		 var cod = $("#codigo").val();
	    console.log(cod);
	 	$.ajax({
	      url: '../controller/usuario/consultar_usuario.php',
	      type: 'POST',
	      data: {
	        id:cod
	        }
	    }).done(
	            function (respuestaServidor)
	            {
	             $('#usuario_consultar').html(respuestaServidor);
	            }         
	         );
	});

}
  
