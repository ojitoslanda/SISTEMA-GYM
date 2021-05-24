

<?php 
require_once("../../model/usuario.php");
$cod = $_POST['id'];
$obj=new usuario();
$resultado=$obj->modificar_eliminar($cod);
while ($fila=$resultado->fetch_array(MYSQLI_ASSOC))
 {  
  
  $foto = $fila['foto'];
  $rol = $fila['rol'];

  ?>
   <form action="../controller/usuario/update-user" method="post"  enctype="multipart/form-data">
        <div class="container-fluid">
          <div class="row">
                <div class="col-md-6">
                  <div class="form-group col-md-12">
                     <input type="hidden" value="<?php echo $fila['ID'];?>" class="form-control" name="id">
                  </div>
                   <div class="form-group col-md-12">
                    <input type="text" value="<?php echo $fila['nombre'];?>" class="form-control" name="nombre" required>
                  </div>
                   <div class="form-group col-md-12">
                    <input type="text" value="<?php echo $fila['user'];?>" class="form-control" name="user" required>
                  </div>
                   <div class="form-group col-md-12">
                    <input type="password" value="<?php echo $fila['clave'];?>" class="form-control" name="clave" id="password1" maxlength="20"  required>
                      <div class="custom-control custom-checkbox mr-sm-2">
              <input type="checkbox" class="custom-control-input"  onchange="document.getElementById('password1').type = this.checked ? 'text' : 'password'" id="customControlAutosizing">
              <label class="custom-control-label efecto" for="customControlAutosizing">Ver Contraseña</label>
            </div>
                  </div>
                  <div class="form-group col-md-12">
                     <select name="rol" class="form-control" required>
                      <?php 
                          if($rol == 'Administrador'){
                             echo "<option value='Administrador' selected>Administrador</option>";
                             echo "<option value='Usuario'>Usuario</option>";
                          }else{
                             echo "<option value='Administrador'>Administrador</option>";
                             echo "<option value='Usuario' selected>Usuario</option>";
                          }
                      ?>
                    </select>
                  </div>
                </div>
          <div class="col-md-6">
            <div class="form-group text-center">
              <?php 

                if(!empty($foto)){
                   ?>

                  <img src="usuarios/usuarios-images/<?php echo $foto;?>" id="Image1" width="200" ><br>

                  <?php
                 
                }else{
                  ?>

                <img src="assets/img/user.png" id="Image1" width="200" ><br>

                  <?php
                
                } 

               ?>
                <button id="files" onclick="document.getElementById('file').click(); return false;">Cargar Imagen</button>
                <input type="file"  id="file" onchange="readURL(this);" class="form-control" accept="image/*" style="visibility: hidden;" name="imagen" >
            </div>
          </div>
                  <div class="col-md-12 text-center">
                    <input type="submit" class="btn btn-primary" value="Guardar Cambios"></button>
                  </div>
            </form>
          </div>
        </div>




<style media="screen">
.registrar{
width: 200px;
font-family: arial;
}
.efecto {
background-color: transparent;
opacity: 0.5;
}
</style>
<!--end container-->
  <?php
  
}

//ACA E ME QUEDE


?>