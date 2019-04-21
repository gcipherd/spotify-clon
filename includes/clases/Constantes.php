<?php
    class Constantes {
        //Errores de registro
        public static $usuarioCaracteres = "Tu nombre de usuario debe tener entre 5 y 25 caracteres";
        public static $nombreCaracteres = "Tu nombre debe tener entre 2 y 25 caracteres";
        public static $apellidoCaracteres = "Tu apellido paterno debe tener entre 2 y 25 caracteres";
        public static $correosNoConcuerdan = "Tus correos no concuerdan";
        public static $correoInvalido = "El correo es inválido";
        public static $contrasennasNoConcuerdan = "Tus contraseñas no concuerdan";
        public static $contrasennaNoAlfanumerico = "Tu contraseña sólo puede contener letras y números";
        public static $contrasennaCaracteres = "Tu contraseña debe tener entre 8 y 30 caracteres";
        public static $usuarioYaExiste = "El nombre de usuario ya existe";
        public static $correoYaExiste = "El correo ingresado ya existe";
        
        //Errores de login
        public static $loginFallo = "Tu nombre de usuario o contraseña son incorrectos";
    }
?>