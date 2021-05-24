  
function send_delete_User(id){
  //defino o declaro
  $("#cod").val(id);
  console.log(id);
  //consulto
	$(document).ready(function() {
 		 var cod = $("#cod").val();
	    console.log(cod);
	 	$.ajax({
	      url: '../controller/usuario/consultar_usuario_delete.php',
	      type: 'POST',
	      data: {
	        id:cod
	        }
	    }).done(
	            function (respuestaServidor)
	            {
	             $('#user_delete').html(respuestaServidor);
	            }         
	         );
	});
}
  
