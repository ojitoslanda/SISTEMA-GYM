<div class="col-md-12"> <h2>Reporte de hoy</h2> </div>
<div class="col-md-3">
    <div class="cajaReporte card text-white bg-secondary mb-3" style="max-width: 18rem; height: 85%">
          <div class="card-header text-center">Clientes totales</div>
          <div class="card-body">
            <h6 class="card-title">Clientes del d&iacute;a <p>(<?php echo date("d-m-Y");?>)</p></h6>
             <p class="card-text  text-dark">
              <div class="text-center"><h1 >
              <?php  include '../controller/clientes/get_total_cliente.php';  ?>
              </h1> <i>(personas)</i></div>
             </p>
          </div>
    </div>
</div>
<div class="col-md-3">
  <div class="cajaReporte card text-white bg-secondary mb-3" style="max-width: 18rem; height: 85%">
        <div class="card-header text-center">Clientes Pagado</div>
        <div class="card-body">
          <h6 class="card-title">Clientes del d&iacute;a <p>(<?php echo date("d-m-Y");?>)</p></h6>
          <p class="card-text  text-dark">
            <div class="text-center"><h1 >
            <?php 
              include '../controller/clientes/get_total_cliente_pagado.php';
            ?>
            </h1> <i>(personas)</i></div>
        </p>
        </div>
  </div>
</div>
<div class="col-md-3">
  <div class="cajaReporte card text-white bg-secondary mb-3" style="max-width: 18rem; height: 85%">
        <div class="card-header text-center">Clientes  No Pagado </div>
        <div class="card-body">
          <h6 class="card-title">Clientes del d&iacute;a <p>(<?php echo date("d-m-Y");?>)</p></h6>
          <p class="card-text  text-dark">
            <div class="text-center"><h1 >
            <?php include '../controller/clientes/get_total_cliente_no_pagado.php' ?>
            </h1> <i>(personas)</i></div>
        </p>
        </div>
  </div>
</div>
<div class="col-md-3">
  <div class="cajaReporte card text-white bg-secondary mb-3" style="max-width: 18rem; height: 85%">
        <div class="card-header text-center">Clientes Estrellas</div>
        <div class="card-body">
          <h6 class="card-title">Clientes del d&iacute;a <p>(<?php echo date("d-m-Y");?>)</p></h6>
          <p class="card-text  text-dark">
            <div class="text-center"><h1 >
            <?php  include '../controller/clientes/get_total_cliente_estrellas.php'; ?>
            </h1> <i>(personas)</i></div>
        </p>
        </div>
  </div>
</div>
<div class="col-md-3">
  <div class="cajaReporte card text-white bg-success mb-3" style="max-width: 18rem; height: 85%">
        <div class="card-header text-center">Precios de Rutina</div>
        <div class="card-body">
             <ul>  <?php  include '../controller/clientes/get_precios_rutina.php'; ?> </ul>
        </div>
  </div>
</div>
<div class="col-md-3">
      <div class="cajaReporte card text-white bg-success mb-3" style="max-width: 18rem; height: 85%">
          <div class="card-header text-center">Tipos</div>
          <div class="card-body">
            <h6 class="card-title">
              ¿Cuántos registro para cada Rutina? - (Pagado) -
              (<?php echo date("d-m-Y");?>)
            </h6>
            <p class="card-text text-dark">
            <ul>
              <li><i class="fas fa-star-of-life"></i>
                    Diario &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span class="fa fa-long-arrow-right"></span> 
                    <?php include '../controller/clientes/get_cant_pago_diario.php';?>
              </li>
              <li><i class="fas fa-star-of-life"></i>
                    Semanal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-long-arrow-right"></span>
                    <?php include '../controller/clientes/get_cant_pago_semanal.php';?>
              </li>
              <li><i class="fas fa-star-of-life"></i> 
                    Quincenal&nbsp;&nbsp;<span class="fa fa-long-arrow-right"></span>
                    <?php include '../controller/clientes/get_cant_pago_quincenal.php';?>

              </li>
              <li><i class="fas fa-star-of-life"></i> 
                    Mensual &nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-long-arrow-right"></span>
                    <?php include '../controller/clientes/get_cant_pago_mensual.php';?>
              </li>
            </ul>
          </p>
          </div>
        </div>
</div>
<div class="col-md-3">
      <div class="cajaReporte card text-white bg-success mb-3" style="max-width: 18rem; height: 85%">
          <div class="card-header text-center">Productos </div>
          <div class="card-body">
            <h6 class="card-title">Productos más vendidos del d&iacute;a <p>(<?php echo date("d-m-Y");?>)</h6>
              <p>
              <table class="text-center offset-md-2">
                <thead>
                  <tr>
                    <th>Producto</th>
                    <th></th>
                    <th>Cantidad</th>
                  </tr>
                </thead>
                <tbody>
                <?php include '../controller/clientes/get_productos_mas_vendidos.php';?>
                </tbody>
              </table>
              </p>
          </div>
        </div>
</div>
<div class="col-md-3">
      <div class="cajaReporte card text-white bg-info mb-3" style="max-width: 18rem; height: 85%">
          <div class="card-header text-center">Usuarios</div>
          <div class="card-body">
        <h6 class="card-title">Usuarios Registrados en la base de datos</h6>
              <div class="text-center"><h1 >  
              <?php 
                include '../controller/usuario/get_total_user.php';
              ?>
              </h1> <i>(usuarios)</i></div>
          </div>
        </div>
</div>
