
<?php
#ESTO ES PARA QUE CUANDO INGRESE CON MI USUARIO , YA NO ME VUELVA A MOSTRAR LOGIN
if(isset($_SESSION['user']))
{
  header('Location: view/cpanel');
}else{
require_once("model/usuario.php");
$cod = "1";
$obj=new usuario();
$resultado=$obj->consultar_logo($cod);
 ?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title> Login </title>
    <meta name="viewport" content="initial-scale=1.0, width=device-width" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="view/assets/lgn/css/style.css">
      <link rel="icon" type="image/png" href="view/assets/img/icono.png">
</head>
<body>
  <div class="login_form">
  <setion class="login-wrapper">
    <div class="logo">
    <?php 
      while ($fila=$resultado->fetch_array(MYSQLI_ASSOC))
      {  
      $foto = $fila['logo'];
        if(!empty($foto)){
           ?> <img  src="view/cpanel_login/logo-img/<?php echo $foto;?>" alt="logo imagen"> <?php
         }
      }
    ?>
    </div>
    <form method="post" action="controller/usuario.php">
      <label for="username">Usuario</label>
      <input  required name="username" type="text" autocapitalize="off" autocorrect="off"/>
      <label for="password">Contraseña</label>
      <input class="password" required name="password" type="password" />
      <div class="hide-show">
        <span>Show</span>
      </div>
      <button type="submit">Ingresar</button>
    </form>
  </section>
</div>

<script src="public/sweetalert/sweetalert.min.js"></script>
<script>
<?php 
  if(isset($_GET['msj'])){
     if($_GET['msj'] == 'error'){
          ?>
           swal ( "Oops" ,  "Usuario o Contraseña Incorrecta" ,  "error" )
          <?php    
     }
  }
 ?>
 </script>
  <script src='public/jquery/jquery.min.js'></script>
  <script  src="view/assets/lgn/js/index.js"></script>
</body>
</html>


<?php }?>