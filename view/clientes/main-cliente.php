  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Panel Principal</a>
        </li>
        <li class="breadcrumb-item active">Clientes</li>
      </ol>
	      <div class="row ">
            <div class="col-12 mb-3">
                <!-- Button trigger modal -->
                <div class="float-right divCpanelCliente">
                <button type="button" class="btnCpanelCliente btn btn-info font-weight-bold" data-toggle="modal" data-target="#exampleModalCenter">CLIENTES</button>
                <button type="button" class="btnCpanelCliente btn btn-info font-weight-bold" data-toggle="modal" data-target="#ModalProd">PRODUCTOS</button>
                <button type="button" class="btnCpanelCliente btn btn-info font-weight-bold" data-toggle="modal" data-target="#ModalRutina">RUTINAS</button>
                </div>
             </div>
            <div class="col-12 text-center py-4">
               <?php include 'clientes/reportes.php';  ?>
	          </div>
	       </div>
    </div>
   </div>

     
<!-- Modal -->
   <?php  include 'modal-registro-producto-nuevo.php';  ?>       
   <?php  include 'modal-registro-cliente.php';  ?>
   <?php  include 'modal_all_rutina.php';  ?>

