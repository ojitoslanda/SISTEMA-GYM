
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="cpanel">Panel Principal</a>
    <button id="btnMenu" class=" navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <!--Perfil -->
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="<?php echo ucwords($nombre); ?>">
          <a class="nav-link" href="#">
            <div class="sidenav-header|-inner text-center">
                <?php
                    if(isset($foto)&&!empty($foto)){
                    echo "<img src='./usuarios/usuarios-images/$foto' width='100px' alt='person' class='img-fluid rounded-circle'>";

                    }else{
                      echo "<img src='./assets/img/1.jpg' width='100px' alt='person' class='img-fluid rounded-circle'>";

                    }
                 ?>
                <span class="nav-link-text"><h2 class="h5"><?php echo ucwords($nombre); ?></h2><span><?php echo $rol;  ?></span></span>
            </div>
          </a>
        </li>

      <?php
      if($rol == "Usuario"){
        ##################
          ?>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Registro de Clientes">
              <a class="nav-link" href="cpanel-cliente">
                <i class="fa fa-fw fa-area-chart"></i>
                <span class="nav-link-text">Clientes</span>
              </a>
             </li>
          <?php
        ##################
        }elseif($rol == "Administrador"){
            ##################
              ?>
             <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Inicio">
              <a class="nav-link" href="cpanel">
                <i class="fa fa-fw fa-dashboard"></i>
                <span class="nav-link-text">Inicio</span>
              </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Registro de Clientes">
              <a class="nav-link" href="cpanel-cliente">
                <i class="fa fa-users"></i>
                <span class="nav-link-text">Clientes</span>
              </a>
             </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Consultas">
              <a class="nav-link" href="cpanel-consultas">
                <i class="fa fa-bar-chart"></i>
                <span class="nav-link-text">Consultas</span>
              </a>
            </li>
              <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Administrador">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
                <i class="fa fa-server"></i>
                   <span class="nav-link-text">Administrador</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseMulti">
                  <li>
                     <a href="cpanel-usuario">Registro Usuario</a>
                  </li>
                  <li>
                     <a href="cpanel-consultar-usuario">Modificar Usuario</a>
                  </li>
                  <li>
                     <a href="cpanel-login-logo">Cambiar Logo</a>
                  </li>
                </ul>
              </li>
             <?php
            ##################

        }

       ?>

      </ul>


      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Salir</a>
        </li>
      </ul>
    </div>
  </nav>
