//INPUT SOLO NUMERO Y DECIAMLES Y COMAS 
$('.decimalesInput').on('input', function () {
  this.value = this.value.replace(/[^0-9,.]/g, '').replace(/,/g, '.');
});



$(function(){
sumar_total_productos_soles_hoy();
sumar_total_productos_soles_todo();
checkMB();
});




  function sum()
  {
     //capto el ID
     let innetHtmlDescuentoDetalle = document.querySelector('.resultadoDescuentoTotal');
     let inputDescuentoDetalle = document.querySelector("#inputDescuentoDetalle");
     let valorInputDescuentoDetalle = inputDescuentoDetalle.value;

     let resultado = 0;
     var seleccion=document.getElementById('selectA');
     var costo_del_producto = seleccion.options[seleccion.selectedIndex].text;
     var  a =  seleccion.options[seleccion.selectedIndex].value;


     var dcant = document.getElementById("nCant");
     var cant = document.getElementById("nCant").value;
         if(a > 0)
         {
         	dcant.disabled=false;
           if(cant >= 1)
           {
            inputDescuentoDetalle.disabled = false;
         		costo_del_producto *=  cant;  //Multiplicamos cant * costo_producto
            // console.log("COSTO TOTAL DEL PRODUCTO " + costo_del_producto);
            document.getElementById("resultado").value = costo_del_producto; 		//Mostramos el total 

            if(inputDescuentoDetalle.length !== "")
            { 
              resultado = parseFloat(costo_del_producto) - parseFloat(valorInputDescuentoDetalle);
              innetHtmlDescuentoDetalle.innerHTML = "Resultado: "+ resultado;
              console.log(resultado);
            }else{
              innetHtmlDescuentoDetalle.innerHTML = "";
              console.log(costo_del_producto);
            }

           }else{
           document.getElementById("resultado").value = 0;
           inputDescuentoDetalle.disabled = true;
           }
           
         }else{
                document.getElementById("resultado").value = 0;
                document.getElementById("nCant").value = 0;
                dcant.disabled=true;
         }

}


function btnchange()
{
  var valor = document.getElementById('btn_m_a');
  var ncliente = document.getElementById("nombre_cliente");
  var trutina = document.getElementById("tip_rutina");
  var tclienteActivo = document.getElementById("cliente_eliminado");
  let selectcliente_estrella = document.getElementById("cliente_estrella");
  let inputcostoAmbosBM = document.getElementById("costoAmbosBM");
  let selectcliente_pagado = document.getElementById("cliente_pagado");
  let inputdescuento_rutina = document.getElementById("descuento_rutina");


  id_cliente = $("#codcliente").val();
  nombre_cliente = $("#nombre_cliente").val();
  rutina_cliente = $("#tip_rutina").val();
  descuento_rutina = $('#descuento_rutina').val();
  cliente_estrella = $("#cliente_estrella").val();
  costo_rutina = trutina[trutina.selectedIndex].text;
  cliente_activo = $("#cliente_eliminado").val();
  cliente_pago = $("#cliente_pagado").val();
  baile_cliente =  document.getElementById("checkBaile").checked;
  maquina_cliente = document.getElementById("checkMaquina").checked;
  costoAmbosBM = $("#costoAmbosBM").val();
  fecha_actualizadaMontoAdelanto = $("#fecha_actualizadaMA").val();
  var CantTantoxDias = document.getElementById("cantTantoDias"); 
  var MontoTantoxDias = document.getElementById("MontoTantoDias"); 
  let valorMonto,valordias;
  if(CantTantoxDias !== null && MontoTantoxDias !== null){
       valorMonto = MontoTantoxDias.value;
       valordias =  CantTantoxDias.value;
  }

  // console.log( 
  //             "ID : " +   id_cliente + "\n" + 
  //             "Nombre_cliente : " + nombre_cliente + "\n" +  
  //             "Cliente activo : " + cliente_activo + "\n" +  
  //             "Rutina : " + rutina_cliente + "\n" + 
  //             "Costo : " + costo_rutina + "\n" + 
  //             "Cliente Estrella : " + cliente_estrella + "\n" + 
  //             "Baile : " + baile_cliente + "\n" + 
  //             "Maquina: "+ maquina_cliente + "\n" +
  //             "Costo Maquina + Baile: "+ costoAmbosBM);
  if(valor.textContent == 'ACTUALIZAR CLIENTE')
  {
    swal({
    title: "¿Deseas modificar los datos?",
    buttons: true,
    dangerMode: true,
    })
    .then((willDelete)=>{
            if (willDelete)
            {

                swal({
                  icon: "success",
                  buttons: false,
                });

                   /*************************************/
                     $.ajax({
                        url: '../../controller/clientes/actualizar_datos_cliente.php',
                        type: 'POST',
                        data:{
                                nombre:nombre_cliente, 
                                activo:cliente_activo,
                                cliente_pago:cliente_pago,
                                descuento_rutina:descuento_rutina,
                                rutina:rutina_cliente,
                                precio:costo_rutina,
                                estrella:cliente_estrella,
                                baile_cliente:baile_cliente,
                                maquina_cliente:maquina_cliente,
                                costoAmbosBM:costoAmbosBM,
                                cantTantoxDias:valordias,
                                montoTantoxDias:valorMonto,
                                fechaAdelantoM:fecha_actualizadaMontoAdelanto,
                                cod:id_cliente
                             }
                     }).done(function(respuestaServidor){
                                //console.log(respuestaServidor);
                                if(respuestaServidor == "Si")
                                    { location.reload(); }
                                else{location.reload(); }
                            });
                /*************************************/ 
                  ncliente.disabled=true;
                  trutina.disabled=true;
                  tclienteActivo.disabled=true;
                  valor.textContent = 'MODIFICAR CLIENTE';
                  //location.reload();
            }else
            {
                location.reload();
            }

    });

  }else{
    ncliente.disabled=false;
    trutina.disabled=false;
    tclienteActivo.disabled=false;
    selectcliente_estrella.disabled = false;
    inputcostoAmbosBM.disabled = false;
    selectcliente_pagado.disabled = false;
    inputdescuento_rutina.disabled = false;

    if(CantTantoxDias !== null && MontoTantoxDias !== null){
      MontoTantoxDias.disabled = false;
      CantTantoxDias.disabled = false;
    }
 
    valor.textContent = 'ACTUALIZAR CLIENTE';
  }

}
  

