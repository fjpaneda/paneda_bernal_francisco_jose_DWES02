<?php
    function obtener_letra_dni($dni){
        return strtoupper($dni[strlen($dni)-1]);
    }

    function obtener_numero_dni($dni){
        return rtrim($dni, $dni[strlen($dni)-1]);
    }

    function dni_formato($dni){
        $letra_dni = obtener_letra_dni($dni);
        $numero_dni = obtener_numero_dni($dni);
        return $numero_dni.$letra_dni;

    }

    function letra_nif($dni) {
        return substr("TRWAGMYFPDXBNJZSQVHLCKE",strtr($dni,"XYZ","012")%23,1);
    }

    function dni_correcto($dni){
        $letra_dni = obtener_letra_dni($dni);
        $letra = letra_nif(obtener_numero_dni($dni));
        if ($letra == $letra_dni) {
            return true;
        }
        return false;
    }

?>