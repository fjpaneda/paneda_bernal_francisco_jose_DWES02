<?php
    function modificar_fecha($fecha, $duracion){

        if ($duracion > 0){
            $dura_str = "+ $duracion days";
        } 
        else {
            $dura_str = "- $duracion days";
        }
        return date("Y-m-d",strtotime($fecha.$dura_str));
    }

    function suma_dias($fecha, $duracion){
            
        $dura_str = "+ $duracion days";
        return date("Y-m-d",strtotime($fecha.$dura_str));
        
    }

    function resta_dias($fecha, $duracion){
            
        $dura_str = "- $duracion days";
        return date("Y-m-d",strtotime($fecha.$dura_str));
    }
        
    function fecha_valida($fecha){
        $hoy = date("Y-m-d");
        if ($fecha > $hoy){
            return true;
        }
        return false;
    }
?>