<?php
date_default_timezone_set("America/Lima");
require_once("../../model/clientes.php");
require_once("../../model/db_tipo_pago.php");
require_once("../../model/db_tipo_producto.php");
    if(isset($_GET['cod']))
        {

            $codigo = $_GET['cod'];
            $cn = new cliente();
            $obj = new tipopago();
            $objP = new tipoproducto();
            $hoy = date("Y-m-d");
            $resultados =  $cn->consultar_historial_cliente($codigo);
            $respuesta = mysqli_fetch_assoc($resultados); 
            $nombre = $respuesta['nombre'];
            $idCliente = $respuesta['ID'];
            $fecha = $respuesta['fecha_clientes'];
            $fecha_new = $respuesta['fecha_clientes_new'];
            $estado_activo = $respuesta['estado'];
            $cliente_pagado = $respuesta['pagado'];
            $hora = $respuesta['hora'];
            $rutina = $respuesta['pago'];
            $idClienteRutina = $respuesta['id_tipo_pago'];
            $descuento_rutina = $respuesta['descuento_rutina'];
            $rtn_baile = $respuesta['rtn_baile'];
            $rtn_maquinas = $respuesta['rtn_maquinas'];
            $precio_bm = $respuesta['precio_bm'];
            $CantTantoxDias = $respuesta['dias'];
            $MontoTantoxDias = $respuesta['dinero_adelantado'];
            $precio_rutinaViejo = $respuesta['total_rutina']; 
            $cliente_estrella = $respuesta['cliente_estrella'];
            $sumaDineroCanxDias = $respuesta['cantDinero'];
        ######################################################
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Historial del Cliente</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link rel="icon" type="image/png" href="../assets/img/icono.png">
<!-- Bootstrap core CSS-->
<link href="../assets/cpn/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
<script src="../assets/cldario/js/jquery.min.js" ></script>-->
<script src="../assets/cpn/vendor/jquery/jquery.min.js"></script>
<script src="../assets/cldario/js/moment.min.js" ></script>
<link href="../assets/cldario/css/fullcalendar.min.css" rel="stylesheet" >
<script src="../assets/cldario/js/fullcalendar.min.js" ></script>
<script src="../assets/cldario/js/es.js" ></script>
<script src="../../public/sweetalert/sweetalert.min.js"></script>
<!--datatables-->
  <link rel="stylesheet" type="text/css" href="../../public/dataTables/css/jquery.dataTables.min.css">
<!-- js own -->
<script src="../assets/cldario/js/funciones.js"></script>
<!--clockpicjer-->
<link rel="stylesheet" href="../assets/cldario/css/bootstrap-clockpicker.css">
<script src="../assets/cldario/js/bootstrap-clockpicker.js"></script>
<!--style-->
<link rel="stylesheet" href="../assets/clnt/css/style.css">
<!--style 2020-->
<link rel="stylesheet" href="../assets/2020.css">
</head>
<body style="background-color: #ffffff">
<h2 class="my-3 ml-4 text-center">Historial del cliente</h2>
<div class="container-fluid my-4 ">
  <div class="row">
    <div class="col-md-5">
      <h5 class="font-weight-bold"style="text-decoration-line: underline;">Datos del Cliente</h5>

          <table class="text-center table table-hover table-bordered">

                <?php 
                  if($idClienteRutina == 5){
                    ?>
                    <tr>
                      <th>¿Cliente estrella?</th>
                      <td>
                        <div class="col-md-5 col-12 mx-auto">
                            <select class="custom-select" disabled=""  id="cliente_estrella">
                                <option value="no" <?php echo ($cliente_estrella == "no") ? 'selected' : ''; ?> >No</option>
                            </select>
                        </div>
                      </td>
                    </tr>
                    <?php
                  }else{
                      ?>
                      <tr>
                        <th>¿Cliente estrella?</th>
                        <td>
                          <div class="col-md-5 col-12 mx-auto">
                              <select class="custom-select" disabled=""  id="cliente_estrella">
                                  <option value="no" <?php echo ($cliente_estrella == "no") ? 'selected' : ''; ?> >No</option>
                                  <option value="si" <?php echo ($cliente_estrella == "si") ? 'selected' : ''; ?> >Si</option>
                              </select>
                          </div>
                        </td>
                      </tr>
                      <?php
                  }
                ?>
              <tr>    
                  <th>Nombre </th>
                  <td>
                    <input type="hidden" id="codcliente"  disabled value="<?php echo $_GET['cod']; ?>" > 
                    <input type="text" id="nombre_cliente" class="mx-auto form-control text-center font-weight-light disabled"  disabled value="<?php echo $nombre; ?>" style="width: 200px" > 
                  </td>
              </tr>
              <tr>    
                  <th>Fecha de Inicio</th>
                  <td><?php echo $fecha; ?></td>
              </tr>
              <tr>    
                  <th>Hora </th>
                  <td><?php echo $hora; ?></td>
              </tr> <tr>    
                  <th>Cliente Activo: 
                      <span class="badge <?php echo ($estado_activo == "si") ? 'badge-success' : 'badge-danger';?>"><i class="fa fa-power-off"></i></span>
                  </th>
                  <td>
                    <div class="col-md-7 col-lg-6 col-12 mx-auto" >
                        <select class="custom-select" disabled=""  id="cliente_eliminado">
                          <option value="si" <?php echo ($estado_activo == "si") ? 'selected' : ''; ?> >Activo</option>
                          <option value="no" <?php echo ($estado_activo == "no") ? 'selected' : ''; ?> >No activo</option>
                        </select>
                    </div>
                  </td>
              </tr>
              <tr>    
                  <th>Rutina</th>
                  <td>  
                        <div class="col-md-7 col-lg-6 col-12 mx-auto">
                        <select required  class="form-control disabled" disabled="" id="tip_rutina" >
                            <?php 
                            $datos=$obj->consultar_tipo_pago();
                            while($var=$datos->fetch_array(MYSQLI_ASSOC))
                            {
                                  
                                  //#######################################
                                  ?>
                                  <option label="<?php echo $var['pago'];?>" value='<?php echo $var['ID']?>'<?php 
                                  if($idClienteRutina == $var['ID'])
                                    { ?> selected <?php }
                                  ?> 
                                  ><?php echo $var['costo_pago'];?></option>

                                  <?php
                                  //#####################################
                            }

                            ?>
                          </select>
                        </div>
                      </td>
              </tr>
              <?php 
                 if($idClienteRutina == 5){
                    echo "<tr>
                            <th>Cantidad de Días</th>
                            <td>
                               <div class='col-md-5 col-12 mx-auto'>
                                  <input type='text' 
                                  disabled
                                  class='form-control text-center' 
                                  id='cantTantoDias' 
                                  name='CantTantoxDias'
                                  value='$CantTantoxDias'>
                               </div>
                            </td>
                          </tr>";
                    echo "<tr>
                            <th> Adelanto (S/.) <small>($fecha_new) </small></th>
                            <td>  
                                <div class='col-md-5 col-12 mx-auto'>
                                  <input type='hidden' id='fecha_actualizadaMA' value='$fecha_new'>
                                  <input type='text' 
                                  disabled
                                  class='form-control text-center' 
                                  id='MontoTantoDias' 
                                  name='MontoTantoxDias'
                                  value='$MontoTantoxDias'>
                                </div>
                            </td>
                          </tr>";
                 }
              ?>
              <tr>
                <th>¿Baile  y/o  Maquina?</th>
                <td>
                  <div class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" id="checkBaile" name="checkBaile" class="form-check-input" <?php echo ($rtn_baile == "on") ? 'checked' :  '';?> onclick="checkMB()" >
                    <label class="form-check-label" for="checkBaile">Baile</label>
                  </div>
                  <div class="custom-control custom-checkbox custom-control-inline">
                    <input type="checkbox" id="checkMaquina" name="checkMaquina" class="form-check-input" <?php echo ($rtn_maquinas == "on") ? 'checked' :  '';?> onclick="checkMB()">
                    <label class="form-check-label" for="checkMaquina">Maquina</label>
                  </div>
                </td>
              </tr>
              <tr id="divCstAmbos_Bln_Maqnas">
                  <th>Precio de Baile + Maquina</th>
                  <td>
                    <div class="col-md-5 col-12  mx-auto">
                    <input type="hidden" 
                           class="form-control" 
                           id="costoAmbosBMTest" 
                           value="<?php echo $precio_bm; ?>"
                    >
                    <input type="text" 
                           class="form-control text-center" 
                           id="costoAmbosBM" 
                           disabled=""
                           value="<?php echo ($rtn_baile == "on") && ($rtn_maquinas == "on") ?  $precio_bm : "0" ; ?>"
                      >
                    </div>
                  </td>
              </tr>
              <tr>
                  <th>¿Cliente Pagó?</th>
                  <td>
                    <div class="col-md-6 col-12 mx-auto" >
                        <select class="custom-select" disabled=""  id="cliente_pagado">
                            <option value="no" <?php echo ($cliente_pagado == "no") ? 'selected' : ''; ?> >No Pagado</option>
                            <option value="si" <?php echo ($cliente_pagado == "si") ? 'selected' : ''; ?> >Pagado</option>
                        </select>
                    </div>
                  </td>
              </tr> 
              <tr>
                  <th>¿Descuento de Rutina?</th>
                  <td>
                    <div class="col-md-5 col-12 mx-auto" >
                        <input type="text" disabled="" id="descuento_rutina" class="form-control text-center" value="<?php echo $descuento_rutina; ?>" >
                    </div>
                  </td>
              </tr>
          </table>
       <?php 
          if($idClienteRutina == 5){
                ?> 
                <div class="col-md-12">
                  <h5 class="font-weight-bold" style="text-decoration-line: underline;">Fechas de asistencia</h5>        
                  <table class="table table-hover text-center">
                          <thead>
                              <tr>
                                <th scope="col">Fechas</th>
                                <th scope="col">Monto S/.</th>
                                <th scope="col">Opciones</th>
                              </tr>
                          </thead>
                          <tbody>
                             <?php
                              $datosTxD=$cn->tantospordias_cliente($idCliente);
                              while($resTxD=$datosTxD->fetch_array(MYSQLI_ASSOC))
                              {
                              echo "
                                    <tr>
                                    <td>".$resTxD['fecha']."</td>
                                    <td>
                                    <div class='col-md-7 col-lg-6 col-12 mx-auto'>
                                      <input type='text' readonly class='form-control-plaintext text-center decimalesInput txtmontoxday-".$resTxD['id']."' value='".$resTxD['monto_adelanto']."'>
                                    </div>
                                    </td>
                                    <td class='text-center'> 	
                                        <button type='button' class='btn btn-success btn-sm' onclick='btnSaveDeleteTantosXdias(".$resTxD['id'].",".$resTxD['id_cliente'].",".'"'.$resTxD['monto_adelanto'].'"'.",".'"'.$resTxD['fecha'].'"'.")'><i class='fas fa-edit'></i></button>
                                    </td>
                                    </tr>
                                  ";
                                
                              }
                                echo "<tr>
                                        <td><h5>Total</h5></td>
                                        <td><h5>S/.$sumaDineroCanxDias</h5></td>
                                        <td></td>
                                   </tr>";
                             ?>
                              
                          </tbody>
                    </table>
                    <h4></h4>
                </div>
                <?php
          }
        ?>
      <div class="container">
              <?php 
                if($idClienteRutina == 5){
                  echo "<small> ";
                  echo "Costo de Rutina: " . $precio_rutinaViejo  ." soles<br>";
                  echo "Pago para: " . $CantTantoxDias ." días <br>";
                  echo "Él debe: " . ($precio_rutinaViejo * $CantTantoxDias) -  $sumaDineroCanxDias. " Soles<br>";
                  echo "</small>";
                  echo " <small class='text-info'> Se multiplica la cantidad de dias por el precio de la rutina --> 
                         Precio : $precio_rutinaViejo  x  Días : $CantTantoxDias   = 
                        ( ". $precio_rutinaViejo * $CantTantoxDias . " ) </small>" ;
                }
              ?>
          <div class="row  text-center">
               
            <div class="col-lg-3 col">
                 
              <div class="form-group">
                  <label for="" class="font-weight-bold">Rutina</label>
                <div class="col-md-12">
                  <input type="text" id="calcularPrecioRutina" class="form-control disabled text-center text-danger font-weight-bold" 
                          <?php 
                           if($idClienteRutina == 5){
                              ?>
                                 value =" <?php echo ($cliente_estrella == 'si') ? 0 : $precio_rutinaViejo * $CantTantoxDias ?> "; 
                              <?php
                           }else{
                             ?>
                               value =" <?php echo ($cliente_estrella == 'si') ? 0 : $precio_rutinaViejo?> "; 
                             <?php
                           }
                          ?>
                          readOnly 
                          disabled 
                          style="font-size:20px">
                </div>
              </div>
            </div>
            <div class="col-lg-3 col">
              <div class="form-group">
              <label for="" class="font-weight-bold">Desc.Rutina</label>
                <div class="col-md-12">
                  <input type="text"  id="calcularDescuentoRutina" class="form-control disabled text-center text-danger font-weight-bold" value="<?php echo $descuento_rutina; ?>"  readOnly disabled style="font-size:20px">
                </div>
              </div>
            </div>
            <div class="col-lg-3 col">
              <div class="form-group">
                  <label for="" class="font-weight-bold">Baile+Maquina</label>
                <div class="col-md-12">
                  <input type="text" id="calcularBaileyMaquina" class="form-control disabled text-center text-danger font-weight-bold" value="<?php echo $precio_bm; ?>"  readOnly disabled style="font-size:20px">
                </div>
              </div>
            </div>
            <div class="col-lg-3 col">
              <div class="form-group">
                  <label for="" class="font-weight-bold">Productos</label>
                <div class="col-md-12">
                  <input type="text" id="calcularProductos" class="form-control disabled text-center text-danger font-weight-bold" value="0"  readOnly disabled  style="font-size:20px">
                </div>
              </div>
            </div>

            <?php 
            if($idClienteRutina == 5)
            {
              ?>
                <div class="col-lg-3 col">
                  <div class="form-group">
                  <label for="" class="font-weight-bold">Adelanto</label>
                    <div class="col-md-12">
                    <input type="text" id="CalcularmontoAdelanTantoxDias" class="form-control disabled text-center text-danger font-weight-bold " value="<?php echo $MontoTantoxDias; ?>"  readOnly disabled  style="font-size:20px">
                    </div>
                  </div>
                </div>
              <?php
            }else{
              ?>
              <div class="col-lg-3 col">
                <div class="form-group">
                  <div class="col-md-12">
                  <input type="hidden" id="CalcularmontoAdelanTantoxDias" class="form-control disabled text-center text-danger font-weight-bold " value="<?php echo $MontoTantoxDias; ?>"  readOnly disabled  style="font-size:20px">
                  </div>
                </div>
              </div>
            <?php
            }
           ?>
          
          </div>
          <div class="row">
                  <div class="col-md-12 text-center mt-3">
                    <div class="form-group">
                      <label for="" class="font-weight-bold">Venta Total(S/)</label>
                      <div class="col-md-4 mx-auto">
                        <input type="text" name="total" id="resultado_total"  class="form-control disabled text-center text-danger font-weight-bold" value="<?php echo "00.000.00"; ?>"  readOnly disabled style="font-size:25px">
                      </div>
                    </div>
                  </div>
                 <div class="col-md-12 mt-5">
                  <hr>
                  <div class="col-md-12 text-center">
                  <button type="button" class="btn btn-danger btn-md" id="delete">DESACTIVAR CLIENTE</button>  
                  <button type="button"  class="btn btn-primary btn-md" id="btn_m_a" onclick="btnchange()">
                    MODIFICAR CLIENTE
                  </button>
                  <br> <br>
                  <a href="../cpanel-cliente.php" class="btn btn-secondary btn-md">CANCELAR O VOLVER </a>
                    <br>
                  </div>
                </div>
          </div>
         </div>
    </div>
    <div class="col-md-7 my-5 ">
                 <form action="../../controller/clientes/agregar_detalle_cliente.php" method="post">
                    <div class="row">
                      <div class="col-lg-2 col-12"> <h5 class="font-weight-bold">Detalles</h5> </div>
                      <div class="col-lg-7 col-9 font-weight-light">
                            <div class="form-group row">
                              <label for="historial_DescuentoProducto" class="col-lg-3 col-4">¿Algún Descuento?</label>
                              <div class="col-lg-9 col-5">
                                <input type="text" class="form-control text-center col-md-3 decimalesInput" required="" name="DescuentoProducto" value="0" id="inputDescuentoDetalle" onkeyup="sum()" disabled>  Soles
                              </div>
                            </div>
                      </div>
                      <div class="col-lg-3 col-3 font-italic resultadoDescuentoTotal" style="right:3rem;">
                            
                      </div>
                    </div>
                    <div class="container mb-5 MoDificarDeleteCliente_pagina_web">
                      <div class="row">
                            <div class="col-md-3 font-weight-light">
                                  Producto
                                  <select name="tipo" required  class="form-control" id="selectA" onChange="sum()" >
                                      <option value="" disabled="" selected>Seleccione</option>
                                  <?php 
                                  $datos=$objP->consultar_tipo_producto();
                                  while($var=$datos->fetch_array(MYSQLI_ASSOC))
                                  {

                                  //#######################################
                                  ?>
                                  <option label="<?php echo $var['nombre_producto']?>" value='<?php echo $var['id']?>'><?php echo $var['costo_producto'];?></option>

                                  <?php
                                  //#####################################
                                  }
                                  ?>
                                  </select>
                            </div>
                            <div class="col-md-2 col-3 font-weight-light">
                                <input type="hidden"name="id_cliente" value="<?php echo $idCliente?>"> 
                                Cant
                                  <input type="text"  onkeyup="sum()" value="0" required step="any" min="1" max="" disabled="true" name="cantidad_d" class="form-control mx-auto text-center"  id="nCant" > 
                            </div>
                            <div class="col-md-3 col-6 font-weight-light">
                                  Fecha
                                  <input type="text" name="fecha_d" readonly class="form-control mx-auto text-center disabled" value="<?php echo date("Y-m-d");?>">
                            </div>
                            <div class="col-md-2 col-3 font-weight-light">
                                  Total
                                  <input type="text"  value="0" name="total_d" id="resultado" readOnly class="form-control mx-auto text-center disabled" > 
                            </div>
                            <div class="col-md-2 mt-2">
                                <input type="submit" class="btn btn-success btn-sm text-center form-control" value="Agregar">
                            </div>
                          
                              </form>
                      </div>
                    </div>
                  <div class="list-cliente">
                        <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                          <li class="li-normal"></li>
                          <li class="nav-item">
                            <a class="nav-link active" id="diario-tab" data-toggle="tab" href="#diario" role="tab" aria-controls="diario" aria-selected="true">Hoy</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="todo-tab" data-toggle="tab" href="#todo" role="tab" aria-controls="todo" aria-selected="false">Todo</a>
                          </li>
                        </ul>
                    
                      <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="diario" role="tabpanel" aria-labelledby="diario-tab">
                          <!---###############-->
                            <table id="tabla-detalle" style="width:100%" class="table table-hover table-bordered text-center">
                                          <thead class="thead-light">
                                            <tr >    
                                                <th>Producto</th>
                                                <th>Cant</th>
                                                <th>Fecha</th>
                                                <th>Hora</th>
                                                <th>SubTotal</th>
                                                <th>Descuento</th>
                                                <th>Total</th>
                                                <th>Opción</th>
                                            </tr>
                                        </thead>
                    
                                            <tbody>
                    
                                                <?php 
                                                  $result =  $cn->consultar_historial_cliente_detalle($codigo,$hoy);
                                                    $registros = $result->num_rows;
                    
                                                  if($registros >= 1)
                                                  {
                                                    ##########
                                                        while($fila = $result -> fetch_array(MYSQLI_ASSOC))
                                                        { 
                    
                                                              if($fila['nombre_producto'] != "Ninguno")
                                                              {
                                                              ?> 
                                                                <tr>
                                                                  <td>
                                                                  <input type="hidden" id="codDetalle" value='<?php echo $fila['id_detalle']?>' >
                                                                      <?php echo $fila['nombre_producto']; ?>
                                                                  </td>
                                                                  <td><?php echo $fila['cant']; ?></td>
                                                                  <td><?php echo $fila['fecha_producto']; ?></td>
                                                                  <td><?php echo $fila['hora_producto']; ?> </td>
                                                                  <td><?php print $fila['total_producto']; ?></td>
                                                                  <td><?php echo $fila['descuento_producto']; ?> </td>
                                                                  <td>
                                                                  <input type="hidden" value="<?php print ($fila['total_producto']) - ($fila['descuento_producto']); ?>" class="sumt">
                                                                  <?php echo ($fila['total_producto']) - ($fila['descuento_producto']) ; ?> </td>

                                                                  <td><button type="buttton" class="btn btn-danger btn-sm"
                                                                        onclick="deletedetalle(<?php echo $fila['id_detalle']?>)">Eliminar</button></td>
                                                                </tr>
                                                              <?php
                                                              }
                                                      
                                                        }
                                                    ##########
                                                  }
                    
                                              
                                                ?>
                                                              
                                            </tbody>
                                            <tfoot>
                                              <tr>
                                                  <!-- <th>Id</th> -->
                                                  <th colspan="6"><h4><i>Total</i></h4></th>
                                                  <th><h5>S/.<label id="sumaResultado"></label></h5></th>
                                                  <th></th>
                                              </tr>
                                            </tfoot>
                                            </table>
                          <!--################--> 
                            </div>
                            <div class="tab-pane fade show" id="todo" role="tabpanel" aria-labelledby="todo-tab">
                                <!--################--> 
                                <table id="tabla-detalle-todo" style="width:100%" class="table table-hover table-bordered text-center">
                                          <thead class="thead-light">
                                            <tr >    
                                                <th>Producto</th>
                                                <th>Cant</th>
                                                <th>Fecha</th>
                                                <th>Hora</th>
                                                <th>SubTotal</th>
                                                <th>Descuento</th>
                                                <th>Total</th>
                                                <th>Opción</th>
                                            </tr>
                                        </thead>
                    
                                            <tbody>
                    
                                                <?php 
                                                  $result =  $cn->consultar_historial_cliente_detalle_todo($codigo);
                                                    $registros = $result->num_rows;
                    
                                                  if($registros >= 1)
                                                  {
                                                    ##########
                                                        while($fila = $result -> fetch_array(MYSQLI_ASSOC))
                                                        { 
                    
                                                              if($fila['nombre_producto'] != "Ninguno")
                                                              {
                                                              ?> 
                                                                <tr>
                                                                  <td>
                                                                  <input type="hidden" id="codDetalle" value='<?php echo $fila['id_detalle']?>' >
                                                                      <?php echo $fila['nombre_producto']; ?>
                                                                  </td>
                                                                  <td><?php echo $fila['cant']; ?></td>
                                                                  <td><?php echo $fila['fecha_producto']; ?></td>
                                                                  <td><?php echo $fila['hora_producto']; ?> </td>
                                                                  <td><?php print $fila['total_producto']; ?></td>
                                                                  <td><?php echo $fila['descuento_producto']; ?> </td>
                                                                  <td><input type="hidden" value="<?php print ($fila['total_producto']) - ($fila['descuento_producto']); ?>" class="sumt2"> <?php echo ($fila['total_producto']) - ($fila['descuento_producto']) ; ?> </td>
                                                                  <td><button type="buttton" class="btn btn-danger btn-sm"
                                                                        onclick="deletedetalle(<?php echo $fila['id_detalle']?>)">Eliminar</button></td>
                                                                </tr>
                                                              <?php
                                                              }
                                                      
                                                        }
                                                    ##########
                                                  }
                    
                                              
                                                ?>
                                                              
                                            </tbody>
                                              <tfoot>
                                              <tr>
                                                  <!-- <th>Id</th> -->
                                                  <th colspan="6"><h4><i>Total</i></h4></th>
                                                  <th><h5>S/.<label id="sumaResultado2"></label></h5></th>
                                                  <th></th>
                                              </tr>
                                            </tfoot>
                                            </table>
                                <!--################--> 
                            </div>
                      </div>    
            </div>
    </div>
  </div> <!-- /row -->
</div> <!-- /container -->
<hr>
  <?php 
      switch ($rutina) 
      {
        case 'Diario':
          break;
        case 'Semanal':
                   include 'calendario.php';
                    echo "<hr>";
          break;
        case 'Quincenal':
                   include 'calendario.php';
                    echo "<hr>";
          break;
        case 'Mensual':
                   include 'calendario.php';
                    echo "<hr>";
          break;
        case 'PagoxDías':
          include 'calendario.php';
            echo "<hr>";
          break;
        default:
      }
   ?>

<!-- Bootstrap core JavaScript-->
 <!-- DATA TABLES -->
<script src="../../public/dataTables/js/jquery.dataTables.min.js"></script>
  <script src="../assets/cpn/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="../assets/clnt/js/delete-cliente.js"></script>
      <script src="../assets/clnt/js/calcular_modicar_eliminar_cliente.js"></script>
      <script src="../assets/cldario/js/funcion_eventos.js"></script>
      <script> $('.clockpicker').clockpicker();</script>

  </body>
</html>
<?php
        }
        else{}

?>

