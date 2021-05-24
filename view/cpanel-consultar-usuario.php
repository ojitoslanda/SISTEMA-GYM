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
  <!-- Custom styles for this template-->
  <link href="assets/cpn/css/sb-admin.css" rel="stylesheet">
  <link href="assets/2020.css" rel="stylesheet">
  <!--datatable-->
  <link rel="stylesheet" type="text/css" href="../public/dataTables/css/jquery.dataTables.min.css">
</head>
<body class="fixed-nav sticky-footer bg-dark sidenav-toggled" id="page-top">

    <!-- Menu Navigation-->
  <?php  require 'default/sections/menu-navegation.php'; ?>
  
  <!--footer-->
  <?php  require 'usuarios/main-consultar-user.php'; ?>

  <!--footer-->
  <?php  require 'default/sections/footer.php'; ?>
    <!--modal exit-->
  <?php  require 'default/sections/modal-exit.html'; ?>

      <!--modal mUser-->
  <?php  require 'usuarios/form-administrador/modal_modificar_user.php'; ?>

      <!--modal mUser-->
  <?php  require 'usuarios/form-administrador/modal_delete_user.php'; ?>
    <!-- Bootstrap core JavaScript-->
    <script src="assets/cpn/vendor/jquery/jquery.min.js"></script>
    <script src="assets/cpn/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="assets/cpn/js/sb-admin.min.js"></script>

    <!--datatable-->
    <script src="../public/dataTables/js/jquery-3.3.1.js"></script>
    <script src="../public/dataTables/js/jquery.dataTables.min.js"></script>
    <script src="assets/usro/js/data-table-user.js"></script>
    <!--------->
    <script src="assets/usro/js/update-user.js"></script>
    <script src="assets/usro/js/delete-user.js"></script>
    <script src="assets/usro/js/call_img.js"></script>
    <script src="assets/2020.js"></script>
    <!--mensaje-->
     <script src="../public/sweetalert/sweetalert.min.js"></script>
      <script>
    <?php 
      if(isset($_GET['msj'])){
         if($_GET['msj'] == 'good'){
              ?>
                 swal("Actualizado!", "Usuario Modificado!", "success");
              <?php    
         }
      }
     ?>
     </script>
    
</body>

</html>
