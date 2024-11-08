<?php
    //Fichero con algunas funciones relacionadas con operaciones relativas al dni

    //Esta funcion recibe un dni completo (números y letra) como parámetro y devuelve su letra en mayuscula
    function obtener_letra_dni($dni){
        return strtoupper($dni[strlen($dni)-1]);
    }

    //Esta funcion recibe un dni completo (números y letra) como parámetro y devuelve sus números
    function obtener_numero_dni($dni){
        return rtrim($dni, $dni[strlen($dni)-1]);
    }

    //Esta funcion recibe un dni completo (numeros y letra) como parámetro y devuelve el mismo dni completo con la letra siempre en mayuscula
    function dni_formato($dni){
        $letra_dni = obtener_letra_dni($dni);
        $numero_dni = obtener_numero_dni($dni);
        return $numero_dni.$letra_dni;

    }

    //Esta funcion recibe los numeros de un dni como parámetro y devuelve la letra que le corresponde
    function letra_nif($dni) {
        return substr("TRWAGMYFPDXBNJZSQVHLCKE",strtr($dni,"XYZ","012")%23,1);
    }

    //Esta funcion recibe un dni completo (numeros y letra) como parámetro y 
    //devuelve el valor booleano correspondiente a si los números y la letra 
    //son correctos
    
    function dni_correcto($dni){
        $letra_dni = obtener_letra_dni($dni);
        $letra = letra_nif(obtener_numero_dni($dni));
        if ($letra == $letra_dni) {
            return true;
        }
        return false;
    }

?>