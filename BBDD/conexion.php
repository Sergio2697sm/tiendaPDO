<?php
class conexionBBDD
{
    private $servidor = "localhost";
    private $BD = "tienda";
    private $usuario = "root";
    private $password = "";
    private $conect;

    public function __construct()
    {
        $conectionString = "mysql:host=$this->servidor;dbname=$this->BD;charset=utf8";

        try {
            $this->conect = new PDO($conectionString, $this->usuario, $this->password);
            $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function connect()
    {
        return $this->conect;
    }
}
