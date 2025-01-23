<?php
class Conexion
{
    public function Conectar()
    {
        $conn = mysqli_connect("localhost", "root", "", "prueba");
        if(!$conn){
                echo "error en la conexion";
        }
        return $conn;
    }
}
?>