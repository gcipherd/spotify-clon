<?php
    class Cuenta {
        private $listaErrores;
        private $con;

        public function __construct($con) {
            $this->listaErrores = array();
            $this->con = $con;
        }

        public function login($usuario, $contrasenna) {
            $contrasenna = md5($contrasenna);

            $query = mysqli_query($this->con, "SELECT * FROM usuario WHERE usuario = '$usuario' AND contrasenna = '$contrasenna'");
            if(mysqli_num_rows($query) == 1) {
                return true;
            } else {
                array_push($this->listaErrores, Constantes::$loginFallo);
                return false;
            }
        }

        public function registrar($usuario, $nombre, $apellido, $email, $email2, $contrasenna, $contrasenna2) {
            $this->validarUsuario($usuario);
            $this->validarNombre($nombre);
            $this->validarApellido($apellido);
            $this->validarCorreos($email, $email2);
            $this->validarContrasennas($contrasenna, $contrasenna2);

            if (empty($this->listaErrores)) {
                //Insertar a la BD
                return $this->insertarDetallesUsuario($usuario, $nombre, $apellido, $email, $contrasenna);
            } else {
                return false;
            }
        }

        public function obtenerError($error) {
            if(!in_array($error, $this->listaErrores)) {
                $error = "";
            }
            return "<span class='mensajeError'>$error</span>";
        }

        private function insertarDetallesUsuario($usuario, $nombre, $apellido, $email, $contrasenna) {
            $contrasennaEncriptada = md5($contrasenna);
            $fotoPerfil = "assets/imagenes/fotos-perfil/head_emerald.png";
            $fecha = date("Y-m-d");

            $resultado = mysqli_query($this->con, "INSERT INTO usuario VALUES('', '$usuario', '$nombre', '$apellido', '$email', '$contrasennaEncriptada', '$fecha', '$fotoPerfil')");
            return $resultado;
        }

        private function validarUsuario($usuario) {
            if (strlen($usuario) > 25 || strlen($usuario) < 5) {
                array_push($this->listaErrores, Constantes::$usuarioCaracteres);
                return;
            }
            $checarUsuarioQuery = mysqli_query($this->con, "SELECT usuario FROM usuario WHERE usuario='$usuario'");
            if(mysqli_num_rows($checarUsuarioQuery) != 0) {
                array_push($this->listaErrores, Constantes::$usuarioYaExiste);
                return;
            }
        }
    
        private function validarNombre($nombre) {
            if (strlen($nombre) > 25 || strlen($nombre) < 2) {
                array_push($this->listaErrores, Constantes::$nombreCaracteres);
                return;
            }
        }
    
        private function validarApellido($apellido) {
            if (strlen($apellido) > 25 || strlen($apellido) < 2) {
                array_push($this->listaErrores, Constantes::$apellidoCaracteres);
                return;
            }
        }
    
        private function validarCorreos($email, $email2) {
            if($email != $email2) {
                array_push($this->listaErrores, Constantes::$correosNoConcuerdan);
                return;
            }
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($this->listaErrores, Constantes::$correoInvalido);
                return;
            }
            $checarCorreoQuery = mysqli_query($this->con, "SELECT email FROM usuario WHERE email='$email'");
            if(mysqli_num_rows($checarCorreoQuery) != 0) {
                array_push($this->listaErrores, Constantes::$correoYaExiste);
                return;
            }
            
        }
    
        private function validarContrasennas($contrasenna, $contrasenna2) {
            if($contrasenna != $contrasenna2) {
                array_push($this->listaErrores, Constantes::$contrasennasNoConcuerdan);
                return;
            }
            if (preg_match('/[^A-Za-z0-9]/', $contrasenna)) { //valida a través de expresiones regulares que solo haya caracteres alfanuméricos
                array_push($this->listaErrores, Constantes::$contrasennaNoAlfanumerico);
                return;
            }
            if (strlen($contrasenna) > 30 || strlen($contrasenna) < 8) {
                array_push($this->listaErrores, Constantes::$contrasennaCaracteres);
                return;
            }
        }
    }
?>