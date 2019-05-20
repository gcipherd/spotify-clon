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

CREATE TABLE artista (
    idArtista INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(25) NOT NULL,

    CONSTRAINT pkArtista
    PRIMARY KEY(idArtista)
);

CREATE TABLE genero (
    idGenero INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,

    CONSTRAINT pkGenero
    PRIMARY KEY(idGenero)
);

CREATE TABLE album (
    idAlbum INT NOT NULL AUTO_INCREMENT,
    titulo VARCHAR(250) NOT NULL,
    idArtista INT NOT NULL,
    idGenero INT NOT NULL,
    portada VARCHAR(500) NOT NULL,

    CONSTRAINT pkAlbum
    PRIMARY KEY(idAlbum),

    CONSTRAINT fkAlbumArtista
    FOREIGN KEY(idArtista)
    REFERENCES artista(idArtista),

    CONSTRAINT fkAlbumGenero
    FOREIGN KEY(idGenero)
    REFERENCES genero(idGenero)
);

CREATE TABLE cancion (
    idCancion INT NOT NULL AUTO_INCREMENT,
    titulo VARCHAR(250) NOT NULL,
    idArtista INT NOT NULL,
    idAlbum INT NOT NULL,
    idGenero INT NOT NULL,
    duracion VARCHAR(8) NOT NULL,
    direccion VARCHAR(500) NOT NULL,
    ordenAlbum INT NOT NULL,
    reproducciones INT NOT NULL,

    CONSTRAINT pkCancion
    PRIMARY KEY(idCancion),

    CONSTRAINT fkCancionArtista
    FOREIGN KEY(idArtista)
    REFERENCES artista(idArtista),

    CONSTRAINT fkCancionAlbum
    FOREIGN KEY(idAlbum)
    REFERENCES album(idAlbum),

    CONSTRAINT fkCancionGenero
    FOREIGN KEY(idGenero)
    REFERENCES genero(idGenero)
);

-- Inserciones de ejemplo:

INSERT INTO artista VALUES (NULL, 'Mickey Mouse');
INSERT INTO artista VALUES (NULL, 'Goofy');
INSERT INTO artista VALUES (NULL, 'Bart Simpson');
INSERT INTO artista VALUES (NULL, 'Homero Simpson');
INSERT INTO artista VALUES (NULL, 'Bruce Lee');

INSERT INTO genero VALUES (NULL, 'Rock');
INSERT INTO genero VALUES (NULL, 'Pop');
INSERT INTO genero VALUES (NULL, 'Hip-Hop');
INSERT INTO genero VALUES (NULL, 'Rap');
INSERT INTO genero VALUES (NULL, 'R & B');
INSERT INTO genero VALUES (NULL, 'Música Clásica');
INSERT INTO genero VALUES (NULL, 'Techno');
INSERT INTO genero VALUES (NULL, 'Jazz');
INSERT INTO genero VALUES (NULL, 'Folk');
INSERT INTO genero VALUES (NULL, 'Country');

INSERT INTO album VALUES (NULL, 'Bacon & Eggs', 2, 4, 'assets/imagenes/portadas/clearday.jpg');
INSERT INTO album VALUES (NULL, 'Pizzahead', 5, 10, 'assets/imagenes/portadas/energy.jpg');
INSERT INTO album VALUES (NULL, 'Summer Hits', 3, 1, 'assets/imagenes/portadas/goinghigher.jpg');
INSERT INTO album VALUES (NULL, 'The movie soundtrack', 2, 9, 'assets/imagenes/portadas/funkyelement.jpg');
INSERT INTO album VALUES (NULL, 'Best of the Worst', 1, 3, 'assets/imagenes/portadas/popdance.jpg');
INSERT INTO album VALUES (NULL, 'Hello World', 3, 6, 'assets/imagenes/portadas/ukulele.jpg');
INSERT INTO album VALUES (NULL, 'Best beats', 4, 7, 'assets/imagenes/portadas/sweet.jpg');

