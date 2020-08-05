<?php
include "BBDD/usuarios.php";
include "header.php";
?>

<main class="container-fluid d-flex flex-column justify-content-center align-items-center">
    <h1>Identificación Usuario</h1>
    <div class="usuarios d-flex justify-content-center align-items-center ">
        <form class="text-center w-100 p-2" method="post" action="" name="signin-form">
            <div class=" d-flex flex-column form-element py-4">
                <input type="text" class="p-2 mr-2 ml-2 text-center" name="username" placeholder="Ingresa su usuario" required />
            </div>
            <div class="d-flex flex-column form-element">
                <input type="password" class="p-2 mr-2 ml-2 text-center" name="password" placeholder="Ingresa su contraseña" required />
            </div>

            <div class="pt-2 botonesIden">
                <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
                    <button class="btn btn-primary" type="submit" name="login" value="login">Entrar</button>
                    <button class="btn btn-secondary" type="submit" name="login" value="login">Registrarse</button>
                </form>
            </div>
        </form>
    </div>
</main>

<?php
if (isset($_POST["login"]) && !empty($_POST["login"])) {
    $user = new Usuarios();
    $user->introducirUsuario($_POST["username"], $_POST["password"]);
}
?>

<?php
include "footer.php";
?>