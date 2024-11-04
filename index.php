<?php
    session_start();
    require "lib/recursos.php";
    require "lib/fechas.php";

    $datos = array(
        'nombre' => array('valor'=> "", 'valido' => false),
        'apellido' => array('valor'=> "", 'valido' => false),
        'dni' => array('valor'=> "", 'valido' => false),
        'usuario_registrado' => false,
        'modelo' => array('valor'=> "",'imagen'=> "", 'disponible' => false),
        'fecha_inicio' => array('valor'=> "", 'valido' => false),
        'duracion' => array('valor'=> "", 'valido' => false)
    );

    if (isset($_POST['nombre']) && !empty($_POST['nombre'])){
        //nombre y apellido rellenados en el formulario
        $datos['nombre']['valor'] = $_POST['nombre'];
        $datos['nombre']['valido'] = true;

    }

    if (isset($_POST['apellido']) && !empty($_POST['apellido'])){
        $datos['apellido']['valor'] = $_POST['apellido'];
        $datos['apellido']['valido'] = true;
    }
    

    if (isset($_POST['dni']) && (!empty($_POST['dni']))){
        $datos['dni']['valor'] = $_POST['dni'];
        $datos['dni']['valido'] = dni_correcto($datos['dni']['valor']);
    }

    $datos['usuario_registrado'] = comprobar_registro($datos);
    
    if (isset($_POST['fecha'])){
        //comprobar que la fecha es posterior a la actual
        $datos['fecha_inicio']['valor'] = $_POST['fecha'];
        $datos['fecha_inicio']['valido'] = fecha_valida($fecha_alquiler);
    }

    if (isset($_POST['duracion'])){
        //comprobar que el valor es >=1 y <=30
        $datos['duracion']['valor'] = $_POST['duracion'];
        if ($$datos['duracion']['valor'] >= 1 && $datos['duracion']['valor'] <= 30){
            $datos['duracion']['valido'] = true;
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
                    $coche['fecha_fin'] = modificar_fecha($_POST['fecha'],$_POST['duracion']);
                }

            }
        }

    }

    function dni_correcto($dni){
        $letra_dni = strtoupper($dni[strlen($dni)-1]);
        $letra = letra_nif(rtrim($dni,$letra_dni));
        if ($letra == $letra_dni) {
            return true;
        }
        return false;
    }

    function comprobar_registro($datos_rellenados){
        foreach(USUARIOS as $usuario){
            if($datos_rellenados['nombre']['valor'] == $usuario['nombre'] && $datos_rellenados['apellido']['valor'] == $usuario['apellido'] && $datos_rellenados['dni']['valor'] == $usuario['dni']){
                return true;                
            }

        }
        return false;
    }

    function comprobar_datos(){
        
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
