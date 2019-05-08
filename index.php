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
            <div id="barraReproduccionIzquierda">
                <div class="contenido">
                    <span class="albumLink">
                        <img src="http://clipart-library.com/img/2008830.jpg" alt="Album" class="portadaAlbum">
                    </span>
                    <div class="infoTrack">
                        <span class="nombreTrack">
                            <span>Canción ejemplo</span>
                        </span>
                        <span class="nombreArtista">
                            <span>Artista ejemplo</span>
                        </span>
                    </div>
                </div>
            </div>
            <div id="barraReproduccionCentro">
                <div class="contenido reproductorControles">
                    <div class="botones">
                        <button class="botonControl aleatorio" title="Botón de aleatorio">
                            <img src="assets/imagenes/iconos/shuffle.png" alt="Aleatorio">
                        </button>
                        <button class="botonControl anterior" title="Botón de anterior">
                            <img src="assets/imagenes/iconos/previous.png" alt="Anterior">
                        </button>
                        <button class="botonControl reproducir" title="Botón de reproducir">
                            <img src="assets/imagenes/iconos/play.png" alt="Reproducir">
                        </button>
                        <button class="botonControl pausa" title="Botón de pausa" style="display: none;">
                            <img src="assets/imagenes/iconos/pause.png" alt="Pausa">
                        </button>
                        <button class="botonControl siguiente" title="Botón de siguiente">
                            <img src="assets/imagenes/iconos/next.png" alt="Siguiente">
                        </button>
                        <button class="botonControl repetir" title="Botón de repetir">
                            <img src="assets/imagenes/iconos/repeat.png" alt="Repetir">
                        </button>
                    </div>

                    <div class="barraPlayback">
                        <span class="tiempoProgreso actual">0.00</span>
                        <div class="barraProgreso">
                            <div class="barraProgresoBg">
                                <div class="progreso"></div>
                            </div>
                        </div>
                        <span class="tiempoProgreso restante">0.00</span>
                    </div>
                </div>
            </div>
            <div id="barraReproduccionDerecha">
                <div class="barraVolumen">
                    <button class="botonControl volumen" title="Botón de volúmen">
                        <img src="assets/imagenes/iconos/volume.png" alt="Volúmen">
                    </button>
                    <div class="barraProgreso">
                        <div class="barraProgresoBg">
                            <div class="progreso"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>