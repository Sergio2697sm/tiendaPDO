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
    $verProductos = $productos->selectProducto();

    ?>

    <?php
        var_dump($verProductos);
    while ($row = $verProductos->fetch()) {
    ?>
        <p><? echo $row["nombre"] ?> </p>
        <p>
            <? echo $row["precio"] ?>
        </p>
        <p>
            <? echo $row["cantidad"] ?>
        </p>

    <?php
    }
    ?>

</body>

</html>