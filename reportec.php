<?php
require_once 'conexion.php';
class Reporte
{
    private $conn;
    public function __construct(){
        $conectar = new Conexion();
        $this->conn =$conectar->Conectar();
    }

    public function respuestaP1(){
        $sql="SELECT p1, count(*) as total from encuestas group by p1";
        return $result=$this->conn->query($sql)->fetch_all(mode:MYSQLI_ASSOC);
         
    }
    public function respuestaP2(){
        $sql="SELECT p2 as p2, count(*) as total from encuestas group by p2";
        return $result=$this->conn->query($sql)->fetch_all(mode:MYSQLI_ASSOC);
    }
}
?>