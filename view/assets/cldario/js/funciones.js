$(document).ready(function(){
	var codigo = $("#id_cliente").val();
			$('#CalendarioWeb').fullCalendar({
 				//-------------//
				header:{
					left: 'prev,today,next',
					center: 'title',
					right: 'month,agendaWeek,agendaDay'
				},
 				//-------------//
					events: 'http://localhost/GymSystem/controller/calendar/eventos.php?cod='+codigo,
				//-------------//
				dayClick: function(date,jsEvent,view){
					$('#btn-guardar').prop("disabled",false);
					$('#btn-modificar').prop("disabled",true);
					$('#btn-eliminar').prop("disabled",true);
					limpiarFormulario()
					$("#txtFecha").val(date.format());
					$("#show_calendar").modal(); //mostramos modal vacio
				},
				//-------------//
				eventClick:function(calEvent,jsEvent,view){
					$('#btn-guardar').prop("disabled",true);
					$('#btn-modificar').prop("disabled",false);
					$('#btn-eliminar').prop("disabled",false);
					//Titulo h2
				 	$('#TitleEvent').html(calEvent.title);
				 	//show event's information in inputs
				 	$('#txtID').val(calEvent.id);
				 	$('#txtDescripcion').val(calEvent.descripcion);
				 	$('#txtTitulo').val(calEvent.title);
				 	$('#txtColor').val(calEvent.color);
				 	FechaHora = calEvent.start._i.split(" ");
				 	$('#txtFecha').val(FechaHora[0]);
				 	$('#txtHora').val(FechaHora[1]);
					$("#show_calendar").modal(); //mostramos modal con datos
				 },

				 editable:true,
				 eventDrop:function(calEvent){
				 	$('#txtID').val(calEvent.id);
				 	$('#txtTitulo').val(calEvent.title);
				 	$('#txtColor').val(calEvent.color);
				 	$('#txtDescripcion').val(calEvent.descripcion);

				 	var FechaHora = calEvent.start.format().split("T");
				 	$('#txtFecha').val(FechaHora[0]);
				 	$('#txtHora').val(FechaHora[1]);


				 	RecolectarDatosGUI();
				 	EnviarInformacion('modificar',NuevoEvento,true);

				 }

				//-------------//

			});
		});


function limpiarFormulario(){
		$('#txtID').val('');
	 	$('#txtTitulo').val('X');
	 	$('#txtColor').val('#000000');
	 	$('#txtDescripcion').val('');
}
