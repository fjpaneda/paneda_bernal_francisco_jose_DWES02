<?php
    require "lib/fechas.php";
    require "lib/recursos.php";


    echo ("Introduce un nombre: ");
    $nombre = rtrim(fgets(STDIN),"\n");
    if (isset($nombre) && !empty($nombre)){
        echo "1\n";
    }
    else{echo("2\n");}


    // function modificar_fecha($fecha, $duracion){

    //     if ($duracion > 0){
    //         $dura_str = "+ $duracion days";
    //     } 
    //     else {
    //         $dura_str = "- $duracion days";
    //     }
    //     return date("Y-m-d",strtotime($fecha.$dura_str));
    // }


    // function suma_dias($fecha, $duracion){
            
    //     $dura_str = "+ $duracion days";
    //     return date("Y-m-d",strtotime($fecha.$dura_str));
        
    // }

    // function resta_dias($fecha, $duracion){
            
    //     $dura_str = "- $duracion days";
    //     return date("Y-m-d",strtotime($fecha.$dura_str));
    // }
        
    // function compare_dates($fecha){
    //     $hoy = date("Y-m-d");
    //     if ($fecha > $hoy){
    //         echo "la fecha es en el futuro\n";
    //     }
    //     elseif ($fecha < $hoy){
    //         echo "la fecha es en el pasado\n";
    //     }
    //     else {
    //         echo "la fecha es hoy\n";
    //     }
    // }



    // $hoy = date("Y-m-d");
    // //echo date("Y-m-d",strtotime($fecha."-10 days")),"\n";
    // echo ("Introduce la duracion: ");
    // //$duracion = fgets(STDIN);
    // $duracion = rtrim(fgets(STDIN),"\n");
    // // echo suma_dias($hoy, $duracion),"\n";
    // // echo compare_dates(suma_dias($hoy, $duracion));
    // // echo resta_dias($hoy, $duracion),"\n";
    // // echo compare_dates(resta_dias($hoy, $duracion));
    // echo fecha_valida(modificar_fecha($hoy, $duracion));
    
    // $datos = array(
    //     "nombre" => array("valor"=> "", "valido" => false),
    //     "apellido" => array("valor"=> "", "valido" => false),
    //     "dni" => array("valor"=> "", "valido" => false),
    //     "modelo" => array("valor"=> "", "disponible" => false),
    //     "fecha_inicio" => array("valor"=> "", "valido" => false),
    //     "duracion" => array("valor"=> "", "valido" => false)
    // );

    // $datos["nombre"]["valido"]= true;

    // var_dump($datos);

    // echo "Introduce el dni: ";
    // $dni = rtrim(fgets(STDIN),"\n");

    //$dni = rtrim($dni_usuario,"\n");
    
    // if (empty($dni)){
    //     echo "El dni esta vacio\n";
    // }

    // if (dni_correcto($dni)){
    //     echo "El dni es correcto\n";
    // }
    // else {
    //     echo "el dni es incorrecto\n";
    // }
   
    // function dni_correcto($dni){
    //     $letra_dni = strtoupper($dni[strlen($dni)-1]);
    //     $letra = letra_nif(rtrim($dni,$letra_dni));
    //     if ($letra == $letra_dni) {
    //         return true;
    //     }
    //     return false;
    // }


?>