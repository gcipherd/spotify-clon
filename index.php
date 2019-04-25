<?php
    include("includes/config.php");
    //sesion_destroy(); //Descomentar para desloguear al usuario (se sustituirá después con una función).

    //Checa si el usuario está logueado, sino, lo envía a la página de registro.
    if(isset($_SESSION['usuarioLogueado'])) {
        $usuarioLogueado = $_SESSION['usuarioLogueado'];
    } else {
        header("Location: registro.php");
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Spotify (Clon)</title>
    <link rel="stylesheet" type="text/css" href="assets/css/estilo.css">
</head>
<body>
    <div id="barraReproduccionContenedor">
        <div id="barraReproduccion">
            <div id="barraReproduccionIzquierda"></div>
            <div id="barraReproduccionCentro"></div>
            <div id="barraReproduccionDerecha"></div>
        </div>
    </div>
</body>
</html>