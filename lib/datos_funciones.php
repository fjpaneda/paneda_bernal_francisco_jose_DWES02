<?php

    /*
        Fichero con las estructuras de datos y las funciones que he necesitado crear
    */


    $datos = array(
        'nombre' => array('valor'=> "", 'valido' => false),
        'apellido' => array('valor'=> "", 'valido' => false),
        'dni' => array('valor'=> "", 'valido' => false),
        'usuario_registrado' => false,
        'modelo' => "",
        'fecha_inicio' => array('valor'=> "", 'valido' => false),
        'duracion' => array('valor'=> "", 'valido' => false),
        'coche_alquilado' => false
    );


    //Esta función comprueba si un usuario está registrado o no, devuelve el valor booleano
    function comprobar_registro($datos_rellenados){
        foreach(USUARIOS as $usuario){
            if(strtoupper($datos_rellenados['nombre']['valor']) == strtoupper($usuario['nombre']) 
                && strtoupper($datos_rellenados['apellido']['valor']) == strtoupper($usuario['apellido']) 
                && $datos_rellenados['dni']['valor'] == $usuario['dni']){
                return true;                
            }

        }
        return false;
    }

    //Esta función comprueba si un coche está disponible.
    //En tal caso cambia los valores en el array coches correspondiente al vehículo,
    //introduciendo la fecha de inicio y fin del alquiler, y cambiando la disponibilidad y devuelve true.
    //Si no está disponible no cambia ningún dato y devuelve el valor false
    
    function alquilar_coche($dato){

        global $coches;
        if ($dato['usuario_registrado'] && $dato['fecha_inicio']['valido'] && $dato['duracion']['valido']){
        foreach ($coches as $key => $coche) {
            if ($dato['modelo'] == $coche['id']){
                if($coche['disponible']){
                    ////hay que modificar el coche del array
                    $coche['disponible'] = false;
                    $coche['fecha_inicio'] = $_POST['fecha'];
                    $coche['fecha_fin'] = modificar_fecha($_POST['fecha'],$_POST['duracion']);
                    $coches[$key] = $coche;
                    return true;
                }

            }
        }
        return false;}
    }

?>