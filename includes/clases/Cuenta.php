<?php
    class Cuenta {
        private $listaErrores;

        public function __construct() {
            $this->listaErrores = array();
        }

        public function registrar($usuario, $nombre, $apellido, $email, $email2, $contrasenna, $contrasenna2) {
            $this->validarUsuario($usuario);
            $this->validarNombre($nombre);
            $this->validarApellido($apellido);
            $this->validarCorreos($email, $email2);
            $this->validarContrasennas($contrasenna, $contrasenna2);

            if (empty($this->listaErrores)) {
                //Insertar a la BD
                return true;
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

        private function validarUsuario($usuario) {
            if (strlen($usuario) > 25 || strlen($usuario) < 5) {
                array_push($this->listaErrores, Constantes::$usuarioCaracteres);
                return;
            }
            //TODO: Checar que no exista el nombre de usuario
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
            //TODO: checar que no exista el correo
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