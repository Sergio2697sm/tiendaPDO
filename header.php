<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<header>
    <h1 class="text-center"><img src="/TiendaPDO/imagenes/logo.png" alt="logo"></h1>
    <?php
    if ($_SESSION) {
    ?>
        <nav class="navbar navbar-expand-sm d-flex justify-content-center align-items-center">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">Link 3</a>
                </li>
            </ul>
        </nav>
    <?php
    }
    ?>
</header>