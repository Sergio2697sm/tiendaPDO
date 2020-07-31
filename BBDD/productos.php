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
        $select ->execute();
        $mData=array();

        if(!$select) {
            /* No conviene mostrar errores internos en producción*/
            $mData["error"]="Error de consulta de ejecución, porque: ". $con->errorInfo()[2];
        }else {
            while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
                  $mData[] = $row;
            }
        }
        return $mData;
    }

    public function insertarDatos() {
        
    }

    //para realizar funciones donde no necesite pasar ninguna variable
    public function ningunDato() {
        return new self("","","");
    }
}
