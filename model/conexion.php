<?php

class conexion {
    private $servidor;
    private $usuario;
    private $clave;
    private $bd;
    private $conexion;
    
    public function __construct() 
    {
    /*    
         $this->servidor="pdb22.runhosting.com";
        $this->usuario="3658628_gym";
        $this->clave="b37}^aJL8fHj1y)?";
        $this->bd="3658628_gym"; 
        */

        $this->servidor="localhost";
        $this->usuario="root";
        $this->clave="";
        $this->bd="system_gym";
    }
    
   public function conectar()
   {
       $this->conexion=new mysqli($this->servidor,$this->usuario,$this->clave,$this->bd);
   }
  

 //METODO QUE DEVUELVE UN REGISTRO: "SELECT"
   public function getEjecucionQuery($sql){      
      return $this->conexion->query($sql);
    }

//METODO QUE DEVUELVE UN VALOR V-F : INSERT , UPDATE , DELETE 
    public function setEjecucionQuery($sql){
      return $this->conexion->query($sql);
    }

    public function getServidor()
    {
        return $this->servidor;
    }
    public function getUsuario() {
        return $this->usuario;
    }

    public function getClave() {
        return $this->clave;
    }

    public function getBd() {
        return $this->bd;
    }
    
    public function setServidor($servidor)
    {
        $this->servidor = $servidor;
    }
    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function setClave($clave) {
        $this->clave = $clave;
    }

    public function setBd($bd) {
        $this->bd = $bd;
    }

    
    
     public function __destruct() 
    {
        
    }
    

    public function cerrarConexion(){
    $this->conexion->close();
}

    
}
