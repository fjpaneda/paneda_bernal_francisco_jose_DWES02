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


    function alquilar_coche($dato){

        global $coches;
        if ($dato['usuario_registrado'] && $dato['fecha_inicio']['valido'] && $dato['duracion']['valido']){
        foreach ($coches as $coche) {
            if ($dato['modelo'] == $coche['id']){
                if($coche['disponible']){
                    $coche['disponible'] = false;
                    $coche['fecha_inicio'] = $_POST['fecha'];
                    $coche['fecha_fin'] = modificar_fecha($_POST['fecha'],$_POST['duracion']);
                    return true;
                }

            }
        }
        return false;}
    }

?>