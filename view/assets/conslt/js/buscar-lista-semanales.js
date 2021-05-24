$('.lunes').on("click", function(){
	EnviarInformacion(1);
});

$('.martes').on("click", function(){
	EnviarInformacion(2);
});

$('.miercoles').on("click", function(){
	EnviarInformacion(3);
});

$('.jueves').on("click", function(){
	EnviarInformacion(4);
});

$('.viernes').on("click", function(){
	EnviarInformacion(5);
});

$('.sabado').on("click", function(){
	EnviarInformacion(6);
});

$('.domingo').on("click", function(){
	EnviarInformacion(7);
});

/*
function EnviarInformacion(cod){
$.ajax({
 	url: '../controller/reportes/reportes-semanales.php',
 	type: 'POST',
 	data:{cod}
			 }).done(function(respuestaServidor)
			 			{
			 				  $('.shows').html(respuestaServidor);
			 			}

 		);
}
*/

function EnviarInformacion(cod){

	console.log(cod);
$.ajax({
 	url: '../controller/reportes/reportes-semanales.php',
 	type: 'POST',
 	data:{cod}
			 }).done(function(respuestaServidor)
			 			{
			 				  $('.shows').html(respuestaServidor);
			 			}

 		);
}