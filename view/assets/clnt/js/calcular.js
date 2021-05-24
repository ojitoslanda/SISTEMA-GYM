//INPUT SOLO NUMERO Y DECIAMLES Y COMAS 
$('.decimalesBaileMaquina').on('input', function () {
   this.value = this.value.replace(/[^0-9,.]/g, '').replace(/,/g, '.');
 });

 function checkIt(evt) {
   evt = (evt) ? evt : window.event
   var charCode = (evt.which) ? evt.which : evt.keyCode
   // if (charCode > 31 && (charCode < 48 || charCode > 57)) {
   //     status = "This field accepts numbers only."
   //     return false
   // }
     if (charCode > 31 && (charCode < 48 || charCode > 54)) {
       status = "Maximo 6 dias"
       return false
   }
   status = ""
   return true
}


 //Variales Globales 
var total = "0";
var totalActual = "0";


/** PRIVILEGIOS - DESCUENTO/CLIENTE ESTRELLA/PAGO POR TANTO DIAS */
let privilegiosCheckBox = document.querySelector('#checkPrivilegios');
let messageChoosePrivilegio = document.querySelector('#messageChoosePrivilegio'); 
let divCantDescuento = document.querySelector('#divCantDescuento');
let selectPrivilegios = document.querySelector('#selectPrivilegios');
let selectTipoPagoRutina  = document.querySelector('#select1');
let selectEstadoPago = document.querySelector('#selectEstadoPago');
let divMessageClienteEntrella = document.querySelector('#divMessageClienteEntrella');

let divdescuentoProducto = document.querySelector('#divdescuentoProducto');

