<?php 
date_default_timezone_set('America/Lima');
$time_today = date("H:i:s"); 
$date_today = date("Y-m-d"); 
?>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="exampleModalCenterTitle">
  <div class="modal-dialog modal-dialog-centered modal-lg" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Registro de Cliente</h5>
      </div>
      <div class="modal-body">
        <form action="../controller/clientes/r_clientes.php" id='RegistroFormularioCpanelCliente' method="POST">
          <div class="form-row">
             <div class="col-md-3">
              <label class="float-left font-weight-bold">Nombre: </label>
              <input type="text" 
                      placeholder="Ingrese el nombre" 
                      class="form-control my-flexdatalist" 
                      data-url='../controller/clientes/consultar-cliente-masivo.php'
                      data-search-in='nombre'
                      data-search-by-word='true'
                      data-group-by='pago'
                      data-visible-properties='["nombre","pago"]'
                      autofocus 
                      data-value-property='ID'
                      data-min-length='1'
                      required=""
                      name="nombre"
                      id="nombre_cliente"
                      >
                <input type="hidden" class="form-control col-md-5" id="captarIDCliente">
             </div>
      
             <div class="col-md-3 col-6" id="tipos">
                  <label class="float-left font-weight-bold">Tipo </label>
                  <select class="form-control" name="tipo" id="select1" onChange="sum()" required="" title="Seleccione el tipo de Pago">
                    <option value="" selected disabled>Seleccionar</option>
                  <?php   include '../controller/clientes/tipo_pago.php';  ?> 
                  </select>
              </div>
              <div class="col-md-2 col-6">
                  <label class="float-left font-weight-bold">¿Pagó?</label>
                  <select class="form-control" name="estado_pagado" id="selectEstadoPago"  title="¿El cliente pagó?">
                    <option value="no">No</option>
                    <option value="si">Si</option>
                  </select>
              </div>
              <div class="col-md-2 col-6">
                    <label class="font-weight-bold">Fecha</label>
                    <input type="text" id="fechaCliente" class="form-control text-center"  readOnly  name="fecha" value="<?php echo $date_today;?>" title="Fecha del Cliente">
                </div>  
              <div class="col-md-2 col-6">
                    <label class="font-weight-bold">Hora</label>
                    <input type="text" id="horaCliente" class="form-control text-center" readOnly   name="hora" value="<?php echo $time_today;?>" title="Hora del Cliente">
              </div>
        </div>
      <div class="form-row" id="divContainerRutina_y_Rutinas_y_Cant">
            <div class="col-md-4" id="rutianBM">
              <label class="float-left mt-3 font-weight-bold">Rutina</label>
                    <div class="custom-control custom-checkbox custom-control-inline mt-5" style="margin-left: -3rem;">
                        <input type="checkbox" id="checkBaile" name="checkBaile" class="custom-control-input" onclick="sum()">
                        <label class="custom-control-label" for="checkBaile">Baile</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline mt-5" style="margin-left: 2rem;">
                      <input type="checkbox" id="checkMaquina" name="checkMaquina" class="custom-control-input" onclick="sum()">
                      <label class="custom-control-label" for="checkMaquina">Maquina</label>
                    </div>
            </div>
            <div class="col-md-2 mt-3 col-5" id="divCstAmbos_Bln_Maqnas" style="display: none;"  >
                      <label for="cst_bl_mqna">Costo ambos S/.</label>
                      <input type="text" id="cst_bl_mqna" class="form-control mx-auto decimalesBaileMaquina" value="2" required="" name="cst_bl_mqna" onkeyup="sum()"> 
            </div>
            <div class="col-md-3 mt-3 col-7" id="proc">
              <label class="float-left  font-weight-bold">Producto (Opcional)</label>
              <select class="form-control disabled" disabled="true" name="producto" id="select2" onChange="sum()"  title="Seleccione el tipo de producto">
                <option label="Seleccionar"  value="0" selected disabled>0</option>
                <?php   include '../controller/producto/tipo_producto.php';  ?> 
              </select>
            </div>
            <div class="col-md-2 col-6 mt-3" id="nCant" style="display: none;" >
                <label>Cant</label> 
                <input type="text"  class="form-control text-center" id="num_cant" onkeyup="sum()" disabled step="any" min="1" max="" name="cant" title="Cantidad" >
            </div>
            <div class="col-md-2 col-6 mt-3" id="ncospro" style="display: none;">
                <label>Precio(S/)</label> 
              <input type="text" class="form-control text-center" id="num_costo"  disabled  name="cost" title="Precio" >
            </div>
      </div>
        <hr>
        <div class="form-row" id="divContainerPrivilegios" style="display:none">
          <div class="col-md-4" id="containerselectPrivilegios">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" id="checkPrivilegios" name="" class="custom-control-input">
                <label class="custom-control-label font-weight-bold" for="checkPrivilegios">Privilegios (Opcional)</label>
            </div>
            <select id="selectPrivilegios" disabled class="form-control"  name="selectPrivilegios" required="" title="Privilegios" style="display:none;" >
                    <option value="" selected disabled>Seleccionar</option>
                    <option value="ninguno">Ninguno</option>
                    <option value="cliente_descuento">Descuentos</option>
                    <option value="cliente_estrella">Cliente Estrella</option>
            </select>
          </div>
          <div class="col-md-8" id="divTantosDias" style="display: none;">
               <label for="txtTantoxDias" class="font-weight-light" style="margin-bottom:0;">
                ¿Días de Rutina?  o  ¿Monto Adelanto ?
                </label>
              <div class="row mx-auto" style="width: 30rem;">
                  <div class="col-lg-4" id="divCantTantosDias">
                    <label for="txtTDias" class="font-weight-bold" style="margin-bottom:0;">
                      Días
                    </label>
                    <div class="form-inline">
                      <div class="col-md-2">
                        <input type="text" class="form-control text-center"  maxlength="1" name="txtTDias" id="txtTantoxDias" value="0" placeholder="Días" style="width: 7rem;" onKeyPress="return checkIt(event)" onkeyup="sum()"> 
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-8" id="divMontoTantosDias">
                    <label for="txtMontoxDias" class="font-weight-bold" style="margin-bottom:0;">
                    Monto adelantado(S/.)
                    </label>
                    <div class="form-inline">
                      <div class="col-md-2">
                        <input type="text"  class="form-control text-center decimalesBaileMaquina" name="txtMontoxDias" id="txtMontoxDias" value="0" placeholder="Monto" style="width: 7rem;" onkeyup="sum()"> 
                      </div>
                    </div>
                  </div>
              </div>
          </div> 
          <div class="col-lg-12" id="mensajePagoAnterior">
          </div>
          <div class="col-md-8 mt-4" id="divCantDescuento" style="display: none;">
               <label for="" class="font-weight-light" style="margin-bottom:0;">
                ¿Cúanto es su descuento en Rutina o Producto?
                </label>
              <div class="row mx-auto" style="width: 30rem;">
                  <div class="col-lg-4">
                    <label for="txtdescuentoRutina" class="font-weight-bold" style="margin-bottom:0;">
                  Rutina (S/.)
                  </label>
                    <div class="form-inline">
                      <div class="col-md-3">
                        <input type="text"  class="form-control text-center" name="txtdescuentoRutina" id="txtdescuentoRutina" value="0" style="width: 7rem;" onkeyup="sum()" > 
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4" id="divdescuentoProducto" style="display:none">
                    <label for="txtdescuentoProducto" class="font-weight-bold" style="margin-bottom:0;">
                    Producto (S/.)
                    </label>
                    <div class="form-inline">
                      <div class="col-md-3">
                        <input type="text"  class="form-control text-center" name="txtdescuentoProducto" id="txtdescuentoProducto" value="0" style="width: 7rem;" onkeyup="sum()" > 
                      </div>
                    </div>
                  </div>
              </div>
          </div> 
          <div class="col-md-8 mt-4" id="divMessageClienteEntrella" style="display: none;">
            <h6>Cliente estrella, este cliente no paga su rutina.</h6>
          </div> 
          <div class="col-md-9 text-danger " id="messageChoosePrivilegio" style="display: none;">
         </div>
        </div>
        <hr>
        <div class="form-row">
          <div class="col-lg-5"  id="divTotal_Rutina_o_Producto" style="display:none">
            <div class="form-group">
                <div class="row">
                  <div class="col-lg-5 col-6 mt-5 font-weight-bold" >
                     Total Producto 
                     <input type="text" id="costoproducto" class="form-control text-center" name="costoproducto" readOnly value="0">
                  </div>
                  <div class="col-lg-5 col-6 mt-5 font-weight-bold" >
                  Total Rutina
                     <input type="text" id="costorutina" class="form-control text-center" name="costorutina" readOnly value="0">
                  </div>
                </div>
            </div>
          </div>
          <div class="col-lg-7 mt-3 col-12 mx-auto" >
            <label class="font-weight-bold">Venta Total: (S/)</label>
            <input type="text"  id="resultado" class="form-control text-center" name="totalRutina" readOnly value="0" style="font-size: 45px;">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary newCliente">Nuevo Cliente</button>
        <button type="button" class="btn btn-primary oldCliente" style="display:none">Guardar Datos</button>
        <button type="reset" class="btn btn-info">Borrar todo</button>
        <button type="button" class="btn btn-danger" id="new3" >Salir</button>
      </div> 
      </form>
    </div>
  </div>
</div>



