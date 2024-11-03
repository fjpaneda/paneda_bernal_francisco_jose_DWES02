<?php
    require "lib/recursos.php";
    require "lib/fechas.php";

    if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['dni'])){
        //nombre y apellido rellenados en el formulario
        $nombre_usuario = $_POST['nombre'];
        $apellido_usuario = $_POST['apellido'];
        $dni_usuario = $_POST['dni'];
        $usuario_valido = false;
        foreach (USUARIOS as $usuario){
            if ($nombre_usuario == $usuario['nombre'] && $apellido_usuario == $usuario['apellido'] && $dni_usuario == $usuario['dni']){
                $usuario_valido = true;
                break;
            }
        }
    }
    

    if (isset($_POST['dni'])){
        //comprobar que el dni es correcto
        $dni_correcto = false;
        $dni_usuario = $_POST['dni'];
        $numero_dni = rtrim($dni_usuario,$dni_usuario[strlen($dni_usuario)-1]);
        $letra = letra_nif($numero_dni);
        if ($letra == $dni_usuario[strlen($dni_usuario)-1]){
            $dni_correcto = true;
        }
    }
    
    if (isset($_POST['modelo'])){
        $modelo_elegido = $_POST['modelo'];
        //comprobar que el modelo esta seleccionado
        foreach ($coches as $coche) {
            if ($modelo_elegido == $coche['modelo']){
                if($coche['disponible']){
                    $coche['disponible'] = false;
                    $coche['fecha_inicio'] = $_POST['fecha'];
                    $coche['fecha_fin'] = $_POST['fecha'] + $_POST['duracion'];
                }

            }
        }

    }

    if (isset($_POST['fecha'])){
        //comprobar que la fecha es posterior a la actual
        $fecha_alquiler = $_POST['fecha'];
        $fecha_actual = date('Y-m-d');
        $fecha_valida = fecha_valida($fecha_alquiler);
    }

    if (isset($_POST['duracion'])){
        //comprobar que el valor es >=1 y <=30
        $duracion_valida = true;
        $dias = $_POST['duracion'];
        if ($dias < 1 || $dias >30){
            $duracion_valida = false;
        }
    }

    
?>




<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        
    </head>
    
    <body>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre del usuario">
            <br>
            <label for="apellido">Apellido: </label>
            <input type="text" name="apellido" id="apellido" placeholder="Apellido del usuario">
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
