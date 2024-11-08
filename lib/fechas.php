<?php

/*
    fichero con varias funciones para el tratamiento de fechas
    alguna no se utiliza finalmente en la práctica, 
    pero sí las he usado en algún punto intermedio, y he decidido dejarlas
    a modo de "libreria" que puede ser reutilizada

*/

    //Esta función recibe una fecha y un valor entero como parametros 
    //y devuelve la fecha correspondiente a sumar o restar el valor entero
    //dependiendo de si se trata de un valor positivo o negativo
    function modificar_fecha($fecha, $duracion){

        if ($duracion > 0){
            $dura_str = "+ $duracion days";
        } 
        else {
            $dura_str = "- $duracion days";
        }
        return date("Y-m-d",strtotime($fecha.$dura_str));
    }

    //Esta función recibe una fecha y un valor entero como parametros 
    //y devuelve la fecha correspondiente a sumar los días correspondientes al valor recibido
    function suma_dias($fecha, $duracion){
            
        $dura_str = "+ $duracion days";
        return date("Y-m-d",strtotime($fecha.$dura_str));
        
    }

    //Esta función recibe una fecha y un valor entero como parametros 
    //y devuelve la fecha correspondiente a restar los días correspondientes al valor recibido
    function resta_dias($fecha, $duracion){
            
        $dura_str = "- $duracion days";
        return date("Y-m-d",strtotime($fecha.$dura_str));
    }
    //Esta función recibe una fecha como parametros
    //y devuelve true si la fecha es posterior al día actual,
    //y false en caso contrario
    function fecha_valida($fecha){
        $hoy = date("Y-m-d");
        if ($fecha > $hoy){
            return true;
        }
        return false;
    }
?>