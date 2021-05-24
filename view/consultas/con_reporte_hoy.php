<style>
.divegresos{
  height: auto;
  overflow: auto;
}
</style>
  <div class="container">
    <div class="row">
     <div class="col-md-12 pt-4 text-center text-primary">
            <h4><font face="arial"><b>REPORTE DE HOY TOTAL</b></font></h4>
            <hr>
      </div>

    
<!---->
      <button type="button" class="btn btn-info btn-sm my-3" data-toggle="modal" data-target="#modalprint">Modo de archivo (Pdf / Copiar / Excel)</button><br><br>
      <div class="table-responsive">
          <?php require_once '../controller/reportes/consulta_reporte_hoy.php'; ?>
      </div>
      <br> 
<!---->
<div class="col-md-12 my-5 border border-primary">
            <b>Registros Egresos</b> (<a href="#" data-toggle="modal" data-target="#modal_lista_egreso">Ver lista</a>)
              <form action="../controller/reportes/guardar_egresos.php" method="POST" >
              <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                            <label>¿Qué es?</label>
                          <input type="text" class="form-control" name="nombre" placeholder="nombre" required>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                            <label>Soles (S/)</label>
                          <input type="text" class="form-control decimales" name="costo"  placeholder="costo" required>
                      </div>
                    </div>
                      <div class="col-md-5">
                        <div class="form-group">
                              <label>Descripcion</label>
                              <textarea class="form-control" id="exampleFormControlTextarea1" name="descripcion" rows="1" placeholder="Es opcional"></textarea>
                        </div>
                      </div>
                   <div class="col-md-2">
                       <div class="form-group">
                            <button type="submit" class="btn btn-primary mt-4">Guardar Egresos</button>
                        </div>
                  </div>
                </div>
              </form>
</div>
            <div class="col-md-4 my-5">
                <b>Resume de Clientes:</b>
                <div class="content-group">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th><i>Clientes</i></th>
                                    <th><i>Cant</i></th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                  <?php include '../controller/reportes/resumen_rutinas_reportes_hoy.php';?>
                            </tbody>
                        </table>
                </div>
            </div>

            <div class="col-md-4 my-5">
                  <b>Resume de Productos:</b>
                 <div class="content-group ">
                    <table class="table table-bordered">
                        <thead>
                             <tr>
                                <th><i>Productos</i></th>
                                <th><i>Cant</i></th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                          <?php include '../controller/reportes/resumen_productos_reportes_hoy.php';?>
                        </tbody>
                    </table>
                 </div>
            </div>

<div class="col-md-4 my-5">
      <b>Baile y Maquinas:</b>
      <div class="content-group ">
        <table class="table table-bordered">
            <thead>
                  <tr>
                    <th><i>Nombre</i></th>
                    <th><i>Cant </i></th>
                </tr>
            </thead>
            <tbody class="text-center">
              <?php  include '../controller/reportes/resumen_cant_maqn_baile_one.php';?>
            </tbody>
        </table>
      </div>
      <div class="content-group ">
        <table class="table table-bordered">
            <thead>
                  <tr>
                    <th><i>Nombre</i></th>
                    <th><i>Cant </i></th>
                    <th><i>Precio </i></th>
                    <th><i>(S/)</i></th>
                </tr>
            </thead>
            <tbody class="text-center">
              <?php  include '../controller/reportes/resumen_cant_maqn_baile_two.php';?>
            </tbody>
        </table>
      </div>
</div>

<div class="col-md-12">
<h4><font face="arial"><b>REPORTE DE HOY PAGADO</b></font></h4><hr>
<div class="table-responsive">
<?php require_once '../controller/reportes/consulta_reporte_hoy_pagado.php'; ?>
</div>
</div>
      
<div class="col-md-12">
                <hr>
                <div class="text-center">
                  <form action="../controller/reportes/guardar_ingresos.php" method="post">
                    <h6 class="text-uppercase font-weight-bold">Total de Ganancia:</h6>
                    <h5 class="text-semibold text-danger">S/.<label id="totalganancia"><?php
                                   $totalganacia = ($sumap_total) + ($suma_total) + ($suma_totalBM);
                                   echo $totalganacia;
                      ?></label>
                     </h5>
                     <input type="hidden" name="total" value="<?php echo $totalganacia; ?>">
                     <?php
                       date_default_timezone_set('America/Lima');
                       require_once("../model/reportes.php");
                       $obj=new Reportes();
                       $hoy = date('Y-m-d');
                       $r = $obj->consultar_ganancia_semanal_ingreso($hoy);
                       $registros =$r->num_rows;
                       if($registros < 1){
                        echo '<button type="submit" class="btn btn-secondary btn-sm my-2" id="btnSaveEgreso" >Guardar Ganancia</button>';
                       }else{
                        echo "<h5>Tus ganancias se guardaron en la base de datos, el boton se activara mañana.</h5>";
                      }
                      ?>
                  </form>
                </div>
 </div>








<!-- Modal show product -->
<div class="modal fade" id="modal_lista_producto" tabindex="-1" role="dialog" aria-labelledby="modal_lista_producto" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Productos Consumidos</h5>
      </div>
      <div class="modal-body">
         <input type="hidden" id="codigo">
          <input type="hidden" id="date_today">
         <div id="usuario_consultar"></div>
      </div>
    </div>
  </div>
</div>


<!-- Modal lista de egresos -->
<div class="modal fade" id="modal_lista_egreso"  data-backdrop="static" data-keyboard="false"  tabindex="-1" role="dialog" aria-labelledby="modal_lista_egreso" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">

        <div class="container" id="panel_egresos">
          <div class="row">
              <div class="col-md-3">
                <form action="#" method="post">
                  <input type="hidden" class="cod" name="cod"  placeholder="codigo" >
                  <input type="text" class="form-control nombre" name="nombre"  placeholder="Nombre" >
              </div>
              <div class="col-md-4">
                <textarea class="form-control descripcion"  name="descripcion" rows="1" cols="4" placeholder="Descripcion"></textarea>
              </div>
              <div class="col-md-2">
                  <input type="text" class="form-control costot decimales"  name="costtotal" value="" placeholder="Total" >
              </div>
              <div class="col-md-3">
                  <input type="button" class="btn btn-success btn-sm"   value="Modificar" onclick="myFunctionModificar()"  id="btnModificar">
                  <button onclick="myFunctionCancelar()" class="btn btn-info btn-sm"   id="cancelarM">Cancelar</button>
                 </form>
              </div>
          </div>
        </div>

        <button type="button" class="close" id="salir">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="divegresos">
          <table id="tableEgresos" class="display tablarw">
          <thead>
              <tr>
                <th><i>Nombre</i></th>
                <th><i>Descripcion</i></th>
                <th><i>Fecha</i></th>
                <th><i>Costo total</i></th>
                <th><i>Opciones</i></th>
              </tr>
          </thead>
          <tbody >
              <?php include '../controller/reportes/ver_lista_egresos.php';?>
          </tbody>
          <tfoot>
            <tr>
              <th><i>Nombre</i></th>
              <th><i>Descripcion</i></th>
              <th><i>Fecha</i></th>
              <th><i>Costo total</i></th>
              <th><i>Opciones</i></th>
            </tr>
          </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
document.getElementById("salir").onclick = function(){location.reload();}
</script>
