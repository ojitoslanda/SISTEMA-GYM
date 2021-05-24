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
  <title>𝓕𝓲𝓽𝓷𝓮𝓼𝓼 𝓖𝔂𝓶 𝓔𝓼𝓹𝓪𝓻𝓽𝓪</title>
  <link rel="icon" type="image/png" href="assets/img/icono.png">
  <!-- Bootstrap core CSS-->
  <link href="assets/cpn/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="assets/cpn/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="assets/cpn/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="assets/cpn/css/sb-admin.css" rel="stylesheet">

  <link href="assets/2020.css" rel="stylesheet">
</head>


<body class="fixed-nav sticky-footer bg-dark  sidenav-toggled" id="page-top">
    <!-- Menu Navigation-->
  <?php  require 'default/sections/menu-navegation.php'; ?>
  
  <?php  require 'usuarios/main.php'; ?>

  <!--footer-->
  <?php  require 'default/sections/footer.php'; ?>
    <!--modal exit-->
  <?php  require 'default/sections/modal-exit.html'; ?>

    <!--img-format-->
    <script src="assets/usro/js/call_img.js"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="assets/cpn/vendor/jquery/jquery.min.js"></script>
    <script src="assets/cpn/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="assets/cpn/js/sb-admin.min.js"></script>
    <!--mensaje-->
    <script src="../public/sweetalert/sweetalert.min.js"></script>
        <script>
    <?php 
      if(isset($_GET['msj'])){
         if($_GET['msj'] == 'good'){
              ?>
                 swal("Registro Correcto!", "Persona registrada en la base de datos!", "success");
              <?php    
         }
      }
     ?>
     </script>
    <script src="assets/2020.js"></script>
</body>

</html>
