<?php
require_once "conexion.php";
class productos extends conexionBBDD
{
    public $nombre;
    public $cantidad;
    public $precio;
    public $id;

    public function __construct($nom, $cant, $pre)
    {
        $this->nombre = $nom;
        $this->cantidad = $cant;
        $this->precio = $pre;
    }

    public function selectProducto()
    {
        $conexion = new conexionBBDD();
        $con = $conexion->conexion();

        $select = $con->prepare('SELECT * FROM productos');
        // var_dump($select);

        // $select = $con->query("SELECT * FROM productos");
        // $select->setFetchMode(PDO::FETCH_ASSOC);
        // $select ->execute();

        if(!$select) {
            die("Error de consulta de ejecución, porque: ". print_r($con->errorInfo(),true) );
        }else {

            return $select;
        }
    }

    public function ningunDato() {
        return new self("","","");
    }
}
