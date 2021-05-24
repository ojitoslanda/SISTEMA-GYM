
  let resultado = 0;
      egreso= 0;
      ingreso= 0;
      restar= 0;
  

function funcion_data(){
 var divResultado = document.querySelector(".divResultado");
  egreso = $("#total_egresos").val();
  ingreso = $("#total_ingresos").val();
  restar = parseFloat(ingreso) - parseFloat(egreso);
  if(!isNaN(restar)){
  divResultado.innerText = restar;
  }
}


//DETECTAR SI ES UN CELULAR 
  if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
   // console.log('Esto es un dispositivo móvil');

    //Menú
    let Deletesidenavtoggled = document.querySelector('#page-top');
    Deletesidenavtoggled.classList.remove('sidenav-toggled');

    //Registro de Cliente

    
 }

 
let miFormulario = document.querySelector('#RegistroFormularioCpanelCliente');

window.addEventListener("load", function() {
  if(miFormulario != null ){
    miFormulario.cant.addEventListener("keypress", soloNumeros, false);
  }
  });
//Solo permite introducir numeros.
function soloNumeros(e){
    var key = window.event ? e.which : e.keyCode;
    if (key < 48 || key > 57) {
      e.preventDefault();
    }
  }





    
function reportListEgresos(fecha){
  $("#date_egreso_today").val(fecha);
	 $(document).ready(function() {
 		 let date =  $("#date_egreso_today").val();
	 	$.ajax({
	      url: '../controller/clientes/modal/modar_ver_lista_egresos_semanal.php',
	      type: 'POST',
	      data: { hoy:date }
	    }).done(
	            function (respuestaServidor)
	            {
               $('#egreso_lista_consultar').html(respuestaServidor);
	            }         
	         );
  }); 
}
  

//############## Input . cliente . consultar si el cliente existe ##############//
let inputNombreCliente = document.querySelector('#nombre_cliente');
let inputCaptarCliente = document.querySelector('#captarIDCliente');
let inputFechaCliente = document.querySelector('#fechaCliente');
let inputHoraCliente = document.querySelector('#horaCliente');
let inputTxtTantosDias = document.querySelector('#txtTantoxDias');
let inputTxtMontoxDias = document.querySelector('#txtMontoxDias');
let mensajePagoAnterior = document.querySelector('#mensajePagoAnterior');

let divContainerdivTantosDias = document.querySelector('#divTantosDias');
let divContainerRutina_y_Rutinas_y_Cant = document.querySelector('#divContainerRutina_y_Rutinas_y_Cant');
let divContainerPrivilegios = document.querySelector('#divContainerPrivilegios');
let ContainerPrivilegios = document.querySelector('#containerselectPrivilegios');
let select_rutina = document.querySelector('#select1');
let select_estadoPago = document.querySelector('#selectEstadoPago');
let btnNewCliente = document.querySelector('.newCliente');
let btnOldCliente = document.querySelector('.oldCliente');

$('.my-flexdatalist').flexdatalist({
  searchContain: false,
  minLength: 1,
  valueProperty: 'ID',
  searchIn: 'nombre',
  textProperty: 'nombre',
  visibleProperties: ["nombre","pago"],
  url: '../controller/clientes/consultar-cliente-masivo.php'
}).on('change:flexdatalist', function(event, set, options){

    divContainerRutina_y_Rutinas_y_Cant.style.display = "";
    divContainerPrivilegios.style.display = "";
    inputCaptarCliente.value =  0;
    inputTxtTantosDias.value = 0;
    inputTxtTantosDias.disabled = false;
    ContainerPrivilegios.style.display = ""
    divContainerdivTantosDias.style.display = "none";
    select_rutina.disabled = false;
    select_estadoPago.disabled = false;
    btnNewCliente.style.display = "";
    btnOldCliente.style.display = "none";
    mensajePagoAnterior.innerHTML =``;
}).on('select:flexdatalist', function(key, value){  
    console.log(value);
    if(value.tipopago == 5){

      document.getElementById("txtMontoxDias").addEventListener("keyup",  function (e) { 
            let obtenerMontoDias = inputTxtMontoxDias.value;
            document.getElementById('resultado').value = obtenerMontoDias;
      });
       divContainerdivTantosDias.style.display = "";
    }
    
    mensajePagoAnterior.innerHTML =`Historial del cliente 
    <a href="clientes/modificar-&-eliminar-cliente.php?cod=${value.ID}"  target="_blank" >ingrese aqui</a>`;

    divContainerRutina_y_Rutinas_y_Cant.style.display = "none";
    divContainerPrivilegios.style.display = "";
    inputCaptarCliente.value = inputNombreCliente.value
    inputTxtTantosDias.disabled = true;
    inputTxtTantosDias.value = value.dias;
    ContainerPrivilegios.style.display = "none"
    select_rutina.disabled = true;
    select_estadoPago.disabled = true;
    btnNewCliente.style.display = "none";
    btnOldCliente.style.display = "";
});

//Registramos los datos del cliente existente
btnOldCliente.addEventListener('click', () => {
  //console.log(inputCaptarCliente.value);
  let inputCaptarIDCliente = inputCaptarCliente.value;
  let inputCaptarFechaCliente = inputFechaCliente.value;
  let inputCaptarHoraCliente= inputHoraCliente.value;
  let inputCaptarTxtMontoxDias = inputTxtMontoxDias.value;
  $.ajax({
    url: '../controller/clientes/update-cliente-masivo.php',
    type: 'POST',
    data: { 
            idCode:inputCaptarIDCliente, 
            fechaCliente:inputCaptarFechaCliente,
            horaCliente:inputCaptarHoraCliente,
            monto: inputCaptarTxtMontoxDias
          }
  }).done(
          function (respuestaServidor)
          {
              console.log(respuestaServidor);
              location.reload();
          }         
  );
});





funcion_data();