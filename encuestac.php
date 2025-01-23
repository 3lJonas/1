<?php 
require_once 'conexion.php';
class Encuesta{
    private $conn;
    public function __construct() {
        $conexion=new Conexion();
        $this->conn=$conexion->Conectar();
    }

    public function guardarEncuesta($usuario_id,$p1,$p2){
        $sql="INSERT into encuestas (usuario_id,p1,p2) values(".$usuario_id.",\"".$p1."\",\"".$p2."\")";
        
       return $result=$this->conn->query($sql);
    }
    public function existeEncuesta($usuario_id){
        $sql="SELECT * from encuestas where usuario_id=\"".$usuario_id."\"";
         $result=$this->conn->query($sql);
         return $result->fetch_assoc();
    }
}
?>