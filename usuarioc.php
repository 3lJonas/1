<?php 
include_once 'conexion.php';
class Usuario{
    private $conn;
    public function __construct(){
        $conectar = new Conexion();
        $this->conn =$conectar->Conectar();
    }
public function Registrar($cedula,$nombre,$apellido,$contraseña){
    $contraseñaEncriptada=password_hash($contraseña,PASSWORD_BCRYPT);
$sql="INSERT into usuarios(cedula,nombre,apellido,contraseña,es_admin) values(\"".$cedula."\",\"".$nombre."\",\"".$apellido."\",\"".$contraseñaEncriptada."\",0)";
return $resultado=$this->conn->query($sql);
}

public function Login($cedula,$contraseña){
    $sql="SELECT * from usuarios where cedula=\"".$cedula."\"";
    $resultado=$this->conn->query($sql);
    $usuario=$resultado->fetch_assoc();

    if(password_verify($contraseña,$usuario['contraseña'])){
       $_SESSION['id']=$usuario['id'];
       $_SESSION['cedula']=$usuario['cedula'];
       $_SESSION['nombre']=$usuario['nombre'];
       $_SESSION['apellido']=$usuario['apellido'];
       $_SESSION['es_admin']=$usuario['es_admin'];
       return true;
       
    }
    echo $_SESSION['cedula'];
    return false;

}
public function estaLogueado(){
return isset($_SESSION['id']);
}
    public function Salir(){
        session_destroy();
    }
}
?>