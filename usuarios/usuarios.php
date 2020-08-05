<?php
require_once "../BBDD/conexion.php";
class Usuarios extends conexionBBDD
{
    private $nombre;
    private $usuario;
    private $password;
    private $repetir_password;
    private $email;

    public function __construct()
    {
        $this->conexion = new conexionBBDD();
        $this->conexion = $this->conexion->connect();
    }

    public function registrarUsuarios($nom, $user, $pass, $repPass, $email)
    {
        $this->nombre = $nom;
        $this->usuario = $user;
        $this->password = $pass;
        $this->repetir_password = $repPass;
        $this->email = $email;

        $registrar = $this->conexion->prepare("INSERT INTO usuarios(nombre,usuario,contrasena,repetirContrasena,email) VALUES (?, ?, ?, ?, ?)");

        $registrar->bindParam(1, $this->nombre);
        $registrar->bindParam(2, $this->usuario);
        $registrar->bindParam(3, $this->password);
        $registrar->bindParam(4, $this->repetir_password);
        $registrar->bindParam(5, $this->email);

        if ($registrar->execute()) {
            $lastInsertId = $this->conexion->lastInsertId();
            echo "Usuario creado con exito";
        } else {
            $lastInsertId = 0;
            echo $registrar->errorInfo()[2];
        }

        // $insert-> close();
        return  $lastInsertId;
    }

    public function introducirUsuario($user, $pass)
    {

        $this->usuario = $user;
        $this->password = $pass;

        $introducir = $this->conexion->prepare("SELECT usuario,contrasena FROM usuarios WHERE usuario =$this->usuario AND contrasena = $this->password");
        $introducir->execute();

        if (!$introducir) {
            echo "El usuario o la contraseña no coinciden";
        } else {
            header("../productos/frontProductos.php");
        }
    }
}
