<?php 
require_once("../../model/usuario.php");
$cod = $_POST['id'];
$obj=new usuario();
$resultado=$obj->consultar_logo($cod);
while ($fila=$resultado->fetch_array(MYSQLI_ASSOC))
 {  
  $foto = $fila['logo'];
?>
<form action="../controller/login/update-logo.php" method="post"  enctype="multipart/form-data" class="row my-3">
    <div class="col-md-3 ">
        <div class="form-group text-center">
            <a href="#" id="files" onclick="document.getElementById('file').click(); return false;">
            <?php if(!empty($foto)){
                ?>
                    <img src="cpanel_login/logo-img/<?php echo $foto;?>" id="Image1" alt="logo-imagen" class="w-50 h-50 img-fluid img-thumbnail" >
               <?php
             } ?>
            </a>
            <input type="file"  id="file" onchange="readURL(this);" class="form-control" accept="image/*" style="visibility: hidden;" name="imagen" >
            <input type="submit" class="btn btn-success" value="Modificar logo">
        </div>
    </div>
</form>
<?php
}