function sumar_total_productos_soles_hoy(){
  var a = document.querySelectorAll(".sumt");
  var suma = 0;
  for (var i = 0; a.length > i; i++) {
    suma += parseFloat(a[i].value);
  }
  $("#sumaResultado").html(suma);
  document.getElementById("calcularProductos").value = suma;

}

function sumar_total_productos_soles_todo(){
    var a = document.querySelectorAll(".sumt2");
    var suma = 0;
    for (var i = 0; a.length > i; i++) {
      suma += parseFloat(a[i].value);
    }
    $("#sumaResultado2").html(suma);
}


function checkMB()
{
  let checkBaile = document.querySelector('#checkBaile');
  let checkMaquina = document.querySelector('#checkMaquina');
  let inputcostoAmbosBM = document.querySelector('#costoAmbosBM');
  let inputcostoAmbosBM_2 = document.querySelector('#costoAmbosBMTest').value;
  if(checkBaile.checked == true && checkMaquina.checked == true)
  {
      document.getElementById('divCstAmbos_Bln_Maqnas').style.display = ""
      inputcostoAmbosBM.value = inputcostoAmbosBM_2;
  }else{
      document.getElementById('divCstAmbos_Bln_Maqnas').style.display = "none"
      inputcostoAmbosBM.value = "0";
  }
}



 
$(document).ready(function(){
//#########################################
  var calcularRutina = document.getElementById('calcularPrecioRutina').value;
  var calcularDescuentoRutina = document.getElementById('calcularDescuentoRutina').value;
  var calcularBM=document.getElementById('calcularBaileyMaquina').value;
  let calcularmontoAdelanto = document.getElementById('CalcularmontoAdelanTantoxDias').value;
  let calcularProducto;
  var resultadoTotal = 0;
  let diario_tab = $("#sumaResultado").html();
  let todo_tab = $("#sumaResultado2").html();

  $(".nav-tabs a").click(function(){
    switch (this.id) {
      case "todo-tab":
            document.getElementById("calcularProductos").value = todo_tab;
            calcularProducto = document.getElementById('calcularProductos').value;

            resultadoTotal = parseFloat(calcularRutina) - parseFloat(calcularDescuentoRutina) + parseFloat(calcularBM)  + parseFloat(calcularProducto) - parseFloat(calcularmontoAdelanto);

            document.getElementById("resultado_total").value = resultadoTotal;

        break;
      case "diario-tab":
            document.getElementById("calcularProductos").value = diario_tab;
            calcularProducto=document.getElementById('calcularProductos').value;

            resultadoTotal = parseFloat(calcularRutina) - parseFloat(calcularDescuentoRutina) + parseFloat(calcularBM)  + parseFloat(calcularProducto) - parseFloat(calcularmontoAdelanto);
            
            document.getElementById("resultado_total").value = resultadoTotal;

        break;
      default:
        break;
    }
  });

  document.getElementById("calcularProductos").value = diario_tab;
  calcularProducto=document.getElementById('calcularProductos').value;
  resultadoTotal = parseFloat(calcularRutina) - parseFloat(calcularDescuentoRutina) + parseFloat(calcularBM)  + parseFloat(calcularProducto) - parseFloat(calcularmontoAdelanto);   
  document.getElementById("resultado_total").value = resultadoTotal;

//#########################################
    $('#tabla-detalle').DataTable({
               "searching": false,
               "paging":   false,
              "language": {
                            "sProcessing":     "Procesando...",
                            "sLengthMenu":     "Mostrar _MENU_ registros",
                            "sZeroRecords":    "No se encontraron resultados",
                            "sEmptyTable":     "Ningún dato disponible en esta tabla",
                            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                            "sInfoPostFix":    "",
                            "sSearch":         "Buscar:",
                            "sUrl":            "",
                            "sInfoThousands":  ",",
                            "sLoadingRecords": "Cargando...",
                            "oPaginate": {
                                "sFirst":    "Primero",
                                "sLast":     "Último",
                                "sNext":     "Siguiente",
                                "sPrevious": "Anterior"
                            },
                            "oAria": {
                                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                            }
                           }
    });
//#########################################
    $('#tabla-detalle-todo').DataTable({
              
               //"searching": false,
              "language": {
                            "sProcessing":     "Procesando...",
                            "sLengthMenu":     "Mostrar _MENU_ registros",
                            "sZeroRecords":    "No se encontraron resultados",
                            "sEmptyTable":     "Ningún dato disponible en esta tabla",
                            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                            "sInfoPostFix":    "",
                            "sSearch":         "Buscar:",
                            "sUrl":            "",
                            "sInfoThousands":  ",",
                            "sLoadingRecords": "Cargando...",
                            "oPaginate": {
                                "sFirst":    "Primero",
                                "sLast":     "Último",
                                "sNext":     "Siguiente",
                                "sPrevious": "Anterior"
                            },
                            "oAria": {
                                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                            }
                           }
    });

    //#####################################
});










