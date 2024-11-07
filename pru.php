<?php
    $hola = "HOLA";
    $adios = "ADIOS";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documento de prueba</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <p>
        <?php if($hola == "HOLA"){ 
            echo "<p class = \"valido\"> $adios</p> ";
            //echo $adios; 
        }?>
        <?php if($hola != "OLA"){ 
            echo "<p class = \"no_valido\"> $hola</p> ";
            //echo $adios; 
        }?>
    </p>
</body>
</html>