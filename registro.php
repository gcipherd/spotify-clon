<?php
    include("includes/config.php");
    include("includes/clases/Cuenta.php");
    include("includes/clases/Constantes.php");
    $cuenta = new Cuenta($con);
    include("includes/handlers/registro-handler.php");
    include("includes/handlers/login-handler.php");

    function obtenerValorEntrada($nombre) { //Recuerda los valores ingresados previamente, si es que hubo error la primera vez.
        if(isset($_POST[$nombre])) {
            echo $_POST[$nombre];
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Spotify (Clon)</title>
</head>
<body>
    <div id="inputContenedor">
        <form id="loginFormulario" action="registro.php" method="POST">
            <h2>Accede a tu cuenta</h2>
            <p>
                <?php echo $cuenta->obtenerError(Constantes::$loginFallo); ?>
                <label for="loginUsuario">Usuario: </label>
                <input id="loginUsuario" name="loginUsuario" type="text" placeholder="p. ej. bartSimpson" required>
            </p>
            <p>
                <label for="loginContrasenna">Contraseña: </label>
                <input id="loginContrasenna" name="loginContrasenna" type="password" placeholder="Tu contraseña" required>
            </p>
            <button type="submit" name="loginBoton">Iniciar sesión</button>
        </form>

        <form id="registroFormulario" action="registro.php" method="POST">
            <h2>¡Crea una cuenta gratis!</h2>
            <p>
                <?php echo $cuenta->obtenerError(Constantes::$usuarioCaracteres); ?>
                <?php echo $cuenta->obtenerError(Constantes::$usuarioYaExiste); ?>
                <label for="usuario">Usuario: </label>
                <input id="usuario" name="usuario" type="text" placeholder="p. ej. bartSimpson" value="<?php obtenerValorEntrada('usuario') ?>" required>
            </p>
            <p>
                <?php echo $cuenta->obtenerError(Constantes::$nombreCaracteres); ?>
                <label for="nombre">Nombre: </label>
                <input id="nombre" name="nombre" type="text" placeholder="p. ej. Bart" value="<?php obtenerValorEntrada('nombre') ?>" required>
            </p>
            <p>
                <?php echo $cuenta->obtenerError(Constantes::$apellidoCaracteres); ?>
                <label for="apellido">Apellido Paterno: </label>
                <input id="apellido" name="apellido" type="text" placeholder="p. ej. Simpson" value="<?php obtenerValorEntrada('apellido') ?>" required>
            </p>
            <p>
                <?php echo $cuenta->obtenerError(Constantes::$correosNoConcuerdan); ?>
                <?php echo $cuenta->obtenerError(Constantes::$correoInvalido); ?>
                <?php echo $cuenta->obtenerError(Constantes::$correoYaExiste); ?>
                <label for="email">Correo electrónico </label>
                <input id="email" name="email" type="email" placeholder="p. ej. bartSimpson@gmail.com" value="<?php obtenerValorEntrada('email') ?>" required>
            </p>
            <p>
                <label for="email2">Confirme su correo: </label>
                <input id="email2" name="email2" type="email" placeholder="p. ej. bartSimpson@gmail.com" required>
            </p>
            <p>
                <?php echo $cuenta->obtenerError(Constantes::$contrasennasNoConcuerdan); ?>
                <?php echo $cuenta->obtenerError(Constantes::$contrasennaNoAlfanumerico); ?>
                <?php echo $cuenta->obtenerError(Constantes::$contrasennaCaracteres); ?>
                <label for="contrasenna">Contraseña: </label>
                <input id="contrasenna" name="contrasenna" type="password" placeholder="Tu contraseña" required>
            </p>
            <p>
                <label for="contrasenna2">Confirme su contraseña: </label>
                <input id="contrasenna2" name="contrasenna2" type="password" placeholder="Tu contraseña" required>
            </p>
            <button type="submit" name="registroBoton">Registrar cuenta</button>
        </form>
    </div>
</body>
</html>