function btnSaveDeleteTantosXdias(id,cliente,monto,fecha) {
  let txtmontoxday = document.querySelector(".txtmontoxday-"+id);

  swal({
    title: "¿Qué deseas hacer?",
    buttons: {
      cancel: {
          text: "Cancelar",
          value: "close",
          visible: true
      },
      "delete": {
        text: "Eliminar",
        value: "delete",
        className: "btn-danger"
      },
      catch: {
        text: "Editar",
        value: "update",
        className: "btn-success"
      },
      "btnGuardarTXD": {
        text: "Guardar",
        value: "save",
        className: "btn-primary"
      }
    }
  }).then((value) => {
    switch(value){
      case "close": location.reload(); break;
      case "update":
        txtmontoxday.classList.remove("form-control-plaintext");
        txtmontoxday.classList.add("form-control");
        txtmontoxday.readOnly  = false;
      break;
      case "save":
        let hasClass = txtmontoxday.classList.contains('form-control');
        if(hasClass == true)
        {
          $.ajax({
            url: '../../controller/tantosxdias/funciones.php?accion=save',
            type: 'POST',
            data: { idcode: id, monto:  txtmontoxday.value, fecha: fecha, id_cliente: cliente }
          }).done(
                  function (respuestaServidor)
                  {
                      //console.log(respuestaServidor);
                      swal({ icon: "success", buttons: false });
                      location.reload();
                  }         
          );
        }
      break;
      case "delete":
            //###########################
            swal({
              title: "¿Deseas Eliminar?",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {

                $.ajax({
                  url: '../../controller/tantosxdias/funciones.php?accion=delete',
                  type: 'POST',
                  data: { id_code: id, id_cliente: cliente}
                }).done(
                        function (respuestaServidor)
                        {
                            //console.log(respuestaServidor);
                            swal({ icon: "success", buttons: false });
                            location.reload();
                        }         
                );
              } else { location.reload();  }
            });
            //###########################

      break;
    }
  });

};




