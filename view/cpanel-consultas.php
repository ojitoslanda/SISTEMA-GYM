<?php
  include_once '../controller/header-conexion.php';
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>GYM ESPARTA</title>
  <link rel="icon" type="image/png" href="assets/img/icono.png">
  <!-- Bootstrap core CSS-->
  <link href="assets/cpn/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="assets/cpn/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="assets/cpn/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="assets/cpn/css/sb-admin.css" rel="stylesheet">
  <script src="../public/sweetalert/sweetalert.min.js"></script>
  <!--datatable-->
  <link rel="stylesheet" type="text/css" href="../public/dataTables/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="../public/dataTables/css/buttons.dataTables.min.css">
  <link href="assets/2020.css" rel="stylesheet">


</head>
<body class="fixed-nav sticky-footer bg-dark sidenav-toggled" id="page-top">
  <?php


  if(isset($_GET['m']))
  {
    if($_GET['m'] == "t")
    {
         ?>
           <script>
           swal({
                title: "Ganancia guardada!",
                text: "Cada 24 horas se activara el boton de guardar ",
                icon: "success",
                closeOnClickOutside: false,
                closeOnEsc: false,
                button: "OK!",
              }).then((value) => {
               window.location.href ="cpanel-consultas";
              });
           </script>
         <?php
    }
  }
   ?>
    <!-- Menu Navigation-->
  <?php  require 'default/sections/menu-navegation.php'; ?>

  <!--main-->
  <?php  require 'consultas/main.php'; ?>

  <!--footer-->
  <?php  require 'default/sections/footer.php'; ?>
    <!--modal exit-->
  <?php  require 'default/sections/modal-exit.html'; ?>
  <!-- Bootstrap core JavaScript-->
  <script src="assets/cpn/vendor/jquery/jquery.min.js"></script>
  <script src="assets/cpn/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="assets/cpn/js/sb-admin.min.js"></script>
  <script src="assets/conslt/js/buscar-lista-semanales.js"></script>
  <script src="assets/clnt/js/ver_productos_diario_cliente.js"></script>
  <!--datatable-->
  <script src="../public/dataTables/js/jquery-3.3.1.js"></script>
  <script src="../public/dataTables/js/jquery.dataTables.min.js"></script>
  <script src="assets/conslt/js/data-table-consultas.js"></script>
  <script src="assets/conslt/js/funcionesEgresos.js"></script>

  <script src="../public/dataTables/js/dataTables.buttons.min.js"></script>
  <script src="../public/dataTables/js/pdfmake.min.js"></script>
  <script src="../public/dataTables/js/vfs_fonts.js"></script>
  <script src="../public/dataTables/js/jszip.min.js"></script>
  <script src="../public/dataTables/js/buttons.html5.min.js"></script>
  <script src="assets/2020.js"></script>

  <script>
  $(document).ready(function(){
    $('#tableEgresos').DataTable({
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
  });
  </script>
</body>

</html>
