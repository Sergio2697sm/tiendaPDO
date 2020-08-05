<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/generar.css">

</head>

<body>
    <?php
    include "../header.php";
    include "../BBDD/productos.php";
    $productos = new productos();
    $allProducts = $productos->selectProducto();
    ?>
    <div class="container-fluid">
        <h1>Ver productos</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Modificar</th>
                    <th scope="col">Eliminar</th>

                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($allProducts as $product) {
                ?>
                    <tr>
                        <td scope="row"><?= $product["nombre"] ?></td>
                        <td scope="row"><?= $product["cantidad"] ?></td>
                        <td scope="row"><?= $product["precio"] ?>€</td>
                        <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
                            <input type="hidden" name="id" value="<?= $product["id"] ?>">
                            <td scope="row"><button>Modificar</button></td>
                        </form>
                        <td scope="row"><button>Eliminar</button></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <h1>Insertar productos</h1>

    <form action="<?= $_SERVER["PHP_SELF"] ?>" method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombre">
        <label>Cantidad:</label>
        <input type="number" name="cantidad">
        <label>Precio:</label>
        <input type="number" name="precio">
        <input type="submit" value="insertar Producto" name="insertar">
    </form>
    <?php
    //isset -> indica si el campo existe
    //empty ->  Determina si una variable está vacía
    if (isset($_POST["insertar"]) && !empty($_POST["insertar"])) {
        $nuevo_producto = new productos();
        $nuevo_producto->insertarDatos($_POST["nombre"], $_POST["cantidad"], $_POST["precio"]);
    }
    ?>

</body>

</html>