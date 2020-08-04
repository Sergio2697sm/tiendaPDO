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
        $insert->bindParam(1, $this->nombre);
        $insert->bindParam(2, $this->cantidad);
        $insert->bindParam(3, $this->precio);

        $resultado = $insert->execute();

        if ($resultado == 1) {
            echo "Producto regitrado con exito";
        } else {
            echo "Error al registrar el producto";
        }
    }
}
