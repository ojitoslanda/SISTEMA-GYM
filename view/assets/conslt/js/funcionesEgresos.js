

function modEgreso(id,nom,descr,cost) {
  //ponemos los datos respectivos
  $(".cod").val(id);
  $(".nombre").val(nom);
  $(".descripcion").val(descr);
  $(".costot").val(cost);
    //Habilitar las cajas superiores
    var panel_modificar = document.getElementById('panel_egresos');
    panel_modificar.style.display = "";
    //console.log(id + " -- " + nom + " -- " + descr + " -- " + cost)
}

function limpiar(){
  $(".cod").val("");
  $(".nombre").val("");
  $(".descripcion").val("");
  $(".costot").val("");
}

//INPUT SOLO NUMERO Y DECIAMLES
$('.decimales').on('input', function () {
  this.value = this.value.replace(/[^0-9,.]/g, '').replace(/,/g, '.');
});


function myFunctionCancelar() {
   	//Desabilitar las cajas superiores
 	//var panel_modificar = document.getElementById('panel_egresos');
 	//panel_modificar.style.display = "none";
  limpiar();
}



function eliEgreso(id){
//##########################
	swal({
		title: "¿Deseas eliminar?",
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
		 	url: '../controller/reportes/egresos_eliminar.php',
		 	type: 'POST',
		 	data:{cod:id}
		    }).done(function(respuestaServidor){
          if(respuestaServidor == "Si"){
            location.reload();
          }else{
            location.reload();
          }
		 		});
		/*************************************/
		}else{}
	});
//##########################
}


function myFunctionModificar(){
  //declaramos los var de los input
  cod =   $(".cod").val();
  nom =  $(".nombre").val();
  descr =$(".descripcion").val();
  cost =  $(".costot").val();


  $.ajax({
      url: '../controller/reportes/egresos_modificar.php',
      type: 'POST',
      data: {
        id:cod,nombre:nom,descr:descr,cost:cost
        }
    }).done(
            function (respuestaServidor)
            {
                console.log(respuestaServidor);
                if(respuestaServidor == "Si")
                {
                   location.reload();
                }else{
                   location.reload();
                }
            }
         );
}
