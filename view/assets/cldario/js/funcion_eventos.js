	RecolectarDatosGUI();
var NuevoEvento;
	$('#btn-guardar').click(function(){
		RecolectarDatosGUI();
		//$('#CalendarioWeb').fullCalendar('renderEvent', NuevoEvento);//recolecta informacion
		EnviarInformacion('agregar',NuevoEvento);
		console.log(NuevoEvento);
	});

	$('#btn-eliminar').click(function(){
		RecolectarDatosGUI();
		//$('#CalendarioWeb').fullCalendar('renderEvent', NuevoEvento);//recolecta informacion
		EnviarInformacion('eliminar',NuevoEvento);
	});


	$('#btn-modificar').click(function(){
		RecolectarDatosGUI();
		//$('#CalendarioWeb').fullCalendar('renderEvent', NuevoEvento);//recolecta informacion
		EnviarInformacion('modificar',NuevoEvento);
	});



	function RecolectarDatosGUI(){
		NuevoEvento = {
			id: $('#txtID').val(),
			title: $('#txtTitulo').val(),
			start: $('#txtFecha').val()+" "+$('#txtHora').val(),
			color: $('#txtColor').val(),
			descripcion: $('#txtDescripcion').val(),
			textColor: "#FFF",
			end: $('#txtFecha').val()+" "+$('#txtHora').val(),
			id_cliente: $('#id_cliente').val()
		};

		//console.log(NuevoEvento);
	}

function EnviarInformacion(accion,objEvento,modal){
	$.ajax({
		type: 'POST',
		url: '../../controller/calendar/eventos.php?accion='+accion,
		data:objEvento,
		success:function(msg){
			if(msg){
				    $('#CalendarioWeb').fullCalendar('refetchEvents');  //se actualiza en tiempo real
					if(!modal){//si es diferente al modal
						$("#show_calendar").modal('toggle');
					}

				   }

				  // console.log(msg);
		},
		error:function(){
			alert("Hay un error");
		}

	});

}
