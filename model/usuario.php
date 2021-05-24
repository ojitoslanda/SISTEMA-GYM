<?php
require_once("conexion.php");
class usuario{

private $codigo;
private $user;
private $clave;
private $rol;


//##################### METODO DE ASIGNACION DE VALORES ############################
public function setUserByCodigo($codigo){
	$cn = new conexion();
	$cn->conectar();
	$sql="SELECT * FROM usuario WHERE id=".$codigo;
	$resultado=$cn->getEjecucionQuery($sql);

	if($resultado->num_rows > 0)//verifico si tiene registros
	{ 
		$registro=$resultado->fetch_array(MYSQLI_ASSOC);
		$this->codigo=$registro['id'];
		$this->user=$registro['usuario'];
		$this->clave=$registro['clave'];
		$this->rol=$registro['rol'];

	}

	$resultado->free(); //LIBERO LOS RECURSOS USADOS
	$cn->cerrarConexion();

}

//##################### METODO CONSULTAR DE LOGIN DE USUARIO  ############################
public function getLoginUser()
{
	$cn = new conexion();
	$cn->conectar();
	$sql = "SELECT * FROM usuario";
	return $cn->getEjecucionQuery($sql);
}

//##################### CONSULTAR USUARIO ############################

public function consultar_y_modificar()
{
	$cn = new conexion();
	$cn->conectar();
	$sql = "SELECT * FROM usuario ";
	return $cn->getEjecucionQuery($sql);
}
//##################### CONSULTAR USUARIO POR ID ############################

public function modificar_eliminar($codigo)
{
	$cn = new conexion();
	$cn->conectar();
	$sql = "SELECT * FROM usuario WHERE ID = $codigo ";
	return $cn->getEjecucionQuery($sql);
}

//##################### CONSULTAMOS EL LOGO DEL PANEL ############################

public function consultar_logo($codigo)
{
	$cn = new conexion();
	$cn->conectar();
	$sql = "SELECT logo FROM tbl_logo WHERE ID = $codigo ";
	return $cn->getEjecucionQuery($sql);
}

public function actualizar_imagen_logo($codigo,$foto){
	$cn=new conexion();
   $cn->conectar();
   $sql="UPDATE tbl_logo SET logo='$foto' WHERE id=$codigo";
   return $cn->getEjecucionQuery($sql);
}



//##################### OBTENER CANTIDAD DE CLIENTES ############################
public function getCantUser(){
	$cn = new conexion();
	$cn->conectar();
	$sql = "SELECT COUNT(*) FROM usuario";
	return $cn->getEjecucionQuery($sql);
}

//##################### REGISTRAR USUARIO ############################
public function registrar_user($nombre,$user,$clave,$rol,$foto){
	$cn = new conexion();
	$cn->conectar();
	$sql="INSERT INTO usuario(nombre,user,clave,rol,foto) VALUES ('$nombre','$user','$clave','$rol','$foto')";
	return $cn->getEjecucionQuery($sql);
}
//##################### ACTUALIZAR USUARIO ############################
public function actualizar_user($codigo,$nombre,$user,$clave,$rol,$foto){
 	$cn=new conexion();
	$cn->conectar();
	$sql="UPDATE usuario SET nombre='$nombre',user='$user',clave='$clave',rol='$rol',foto='$foto' WHERE id=$codigo";
	return $cn->getEjecucionQuery($sql);
}
//##################### ELIMINAR USUARIO ############################
public function delete_user($codigo){
 	$cn=new conexion();
	$cn->conectar();
	$sql="DELETE FROM usuario WHERE id=$codigo";
	return $cn->getEjecucionQuery($sql);
}







////////////////////////////////////////
public function getCodigo(){
	return $this->codigo;
}

public function setCodigo($codigo){
	$this->codigo = $codigo;
}
///////////////////////////////////////////
public function getUser(){
	return $this->user;
}

public function setUser($user){
	$this->$user = $user;
}
/////////////////////////////////////////

public function getClave(){
	return $this->clave;
}

public function setClave($clave){
	$this->$clave = $clave;
}
///////////////////////////////////////

public function getRol(){
	return $this->rol;
}

public function setRol($rol){
	$this->$rol = $rol;
}
/////////////////////////////////////

}

?>