INSERT INTO cancion VALUES (NULL, 'Acoustic Breeze', 1, 1, 8, '2:37', 'assets/musica/bensound-acousticbreeze.mp3', 1, 0);
INSERT INTO cancion VALUES (NULL, 'A new beginning', 1, 5, 1, '2:35', 'assets/musica/bensound-anewbeginning.mp3', 2, 0);
INSERT INTO cancion VALUES (NULL, 'Better Days', 1, 5, 2, '2:33', 'assets/musica/bensound-betterdays.mp3', 3, 0);
INSERT INTO cancion VALUES (NULL, 'Buddy', 1, 5, 3, '2:02', 'assets/musica/bensound-buddy.mp3', 4, 0);
INSERT INTO cancion VALUES (NULL, 'Clear Day', 1, 5, 4, '1:29', 'assets/musica/bensound-clearday.mp3', 5, 0);
INSERT INTO cancion VALUES (NULL, 'Going Higher', 2, 1, 1, '4:04', 'assets/musica/bensound-goinghigher.mp3', 1, 0);
INSERT INTO cancion VALUES (NULL, 'Funny Song', 2, 4, 2, '3:07', 'assets/musica/bensound-funnysong.mp3', 2, 0);
INSERT INTO cancion VALUES (NULL, 'Funky Element', 2, 1, 3, '3:08', 'assets/musica/bensound-funkyelement.mp3', 2, 0);
INSERT INTO cancion VALUES (NULL, 'Extreme Action', 2, 1, 4, '8:03', 'assets/musica/bensound-extremeaction.mp3', 3, 0);
INSERT INTO cancion VALUES (NULL, 'Epic', 2, 4, 5, '2:58', 'assets/musica/bensound-epic.mp3', 3, 0);
INSERT INTO cancion VALUES (NULL, 'Energy', 2, 1, 6, '2:59', 'assets/musica/bensound-energy.mp3', 4, 0);
INSERT INTO cancion VALUES (NULL, 'Dubstep', 2, 1, 7, '2:03', 'assets/musica/bensound-dubstep.mp3', 5, 0);
INSERT INTO cancion VALUES (NULL, 'Happiness', 3, 6, 8, '4:21', 'assets/musica/bensound-happiness.mp3', 5, 0);
INSERT INTO cancion VALUES (NULL, 'Happy Rock', 3, 6, 9, '1:45', 'assets/musica/bensound-happyrock.mp3', 4, 0);
INSERT INTO cancion VALUES (NULL, 'Jazzy Frenchy', 3, 6, 10, '1:44', 'assets/musica/bensound-jazzyfrenchy.mp3', 3, 0);
INSERT INTO cancion VALUES (NULL, 'Little Idea', 3, 6, 1, '2:49', 'assets/musica/bensound-littleidea.mp3', 2, 0);
INSERT INTO cancion VALUES (NULL, 'Memories', 3, 6, 2, '3:50', 'assets/musica/bensound-memories.mp3', 1, 0);
INSERT INTO cancion VALUES (NULL, 'Moose', 4, 7, 1, '2:43', 'assets/musica/bensound-moose.mp3', 5, 0);
INSERT INTO cancion VALUES (NULL, 'November', 4, 7, 2, '3:32', 'assets/musica/bensound-november.mp3', 4, 0);
INSERT INTO cancion VALUES (NULL, 'Of Elias Dream', 4, 7, 3, '4:58', 'assets/musica/bensound-ofeliasdream.mp3', 3, 0);
INSERT INTO cancion VALUES (NULL, 'Pop Dance', 4, 7, 2, '2:42', 'assets/musica/bensound-popdance.mp3', 2, 0);
INSERT INTO cancion VALUES (NULL, 'Retro Soul', 4, 7, 5, '3:36', 'assets/musica/bensound-retrosoul.mp3', 1, 0);
INSERT INTO cancion VALUES (NULL, 'Sad Day', 5, 2, 1, '2:28', 'assets/musica/bensound-sadday.mp3', 1, 0);
INSERT INTO cancion VALUES (NULL, 'Sci-fi', 5, 2, 2, '4:44', 'assets/musica/bensound-scifi.mp3', 2, 0);
INSERT INTO cancion VALUES (NULL, 'Slow Motion', 5, 2, 3, '3:26', 'assets/musica/bensound-slowmotion.mp3', 3, 0);
INSERT INTO cancion VALUES (NULL, 'Sunny', 5, 2, 4, '2:20', 'assets/musica/bensound-sunny.mp3', 4, 0);
INSERT INTO cancion VALUES (NULL, 'Sweet', 5, 2, 5, '5:07', 'assets/musica/bensound-sweet.mp3', 5, 0);
INSERT INTO cancion VALUES (NULL, 'Tenderness ', 3, 3, 7, '2:03', 'assets/musica/bensound-tenderness.mp3', 4, 0);
INSERT INTO cancion VALUES (NULL, 'The Lounge', 3, 3, 8, '4:16', 'assets/musica/bensound-thelounge.mp3 ', 3, 0);
INSERT INTO cancion VALUES (NULL, 'Ukulele', 3, 3, 9, '2:26', 'assets/musica/bensound-ukulele.mp3 ', 2, 0);
INSERT INTO cancion VALUES (NULL, 'Tomorrow', 3, 3, 1, '4:54', 'assets/musica/bensound-tomorrow.mp3 ', 1, 0);