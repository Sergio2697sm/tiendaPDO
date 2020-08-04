<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include "BBDD/productos.php";
    $productos = new productos();
    $allProducts = $productos->selectProducto();
    ?>

    <table>
        <tr>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Precio</th>
        </tr>
        <?php
        foreach ($allProducts as $product) {
        ?>
            <tr>
                <td><?= $product["nombre"] ?></td>
                <td><?= $product["cantidad"] ?></td>
                <td><?= $product["precio"] ?>€</td>
            </tr>
        <?php
        }
        ?>
    </table>

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
    if (isset($_POST["insertar"])) {
        $nuevo_producto = new productos();
        $nuevo_producto->insertarDatos($_POST["nombre"], $_POST["cantidad"], $_POST["precio"]);
    }
    ?>
</body>

</html>