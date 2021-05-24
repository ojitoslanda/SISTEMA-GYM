<div class="content-wrapper">
  <div class="container-fluid">
       <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Panel Principal</a></li>
        <li class="breadcrumb-item active">Consultas</li>
       </ol>
        <div class="row">
            <div class="col-md-12">
               <a href="cpanel-consultas?a=c1" class="btn btn-dark btn-sm  my-1">Consulta de Fecha desde y cuando</a>
               <a href="cpanel-consultas?a=c3" class="btn btn-dark btn-sm  my-1">Consulta de Clientes</a>
               <a href="cpanel-consultas?a=c4" class="btn btn-dark btn-sm  my-1">Reporte de Hoy</a>
               <a href="cpanel-consultas?a=c5" class="btn btn-dark btn-sm  my-1">Reporte Ganancias Semanal</a>
           </div>
           <div class="col-md-12">
                  <?php
                 $accion = (isset($_GET['a'])) ? $_GET['a']:'leer';
                 switch ($accion) {
                   case 'c1':
                            include 'con_fecha_desde_hasta.php';
                     break;
                  case 'c3':
                            include 'con_nombre_cliente.php';
                  break;

                  case 'c4':
                            include 'con_reporte_hoy.php';
                    break;
                  case 'c5':
                            include 'con_dias_semanal_quincenal_mensual_anual.php';
                    break;
                   default:
                            include 'con_reporte_hoy.php';
                  break;
                 }

                   ?>
           </div>
       </div>
      </div>
  </div>
