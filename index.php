<?php
    require "recursos.php";

    if (isset($_POST['nombre']) && isset($_POST['apellidos'])){
        //nombre y apellidos rellenados en el formulario
    }

    if (isset($_POST['dni'])){
        //comprobar que el dni es correcto
    }
    if (isset($_POST['modelo'])){
        //comprobar que el modelo esta seleccionado
    }

    if (isset($_POST['fecha'])){
        //comprobar que la fecha es posterior a la actual
    }

    if (isset($_POST['duracion'])){
        //comprobar que el valor es >=1 y <=30
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
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre del usuario">
            <br>
            <label for="apellidos">Apellidos: </label>
            <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos del usuario">
            <br>
            <label for="dni">DNI: </label>
            <input type="text" name="dni" id="dni" placeholder="12345678A">
            <br>
            <label for="modelo">Modelo: </label>
            <select name="modelo" id="modelo">
                <option value="" disabled selected hidden>Escoge un vehículo...</option>
                <option value="Lancia Stratos">Lancia Stratos</option>
                <option value="Audi Quattro">Audi Quattro</option>
                <option value="Ford Escort RS1800">Ford Escort RS1800</option>
                <option value="Subaru Impreza 555">Subaru Impreza 555</option>
            </select>
            <br>
            <label for="fecha">Fecha de Inicio de la Reserva</label>
            <input type="date" name="fecha" id="fecha">
            <br>
            <label for="duracion">Duración de la Reserva (en días): </label>
            <input type="number" name="duracion" id="duracion" placeholder="Días de reserva entre 1 y 30" size = 30 >
            <br>
            <input type="submit" value="Enviar">
        </form>    
    </body>
</html>
