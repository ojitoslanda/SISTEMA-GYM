limpiar();




//INPUT SOLO NUMERO Y DECIAMLES Y COMAS 
$('.decimales').on('input', function () {
  this.value = this.value.replace(/[^0-9,.]/g, '').replace(/,/g, '.');
});


//Limpiar cajas
function limpiar(){
	$(".idproducto").val("");
	$(".nomproducto").val("");
	$(".costproducto").val("");
}


//Eliminar producto
function delete_producto(id){
//##########################
	swal({
		title: "¿Deseas eliminar el producto?",
		text: "Una vez eliminado, ya no se podrá recuperar la información.",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	})
	.then((willDelete) => {
		if (willDelete) {
		swal({
		  button: false,
		  icon: "success",
		});
		/*************************************/
		 $.ajax({
		 	url: '../controller/producto/eliminar_producto.php',
		 	type: 'POST',
		 	data:{
		 			cod:id
		 		 }
		 }).done(function(respuestaServidor){
					if(respuestaServidor == "Eliminado")
						{ location.reload(); }
					else{ console.log("No");}
		 		});
		/*************************************/
		}else{}
	});
//##########################

}


//Activamos la caja superior de "Modificar"
function modificar_producto(id,nombre,costo){
	//ponemos los datos respectivos
	$(".idproducto").val(id);
	$(".nomproducto").val(nombre);
	$(".costproducto").val(costo);
	//Habilitar el btnActualizar 
 	var btnmodificar = document.getElementById('btnModificar');
 	btnmodificar.disabled = false;

 	//Habilitar las cajas superiores
 	var panel_modificar = document.getElementById('panel_modificar'); 
 	panel_modificar.style.display = "";
}


//MODIFICAR EL PRODUCTO
document.getElementById("btnModificar").onclick = function(){
 	//declaramos los var de los input
	cod = $(".idproducto").val();
    nom = $(".nomproducto").val();
    cost = $(".costproducto").val();


		$.ajax({
	      url: '../controller/producto/modificar_producto.php',
	      type: 'POST',
	      data: {
	        id:cod,nombre:nom,costo:cost
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




document.getElementById("salir").onclick = function()
{
 	//Desabilitar las cajas superiores
 	var panel_modificar = document.getElementById('panel_modificar'); 
 	panel_modificar.style.display = "none";
 	limpiar();
};