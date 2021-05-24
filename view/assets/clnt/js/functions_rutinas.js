document.getElementById("btnModificarRutina").onclick = function(){
	 	//declaramos los var de los input
		var cod = $(".idRutina").val();
		var cost = $(".costoRutina").val();
			 $.ajax({
			   url: '../controller/producto/modificar_rutina_all.php',
			   type: 'POST',
			   data: {
				 id:cod,costo:cost
				 }
			 }).done(
					 function (respuestaServidor)
					 {
						if(respuestaServidor == "Si")
						{
							 {
								 swal({
							   button: false,
							   icon: "success",
							 });
	 
								 location.reload();
							 }
						}else{
							 alert("Campos vacios o no la accion no completó")
						}
					 }         
				  );
}


document.getElementById("btnCloseUpdateRutina").onclick = function()
{	
	 //Desabilitar las cajas superiores
	console.log("de");
 	var panel_modificar = document.getElementById('panel_modificar_rutina'); 
 	panel_modificar.style.display = "none";
 	limpiar();
};
//INPUT SOLO NUMERO Y DECIAMLES Y COMAS 
$('.decimales_cr').on('input', function () {
	this.value = this.value.replace(/[^0-9,.]/g, '').replace(/,/g, '.');
  });

//Activamos la caja superior de "Modificar"
function modificar_rutina(id,nombre,costo){
	//ponemos los datos respectivos
    $(".idRutina").val(id);
	$(".nameRutina").val(nombre);
	$(".costoRutina").val(costo);
    
    //Habilitar el btnActualizar 
 	var btnmodificar = document.getElementById('btnModificarRutina');
 	btnmodificar.disabled = false;

 	//Habilitar las cajas superiores
 	var panel_modificar = document.getElementById('panel_modificar_rutina'); 
 	panel_modificar.style.display = "";
}

//Limpiar cajas
function limpiar(){
	$(".idRutina").val("");
	$(".nameRutina").val("");
	$(".costoRutina").val("");
}


