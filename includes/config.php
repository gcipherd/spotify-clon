<?php
    ob_start();
    session_start(); //Inicia una sesión para mantener logueado al usuario a través de diferentes páginas del sitio.

    $zonaHoraria = date_default_timezone_set("America/Mexico_City");

    $con = mysqli_connect("localhost", "root", "", "spotify");
    if(mysqli_connect_errno()) {
        echo "Fallo al conectar: " . mysqli_connect_errno();
    }
?>