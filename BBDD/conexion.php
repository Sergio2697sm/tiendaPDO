<?php
class conexionBBDD
{
    private $servidor = "localhost";
    private $BD = "tienda";
    private $usuario = "root";
    private $password = "";
    private $conect;

    public function conexion()
    {
        $conectionString = "mysql:host=$this->servidor;dbname=$this->BD;charset=utf8";

        try {
            $this ->conect = new PDO($conectionString,$this->usuario,$this->password);
            $this->conect ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            // var_dump($this->conect);
            // print_r($conexion);
            // $this ->conect ->setAttribute(PDO::ATTR_CASE,PDO::CASE_LOWER);
            // $this ->conect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
            return $this->conect;
            // return $conexion;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}

