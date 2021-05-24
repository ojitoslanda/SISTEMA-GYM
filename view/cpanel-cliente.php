<?php 
  include_once '../controller/header-conexion.php';
  include_once '../config/config.php';
?>

<!DOCTYPE HTML>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?php echo NAME_TITLE; ?></title>
  <link rel="icon" type="image/png" href="assets/img/icono.png">
  <!-- Bootstrap core CSS-->
  <link href="assets/cpn/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="assets/cpn/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="assets/cpn/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="assets/cpn/css/sb-admin.css" rel="stylesheet">
  <!-- -->
  <link rel="stylesheet" href="assets/clnt/css/tab.css" >
  <!-- -->
  <link rel="stylesheet" href="assets/clnt/css/jquery.flexdatalist.min.css">
  <!--datatables-->
  <link rel="stylesheet" type="text/css" href="../public/dataTables/css/jquery.dataTables.min.css">
  <link href="assets/2020.css" rel="stylesheet">
  
</head>

<body class="fixed-nav sticky-footer bg-dark sidenav-toggled" id="page-top">
    <!-- Menu Navigation-->
	<?php  require 'default/sections/menu-navegation.php'; ?>
	
	<!--footer-->
	<?php  require 'clientes/main-cliente.php'; ?>

	<!--footer-->
	<?php  require 'default/sections/footer.php'; ?>

  	<!--modal exit-->
	<?php  require 'default/sections/modal-exit.html'; ?>

<!-- Bootstrap core JavaScript-->
<script src="assets/cpn/vendor/jquery/jquery.min.js"></script>
<script src="assets/cpn/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="assets/cpn/js/sb-admin.min.js"></script>
 <!-- DATA TABLES -->
<script src="../public/dataTables/js/jquery-3.3.1.js"></script>
<script src="../public/dataTables/js/jquery.dataTables.min.js"></script>
<script src="assets/clnt/js/functions_productos.js"></script>
<script src="assets/clnt/js/functions_rutinas.js"></script>
<script src="../public/sweetalert/sweetalert.min.js"></script>
<script src="assets/clnt/js/cpanel-cliente.js"></script>
<script src="assets/clnt/js/calcular.js"></script>
<script src="assets/clnt/js/ver_productos_diario_cliente.js"></script>
<script src="assets/clnt/js/jquery.flexdatalist.min.js"></script>
<script type="text/javascript">
document.getElementById("new1").onclick = function(){location.reload();}
document.getElementById("new3").onclick = function(){location.reload();}
document.getElementById("rutinaAll").onclick = function(){location.reload();}


function btnEliminarClienteSinPagar(idClienteNoPagado){
  swal({
  title: "¿DESEAS ELIMINAR AL CLIENTE?",
  icon: "info",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    swal("El cliente ha sido modificado exitosamente", {
      icon: "success",
      button: false,
    });
    $.ajax({
            url: '../controller/clientes/delete_datos_clientes.php',
            type: 'POST',
            data:{
              idClienteNoPagado:idClienteNoPagado
              }
          }).done(function(respuestaServidor){ location.reload(); } );
  }else{location.reload();}
});

}
function btnClientePagado(idClienteNoPagado,val){
  swal({
  title: "¿Cliente pagó?",
  text: "Si el cliente pago dale OK, si todavía  el cliente no paga dale al boton CANCEL",
  icon: "info",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    swal("El cliente ha sido modificado exitosamente", {
      icon: "success",
      button: false,
    });
    $.ajax({
            url: '../controller/clientes/actualizar_pagado_cliente.php',
            type: 'POST',
            data:{
                id:idClienteNoPagado,
                val:val
              }
          }).done(function(respuestaServidor)
                { location.reload(); });
  }else{location.reload();}
});
};
</script>
<script src="assets/2020.js"></script>
</body>

</html>
