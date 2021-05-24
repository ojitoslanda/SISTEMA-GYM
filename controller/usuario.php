<?php
require_once("../model/usuario.php");
$obj=new  usuario();
$resultado=$obj->getLoginUser();

$encontrados=0;

$user=$_POST['username'];
$clave=$_POST['password'];

$codigo=0;
$nombre="";
$privilegio="";
$ruta="";

while ($row=$resultado->fetch_array(MYSQLI_ASSOC))
{
	if ($row['user']==$user)
	{
    
		if ($row['clave']==$clave) 
		{

    			#encontro al usuario
          $encontrados=1;
          session_start();	#creamos una seccion
          $_SESSION['user'] =$row; #adjuntamos todo el registro correcto
                            #a la variable session
          Break;
		}else
		{
			$encontrado=0;
		}

	}else{
          $encontrados=0;
	}
}

if ($encontrados)
{
	 $ruta="Location: ../view/cpanel"; 
	  header($ruta);
	
}else{
	
	 $ruta="Location: ../index?msj=error"; 
 	 header($ruta);
 	   echo " No Logeado";
}



?>