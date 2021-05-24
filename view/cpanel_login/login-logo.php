<div class="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Panel Principal</a></li>
          <li class="breadcrumb-item active">Logo</li>
        </ol>
          <div class="row">
              <div class="col-md-12">
                <div id="cpanel_login"></div>
              </div>
              <div class="col-md-12">
              <?php 
                if(isset($_GET["msj"]) ){
                    if($_GET['msj'] == 'good'){
                        ?>
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Imagen Guardada!</strong> Se guardaron correctamente en la base de datos.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Ojo Importante!</strong> Pueda que se tarde unos minutos o talvez horas en hacer los cambios correctamente.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        <?php
                    }else{
                        ?>
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Imagen Guardada!</strong> Se guardaron correctamente en la base de datos.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        <?php
                    }
              }
              ?>
              </div>
          </div>
      </div>
</div>
