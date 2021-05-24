<div class="content-wrapper">
  <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Panel Principal</a>
        </li>
        <li class="breadcrumb-item active"> Registro de Usuarios</li>
      </ol>
      <div class="row">
         <?php 
                if($rol == 'Administrador'){
                   require_once 'form-administrador/registro-usuario.php';
                  }elseif($rol == 'Usuario'){
                    require_once 'form-usuario/Mi-perfil.php';
                  }else{
                  
                  }
          ?>
      </div>
  </div>  
</div>
