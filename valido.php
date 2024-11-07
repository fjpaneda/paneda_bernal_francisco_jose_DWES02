<?php

    session_start();
    //case $_SESSION
    $nombre = $_SESSION['datos']['nombre']['valor'];
    $apellido = $_SESSION['datos']['apellido']['valor'];

    switch ($_SESSION['datos']['modelo']){
        case 1: 
            $imagen = "img/stratos.AVIF";
            break;
        case 2:
            $imagen = "img/audi.WEBP";
            break;
        case 3:
            $imagen = "img/scort.JPG";
            break;
        case 4:
            $imagen = "img/impreza.JPG";
            break;
    }
    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2><?php echo ("$nombre $apellido");?></h2>
    <img src="<?=$imagen?>" width="480" height="380"/>
</body>
</html>