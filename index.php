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
    $productos = productos::ningunDato();
    // $verProductos = $productos->selectProducto();
    $allProducts = $productos->selectProducto();

    // var_dump($allProducts);
    // foreach ($allProducts as $product) {
    //     echo "$product[nombre] $product[cantidad] $product[precio]\n";
    // }
    ?>

    <table>
        <tr>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Precio</th>
        </tr>
        <tr>
            <?php
            foreach ($allProducts as $product) {
            ?>
                <td><?= $product["nombre"] ?></td>
                <td><?= $product["cantidad"] ?></td>
                <td><?= $product["precio"] ?>€</td>
            <?php
            }
            ?>
        </tr>
    </table>
</body>

</html>