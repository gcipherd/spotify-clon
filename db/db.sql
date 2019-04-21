CREATE DATABASE spotify;
USE spotify;

CREATE TABLE usuario (
    idUsuario INT NOT NULL AUTO_INCREMENT,
    usuario VARCHAR(25) NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    email VARCHAR(200) NOT NULL,
    contrasenna VARCHAR(32) NOT NULL,
    fechaRegistro DATETIME NOT NULL,
    fotoPerfil VARCHAR(500) NOT NULL,

    CONSTRAINT pkUsuario
    PRIMARY KEY(idUsuario)
);
