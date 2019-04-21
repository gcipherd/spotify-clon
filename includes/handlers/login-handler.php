<?php
    if(isset($_POST['loginBoton'])) {
        //El botón de iniciar sesión fue presionado
        $usuario = $_POST['loginUsuario'];
        $contrasenna = $_POST['loginContrasenna'];

        $resultado = $cuenta->login($usuario, $contrasenna);

        if($resultado) {
            $_SESSION['usuarioLogueado'] = $usuario;
            header("Location: index.php");
        }
    }
?>