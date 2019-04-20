<?php
    function sanitizarUsuarioFormulario($textoEntrada) {
        $textoEntrada = strip_tags($textoEntrada); //Elimina posibles etiquetas que pueda haber.
        $textoEntrada = str_replace(" ", "", $textoEntrada); //Reemplaza espacios en blanco con una cadena vacía.
        return $textoEntrada;
    }  

    function sanitizarContrasennaFormulario($textoEntrada) {
        $textoEntrada = strip_tags($textoEntrada);
        return $textoEntrada;
    }

    function sanitizarCadenaFormulario($textoEntrada) {
        $textoEntrada = strip_tags($textoEntrada); 
        $textoEntrada = str_replace(" ", "", $textoEntrada); 
        $textoEntrada = ucfirst(strtolower($textoEntrada)); // Capitaliza la primer letra de la cadena.
        return $textoEntrada;
    }

    if(isset($_POST['registroBoton'])) {
        //El botón de registro fue presionado
        $usuario = sanitizarUsuarioFormulario($_POST['usuario']);
        $nombre = sanitizarCadenaFormulario($_POST['nombre']);
        $apellido = sanitizarCadenaFormulario($_POST['apellido']);
        $email = sanitizarCadenaFormulario($_POST['email']);
        $email2 = sanitizarCadenaFormulario($_POST['email2']);
        $contrasenna = sanitizarContrasennaFormulario($_POST['contrasenna']);
        $contrasenna2 = sanitizarContrasennaFormulario($_POST['contrasenna2']);

        $fueExitoso = $cuenta->registrar($usuario, $nombre, $apellido, $email, $email2, $contrasenna, $contrasenna2);
        if ($fueExitoso) {
            header("Location: index.php"); //Te envía a index.php
        }
    }
?>