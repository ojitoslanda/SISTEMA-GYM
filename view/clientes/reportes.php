<ul class="nav nav-tabs  mb-3" id="myTab" role="tablist">
  <li class="li-normal"></li>
  <li class="nav-item">
    <a class="navlink_cpanelcliente nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="false">Todos</a>
  </li>
  <li class="nav-item">
    <a class="navlink_cpanelcliente nav-link" id="sinPagar-tab" data-toggle="tab" href="#sinPagar" role="tab" aria-controls="sinPagar" aria-selected="true">Sin Pagar</a>
  </li>
  <li class="nav-item">
    <a class="navlink_cpanelcliente nav-link" id="cliente_estrellas-tab" data-toggle="tab" href="#cliente_estrellas" role="tab" aria-controls="cliente_estrellas" aria-selected="false">Estrellas</a>
  </li>
  <li class="nav-item">
    <a class="navlink_cpanelcliente nav-link" id="TantosDias-tab" data-toggle="tab" href="#TantosDias" role="tab" aria-controls="TantosDias" aria-selected="true">Tantos Dias</a>
  </li>
  <li class="nav-item">
    <a class="navlink_cpanelcliente nav-link" id="diario-tab" data-toggle="tab" href="#diario" role="tab" aria-controls="diario" aria-selected="true">Diario</a>
  </li>
  <li class="nav-item">
    <a class="navlink_cpanelcliente nav-link" id="semanal-tab" data-toggle="tab" href="#semanal" role="tab" aria-controls="semanal" aria-selected="false">Semanal</a>
  </li>
  <li class="nav-item">
    <a class="navlink_cpanelcliente nav-link" id="quincenal-tab" data-toggle="tab" href="#quincenal" role="tab" aria-controls="quincenal" aria-selected="false" >Quincenal</a>
  </li>
  <li class="nav-item">
    <a class="navlink_cpanelcliente nav-link" id="mensual-tab" data-toggle="tab" href="#mensual" role="tab" aria-controls="mensual" aria-selected="false">Mensual</a>
  </li>
</ul>

<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
      <?php require 'reportes/reportes-todos.php'; ?>
  </div>
  <div class="tab-pane fade show" id="sinPagar" role="tabpanel" aria-labelledby="sinPagar-tab">
     <?php require 'reportes/reportes-SinPagar.php'; ?>
  </div>
  <div class="tab-pane fade show" id="cliente_estrellas" role="tabpanel" aria-labelledby="cliente_estrellas-tab">
     <?php require 'reportes/reportes-estrellas.php'; ?> 
  </div>
  <div class="tab-pane fade show" id="TantosDias" role="tabpanel" aria-labelledby="TantosDias-tab">
      <?php require 'reportes/reportes-tantosDias.php'; ?>
  </div>
  <div class="tab-pane fade show" id="diario" role="tabpanel" aria-labelledby="diario-tab">
      <?php require 'reportes/reportes-diario.php'; ?>
  </div>
  <div class="tab-pane fade show" id="semanal" role="tabpanel" aria-labelledby="semanal-tab">
      <?php require 'reportes/reportes-semanal.php'; ?>
  </div>
  <div class="tab-pane fade show" id="quincenal" role="tabpanel" aria-labelledby="quincenal-tab">	
      <?php require 'reportes/reportes-quincenal.php'; ?>
  </div>
  <div class="tab-pane fade  show" id="mensual" role="tabpanel" aria-labelledby="mensual-tab">
      <?php  require 'reportes/reportes-mensual.php'; ?>
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
         <div id="usuario_consultar" class="text-left"></div>
      </div>
    </div>
  </div>
</div>
