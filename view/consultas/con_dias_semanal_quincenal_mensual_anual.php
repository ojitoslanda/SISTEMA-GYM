<ul class="nav nav-tabs pt-4" id="myTab" role="tablist">
  <li class="li-normal"></li>
  <li class="nav-item">
    <a class="nav-link active" id="semanal-tab" data-toggle="tab" href="#semanal" role="tab" aria-controls="semanal" aria-selected="false">Semanal</a>
  </li>
<!--
  <li class="nav-item">
    <a class="nav-link" id="quincenal-tab" data-toggle="tab" href="#quincenal" role="tab" aria-controls="quincenal" aria-selected="false">Quincenal</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="mensual-tab" data-toggle="tab" href="#mensual" role="tab" aria-controls="mensual" aria-selected="false">Mensual</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="mensual-tab" data-toggle="tab" href="#anio" role="tab" aria-controls="anual" aria-selected="false">Anual</a>
  </li>
-->
</ul>

<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="semanal" role="tabpanel" aria-labelledby="semanal-tab">
    <?php  require 're_ganacias_semanal.php'; ?>
   </div>
  <!--
    <div class="tab-pane fade show" id="semanal" role="tabpanel" aria-labelledby="semanal-tab">
      <?php  //require 'reportes/reportes-semanal.php'; ?>
   </div>
  <div class="tab-pane fade" id="quincenal" role="tabpanel" aria-labelledby="quincenal-tab">	
      <?php  //require 'reportes/reportes-quincenal.php'; ?>
  </div>
  <div class="tab-pane fade" id="mensual" role="tabpanel" aria-labelledby="mensual-tab">
  <?php  //require 'reportes/reportes-mensual.php'; ?>
  </div>
  -->
</div>