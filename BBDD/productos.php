<?php
require_once "conexion.php";
class productos extends conexionBBDD
{
    public $nombre;
    public $cantidad;
    public $precio;
    public $id;
    private $conexion;

    public function __construct()
    {
        $this->conexion = new conexionBBDD();
        $this->conexion = $this->conexion->connect();
    }

    public function selectProductoId($id) {
        $this->id = $id;
        $select_producto= $this->conexion -> prepare("SELECT * FROM productos WHERE id = $this->id");
        $select_producto->execute();
        $mData = array();

        if (!$select_producto) {
            /* No conviene mostrar errores internos en producción*/
            $mData["error"] = "Error de consulta de ejecución, porque: " . $this->conexion->errorInfo()[2];
        } else {
            while ($row = $select_producto->fetch(PDO::FETCH_ASSOC)) {
                $mData[] = $row;
            }
        }
        return $mData;
    }

    public function selectProducto()
    {

        $select = $this->conexion->prepare('SELECT * FROM productos');
        $select->execute();
        $mData = array();

        if (!$select) {
            /* No conviene mostrar errores internos en producción*/
            $mData["error"] = "Error de consulta de ejecución, porque: " . $this->conexion->errorInfo()[2];
        } else {
            while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
                $mData[] = $row;
            }
        }
        return $mData;
    }

    public function insertarDatos($nom, $cant, $pre)
    {
        $this->nombre = $nom;
        $this->cantidad = $cant;
        $this->precio = $pre;

        $insert = $this->conexion->prepare("INSERT INTO productos(nombre,cantidad,precio) VALUES (?, ?, ?)");
        // $this->id = $this->conexion->lastInsertId();

        $insert->bindParam(1, $this->nombre);
        $insert->bindParam(2, $this->cantidad);
        $insert->bindParam(3, $this->precio);

        if ($insert->execute()) {
            $lastInsertId = $this->conexion->lastInsertId();
        } else {
            $lastInsertId = 0;
            echo $insert->errorInfo()[2];
        }

        // $insert-> close();
        return  $lastInsertId;
    }

    function updateDatos($nom, $cant, $pre) {
        $this->nombre = $nom;
        $this->cantidad = $cant;
        $this->precio = $pre;
    }
}