function sum()
{           
        
         //Privilegios - Descuento
         let txtdescuentoRutina = document.getElementById("txtdescuentoRutina").value;
         let txtdescuentoProducto = document.getElementById("txtdescuentoProducto").value;

         //Checked Baile o Maquinas
         var divCstAmbos_Bln_Maqnas = document.getElementById("divCstAmbos_Bln_Maqnas");
         var rtnBaile = document.getElementById('checkBaile');
         var rtnMaquina = document.getElementById('checkMaquina');

         //capto el ID
         var seleccion=document.getElementById('select1'); //SELECCION DE TIPO (Diario-Semanal-Quincenal-Mensual)
         var seleccion_producto = document.getElementById('select2');
         divCant = document.getElementById("nCant");
         divCosto = document.getElementById("ncospro");
         inputCosto = document.getElementById("num_costo");

        //recojemos los valores del select producto 1,2,3
        var  pro  = seleccion_producto.options[seleccion_producto.selectedIndex].value;
      //   console.log("id producto: " + pro)
        //recojemos los costo del producto (agua,proteinas,etc)
        costo_producto = seleccion_producto[seleccion_producto.selectedIndex].text;

        //recojemos los nombres de los select de tipo de pago (diario,semanal,quin,mensual,etc)
        a =  seleccion.options[seleccion.selectedIndex].text;
        valrutina  = seleccion.options[seleccion.selectedIndex].value; //Los valores 

      //   console.log("Costo de rutina : " + a); 
      //   console.log("Costo del producto : " + costo_producto);

        document.getElementById("costorutina").value = a;


        //Ponemos el precio del producto
        document.getElementById("num_costo").value =  costo_producto;
         //capto los valores (Del ID asignados)
         var costo_pago = document.getElementById("costorutina").value;
         var cantP = document.getElementById("num_cant").value;
         var cantPInput = document.getElementById("num_cant");
         var costP = document.getElementById("num_costo").value;

         var costoAmbosBaileMaquinas = document.getElementById("cst_bl_mqna").value;
         var cantTantosDias = document.getElementById("txtTantoxDias").value;


            //Activamos la cant y desactivamos too;
            if (pro >=  1 ){
               cantPInput.disabled = false;
               divCosto.style.display = "";
               divCant.style.display = "";
               document.getElementById("rutianBM").classList.add("col-md-4");
               document.getElementById("rutianBM").classList.remove("col-md-5");
               document.getElementById("nCant").classList.add("col-md-1");
               document.getElementById("nCant").classList.remove("col-md-2");
               document.getElementById("ncospro").classList.add("col-md-1");
               document.getElementById("ncospro").classList.remove("col-md-2");
               divdescuentoProducto.style.display = "";

            }else{
                cantPInput.disabled = true;
                divCosto.style.display="none";
                divCant.style.display="none";
                //id de los imput de numCant y numCosto lo vuelvo a 0
                document.getElementById("num_cant").value = 0;
                document.getElementById("num_costo").value = 0;

            }
            





             

     //Ejecutamos
                switch (valrutina) {
                    case '1':       
                                  document.getElementById('rutianBM').style.display = "";
                                  document.getElementById('divContainerPrivilegios').style.display = "";
                                  document.getElementById('divTantosDias').style.display = "none";
                                  document.getElementById("txtTantoxDias").value = 0;
                                  document.getElementById("txtMontoxDias").value = 0;
                                 //Precio de la rutina Diario
                                 precio = costo_pago;
                                 cantxcosto = 0;
                                 
                                 //Activamos el seelect producto
                                 seleccion_producto.disabled = false;
                               
                                 //Multimplicamos el costo por la cant
                                 cantxcosto = costP * cantP  ;
                                 //Sumamos
                                 total = parseFloat(cantxcosto) + parseFloat(precio);
                                 totalActual = parseFloat(total) + parseFloat(costoAmbosBaileMaquinas);
                                 
                                 //Restamos los descuento
                                 descuentoPrivilegios_one = parseFloat(total) - parseFloat(txtdescuentoRutina) - parseFloat(txtdescuentoProducto);
                                 descuentoPrivilegios_two = parseFloat(totalActual) - parseFloat(txtdescuentoRutina) - parseFloat(txtdescuentoProducto);
                          
                                 //Mostramos
                                 document.getElementById("costoproducto").value = cantxcosto;



                                 if( rtnBaile.checked == true && rtnMaquina.checked == true ){
                                   divCstAmbos_Bln_Maqnas.style.display = "";
                                    !isNaN(totalActual) ?  document.getElementById("resultado").value = totalActual : document.getElementById("resultado").value = total;
                                   
                                 }else{
                                    divCstAmbos_Bln_Maqnas.style.display = "none"
                                    document.getElementById("cst_bl_mqna").value = 0;
                                    !isNaN(descuentoPrivilegios_one) ? document.getElementById("resultado").value = descuentoPrivilegios_one : document.getElementById("resultado").value = total;
                                 }
                                    
                                 !isNaN(descuentoPrivilegios_two) ? document.getElementById("resultado").value = descuentoPrivilegios_two : document.getElementById("resultado").value = descuentoPrivilegios_one;
                                
                                    

                    break;
                    case '2': 
                                  document.getElementById('rutianBM').style.display = "";
                                  document.getElementById('divContainerPrivilegios').style.display = "";
                                  document.getElementById('divTantosDias').style.display = "none";
                                  document.getElementById("txtTantoxDias").value = 0;
                                  document.getElementById("txtMontoxDias").value = 0;

                                  //Precio de la rutina Diario
                                 precio = costo_pago;
                                 cantxcosto = 0;
                                 
                                 //Activamos el seelect producto
                                 seleccion_producto.disabled = false;
                  
                                 //Multimplicamos el costo por la cant
                                 cantxcosto = costP * cantP  ;
                                 //Sumamos
                                 total = parseFloat(cantxcosto) + parseFloat(precio);
                                 totalActual = parseFloat(total) + parseFloat(costoAmbosBaileMaquinas);
   
                                  //Restamos los descuento
                                  descuentoPrivilegios_one = parseFloat(total) - parseFloat(txtdescuentoRutina) - parseFloat(txtdescuentoProducto);
                                  descuentoPrivilegios_two = parseFloat(totalActual) - parseFloat(txtdescuentoRutina) - parseFloat(txtdescuentoProducto);

                                 //Mostramos
                                 document.getElementById("costoproducto").value = cantxcosto;

                                 if( rtnBaile.checked == true && rtnMaquina.checked == true ){
                                   divCstAmbos_Bln_Maqnas.style.display = "";
                                    !isNaN(totalActual) ?  document.getElementById("resultado").value = totalActual : document.getElementById("resultado").value = total;

                                    !isNaN(descuentoPrivilegios_two) ? document.getElementById("resultado").value = descuentoPrivilegios_two : document.getElementById("resultado").value = descuentoPrivilegios_one;
                                    
                              
                                 }else{
                                    divCstAmbos_Bln_Maqnas.style.display = "none"
                                    document.getElementById("cst_bl_mqna").value = 0;
                                    //document.getElementById("resultado").value = total;

                                    !isNaN(descuentoPrivilegios_one) ? document.getElementById("resultado").value = descuentoPrivilegios_one : document.getElementById("resultado").value = total;

                                 }

                                 
                    break;
                    case '3': 
                                    document.getElementById('rutianBM').style.display = "";
                                    document.getElementById('divContainerPrivilegios').style.display = "";
                                    document.getElementById('divTantosDias').style.display = "none";
                                    document.getElementById("txtTantoxDias").value = 0;
                                    document.getElementById("txtMontoxDias").value = 0;

                                    //Precio de la rutina Diario
                                    precio = costo_pago;
                                    cantxcosto = 0;
                                    
                                    //Activamos el seelect producto
                                    seleccion_producto.disabled = false;
                     
                                    //Multimplicamos el costo por la cant
                                    cantxcosto = costP * cantP  ;
                                    //Sumamos
                                    total = parseFloat(cantxcosto) + parseFloat(precio);
                                    totalActual = parseFloat(total) + parseFloat(costoAmbosBaileMaquinas);
   
                                       
                                   //Restamos los descuento
                                    descuentoPrivilegios_one = parseFloat(total) - parseFloat(txtdescuentoRutina) - parseFloat(txtdescuentoProducto);
                                    descuentoPrivilegios_two = parseFloat(totalActual) - parseFloat(txtdescuentoRutina) - parseFloat(txtdescuentoProducto);

                                    //Mostramos
                                    document.getElementById("costoproducto").value = cantxcosto;

                                    if( rtnBaile.checked == true && rtnMaquina.checked == true ){

                                       divCstAmbos_Bln_Maqnas.style.display = "";

                                     

                                       !isNaN(totalActual) ?  document.getElementById("resultado").value = totalActual : document.getElementById("resultado").value = total;

                                       !isNaN(descuentoPrivilegios_two) ? document.getElementById("resultado").value = descuentoPrivilegios_two : document.getElementById("resultado").value = descuentoPrivilegios_one;
                                       
                                 
                                    }else{
                                       divCstAmbos_Bln_Maqnas.style.display = "none"
                                       document.getElementById("cst_bl_mqna").value = 0;
                                       //document.getElementById("resultado").value = total;

                                       !isNaN(descuentoPrivilegios_one) ? document.getElementById("resultado").value = descuentoPrivilegios_one : document.getElementById("resultado").value = total;

                                    }

                                    
                    break;
                    case '4':   
                                    document.getElementById('rutianBM').style.display = "";
                                    document.getElementById('divContainerPrivilegios').style.display = "";
                                    document.getElementById('divTantosDias').style.display = "none";
                                    document.getElementById("txtTantoxDias").value = 0;
                                    document.getElementById("txtMontoxDias").value = 0;


                                    //Precio de la rutina Diario
                                    precio = costo_pago;
                                    cantxcosto = 0;
                                    
                                    //Activamos el seelect producto
                                    seleccion_producto.disabled = false;

                                    //Multimplicamos el costo por la cant
                                    cantxcosto = costP * cantP  ;
                                    //Sumamos
                                    total = parseFloat(cantxcosto) + parseFloat(precio);
                                    totalActual = parseFloat(total) + parseFloat(costoAmbosBaileMaquinas);

                                   //Restamos los descuento
                                    descuentoPrivilegios_one = parseFloat(total) - parseFloat(txtdescuentoRutina) - parseFloat(txtdescuentoProducto);
                                    descuentoPrivilegios_two = parseFloat(totalActual) - parseFloat(txtdescuentoRutina) - parseFloat(txtdescuentoProducto);

                                    //Mostramos
                                    document.getElementById("costoproducto").value = cantxcosto;

                                    if( rtnBaile.checked == true && rtnMaquina.checked == true ){
                                    divCstAmbos_Bln_Maqnas.style.display = "";
                                       !isNaN(totalActual) ?  document.getElementById("resultado").value = totalActual : document.getElementById("resultado").value = total;

                                       !isNaN(descuentoPrivilegios_two) ? document.getElementById("resultado").value = descuentoPrivilegios_two : document.getElementById("resultado").value = descuentoPrivilegios_one;
                                       
                                 
                                    }else{
                                       divCstAmbos_Bln_Maqnas.style.display = "none"
                                       document.getElementById("cst_bl_mqna").value = 0;
                                       //document.getElementById("resultado").value = total;

                                       !isNaN(descuentoPrivilegios_one) ? document.getElementById("resultado").value = descuentoPrivilegios_one : document.getElementById("resultado").value = total;

                                    }

                    break;
                  case '5':
                              document.getElementById('rutianBM').style.display = "";
                              document.getElementById('divContainerPrivilegios').style.display = "";
                              document.getElementById('divTantosDias').style.display = "";

                              
                              //Precio de la rutina Diario
                              precio = costo_pago;
                              cantxcosto = 0;
                              
                              //Activamos el seelect producto
                              seleccion_producto.disabled = false;

                              //Multimplicamos el costo por la cant
                              cantxcosto = costP * cantP  ;

                              //Multiplicamos la cantidad de dias por el precio de la rutina
                              dias_x_rutina = cantTantosDias * precio;

                              dias_x_rutina == 0 ? total = parseFloat(cantxcosto) + parseFloat(precio) : total = parseFloat(cantxcosto) + parseFloat(dias_x_rutina);
                              
                              totalActual = parseFloat(total) + parseFloat(costoAmbosBaileMaquinas);

                           //Restamos los descuento
                              descuentoPrivilegios_one = parseFloat(total) - parseFloat(txtdescuentoRutina) - parseFloat(txtdescuentoProducto);
                              descuentoPrivilegios_two = parseFloat(totalActual) - parseFloat(txtdescuentoRutina) - parseFloat(txtdescuentoProducto);

                              //Mostramos
                              document.getElementById("costoproducto").value = cantxcosto;

                              if( rtnBaile.checked == true && rtnMaquina.checked == true ){
                              divCstAmbos_Bln_Maqnas.style.display = "";
                                 !isNaN(totalActual) ?  document.getElementById("resultado").value = totalActual : document.getElementById("resultado").value = total;

                                 !isNaN(descuentoPrivilegios_two) ? document.getElementById("resultado").value = descuentoPrivilegios_two : document.getElementById("resultado").value = descuentoPrivilegios_one;
                                 
                           
                              }else{
                                 divCstAmbos_Bln_Maqnas.style.display = "none"
                                 document.getElementById("cst_bl_mqna").value = 0;
                                 //document.getElementById("resultado").value = total;

                                 !isNaN(descuentoPrivilegios_one) ? document.getElementById("resultado").value = descuentoPrivilegios_one : document.getElementById("resultado").value = total;

                              }
                     break;
                  default:
                              mensaje = 0;
                              seleccion_producto.disabled = true;
                              document.getElementById("cst_bl_mqna").value = 0;
                              document.getElementById("costoproducto").value = 0;
                              document.getElementById("resultado").value = mensaje;
                              document.getElementById("txtdescuentoRutina").value = 0;
                              document.getElementById("txtdescuentoProducto").value = 0;

                    break;
                }




}


