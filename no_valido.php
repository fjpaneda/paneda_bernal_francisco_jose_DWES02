<?php
    session_start();

    $nombre = $_SESSION['datos']['nombre']['valor']; 
    $apellido = $_SESSION['datos']['apellido']['valor'];
    $dni = $_SESSION['datos']['dni']['valor'];
    $fecha_inicio = $_SESSION['datos']['fecha_inicio']['valor'];
    $duracion = $_SESSION['datos']['duracion']['valor'];


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario no válido</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Reserva no realizada</h1>
    <br>
    <?php

        //Se presentan en pantalla los datos recibidos del formulario
        //Si son erroneos o están vacíos aparecen en rojo
        //Si son correctos aparecen en verde
        
        if(empty($nombre)){
            echo("<h3 class = \"no_valido\"> El nombre de usuario está vacío</h3><br>");
        }
        elseif (!($_SESSION['datos']['nombre']['valido'])){
            echo("<h3 class = \"no_valido\"> $nombre</h3><br>");
        }
        else{
            echo("<h3 class = \"valido\"> $nombre</h3><br>");
        }

        if(empty($apellido)){
            echo("<h3 class = \"no_valido\"> El apellido de usuario está vacío</h3><br>");
        }
        elseif (!($_SESSION['datos']['apellido']['valido'])){
            echo("<h3 class = \"no_valido\"> $apellido</h3><br>");
        }
        else{
            echo("<h3 class = \"valido\"> $apellido</h3><br>");
        }

        if(empty($dni)){
            echo("<h3 class = \"no_valido\"> El dni de usuario está vacío</h3><br>");
        }
        elseif (!($_SESSION['datos']['dni']['valido'])){
            echo("<h3 class = \"no_valido\"> $dni</h3><br>");
        }
        else{
            echo("<h3 class = \"valido\"> $dni</h3><br>");
        }

        if(!$_SESSION['datos']['usuario_registrado']){
            echo("<h3 class = \"no_valido\"> El usuario no está registrado</h3><br>");
        }

        if(empty($_SESSION['datos']['modelo'])){
            echo("<h3 class = \"no_valido\"> El modelo de vehículo está vacío</h3><br>");
        }

        if(empty($fecha_inicio)){
            echo("<h3 class = \"no_valido\"> La fecha de inicio está vacía</h3><br>");
        }
        elseif (!($_SESSION['datos']['fecha_inicio']['valido'])){
            echo("<h3 class = \"no_valido\"> $fecha_inicio</h3><br>");
        }
        else{
            echo("<h3 class = \"valido\"> $fecha_inicio</h3><br>");
        }

        if(empty($duracion)){
            echo("<h3 class = \"no_valido\"> La duracion está vacía</h3><br>");
        }
        elseif (!($_SESSION['datos']['duracion']['valido'])){
            echo("<h3 class = \"no_valido\"> $duracion</h3><br>");
        }
        else{
            echo("<h3 class = \"valido\"> $duracion</h3><br>");
        }

        if(!$_SESSION['datos']['coche_alquilado']){
            echo("<h3 class = \"no_valido\"> El vehículo no está disponible</h3><br>");
        }       

    ?>
    
</body>
</html>