function ChooseprivilegiosCliente()
{

   let divTotal_Rutina_o_Producto = document.querySelector('#divTotal_Rutina_o_Producto');
/***************** START PRIVILEGIO ************************ */
chooseSelectPrivilegios = selectPrivilegios.options[selectPrivilegios.selectedIndex].value;
if(privilegiosCheckBox.checked == true)
{
   selectPrivilegios.disabled = false;
   selectPrivilegios.style.display = "";

      switch (chooseSelectPrivilegios)
      {
         case "cliente_descuento":
               sum();
               divCantDescuento.style.display = "";
               messageChoosePrivilegio.style.display = "none";
               messageChoosePrivilegio.innerHTML = ``;
               divMessageClienteEntrella.style.display = "none";
               divTotal_Rutina_o_Producto.style.display = "";
               selectEstadoPago.disabled = false;
               selectTipoPagoRutina.disabled = false;
               document.getElementById("divContainerRutina_y_Rutinas_y_Cant").style.display = "";

            break;
         case "cliente_estrella":
               divCantDescuento.style.display = "none";
               messageChoosePrivilegio.style.display = "none";
               messageChoosePrivilegio.innerHTML = ``;
               divMessageClienteEntrella.style.display = "";
               // SELECIONAMOS EL PRODUCTO NINGUNO , YA QUE ES CLIENTE ESTRELLA NO TIENE PERMISO PARA COMPRAR PRODUCTOS
               // Pero puedo comprar productos en el HISTORIAL CLIENTE
               document.getElementById('select2').select = "1";
               document.getElementById('selectEstadoPago').selectedIndex = "1";
               document.getElementById('selectEstadoPago').disabled = true;
               selectTipoPagoRutina.selectedIndex = "1";
               selectTipoPagoRutina.disabled = true
               document.getElementById("txtdescuentoRutina").value = 0;
               document.getElementById("txtdescuentoProducto").value = 0;
               divTotal_Rutina_o_Producto.style.display = "none";
               document.getElementById("divContainerRutina_y_Rutinas_y_Cant").style.display = "none";
               document.getElementById('checkBaile').checked = false;
               document.getElementById('checkMaquina').checked = false;
               document.getElementById('cst_bl_mqna').value = 0;
               document.getElementById("num_cant").value = 0;
               document.getElementById("resultado").value = 0;
               document.getElementById('divTantosDias').style.display = "none";
               document.getElementById("txtTantoxDias").value = 0;
               document.getElementById("txtMontoxDias").value = 0;

            break;
         case "ninguno":
               divCantDescuento.style.display = "none";
               selectPrivilegios.selectedIndex = "0";
               selectPrivilegios.disabled = true;
               selectPrivilegios.style.display = "none"; 
               privilegiosCheckBox.checked = false;
               messageChoosePrivilegio.style.display = "none";
               messageChoosePrivilegio.innerHTML = ``;
               divMessageClienteEntrella.style.display = "none";
               document.getElementById("txtdescuentoRutina").value = 0;
               document.getElementById("txtdescuentoProducto").value = 0;
               selectEstadoPago.disabled = false;
               selectTipoPagoRutina.disabled = false;
               document.getElementById("divContainerRutina_y_Rutinas_y_Cant").style.display = "";

               divTotal_Rutina_o_Producto.style.display = "none";

               sum();
            break;
         default:
             messageChoosePrivilegio.style.display = "";
             messageChoosePrivilegio.innerHTML = `<h6>Solo debes seleccionar uno opción</h6>`;
            break;
      }
}else{
   divCantDescuento.style.display = "none";
   selectPrivilegios.disabled = true;
   selectPrivilegios.style.display = "none";
   messageChoosePrivilegio.style.display = "none";
   messageChoosePrivilegio.innerHTML = ``;
   selectPrivilegios.selectedIndex = "0";
   document.getElementById("txtdescuentoRutina").value = 0;
   document.getElementById("txtdescuentoProducto").value = 0;
   divTotal_Rutina_o_Producto.style.display = "none";
   selectEstadoPago.disabled = false;
   selectTipoPagoRutina.disabled = false;
   document.getElementById("divContainerRutina_y_Rutinas_y_Cant").style.display = "";
   divMessageClienteEntrella.style.display = "none";

   sum();
}
/*********************** FIN PRIVILEGIOS ***************************/
}


let seleccion_producto_ninguno = document.getElementById('select2');
function ChooseProductoNinguno()
{
   let  productoNinguno  = seleccion_producto_ninguno.options[seleccion_producto_ninguno.selectedIndex].value;

   if(productoNinguno <= 1)
   {
      divdescuentoProducto.style.display = "none";
      document.getElementById("txtdescuentoProducto").value = 0;
      sum();
   }
}



privilegiosCheckBox.addEventListener('click',ChooseprivilegiosCliente);
selectPrivilegios.addEventListener('change',ChooseprivilegiosCliente);
seleccion_producto_ninguno.addEventListener('change',ChooseProductoNinguno);