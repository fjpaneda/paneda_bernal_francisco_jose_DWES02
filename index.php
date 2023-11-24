<?php

    function mayor_de_edad($fechaNacimiento){
      /*
      Esta función recibe como parámetro una fecha de nacimiento y comprueba
      si es mayor de edad (18 años) o no, devolviendo el valor booleano de esta condición.
      En caso de ser menor de edad añade en una variable global el texto del error
      */
      
      $ahora = new DateTime(date("Y-m-d"));
      $diferencia = $ahora->diff($fechaNacimiento);
      $edad = $diferencia->format("%y");
      global $errorNacimiento;
      if ($edad < 18){
        $errorNacimiento = "Eres menor de edad, tienes $edad años";
        return false;
      }
      return true ;
    }

    function tratar_fecha($fecha){
      /*
      Esta función recibe como parámetro una fecha de alquiler, y leañade 10 días a la fecha.
      Añade un texto a la variable global con el resultado.
      */

        global $salidaTexto;
        $fechaDevolucion = date("d-m-Y",strtotime($fecha."+ 10 days"));
        $salidaTexto .= "La fecha de devolución es: $fechaDevolucion <br>";
      
    }

    function tratar_correo($correo){
        /*
        Esta función recibe como parámetro una dirección de correo electrónico.
        Comprueba si es una dirección válida, y devuelve el valor booleano de tal condición.
        En caso de no ser valida añade un texto a la variable global con el error.
        */

        global $errorEmail;
        if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
            $errorEmail .=  "El correo electrónico es incorrecto";
            return false;
        }
        return true;
    }

    function tratar_dni($dni){
        /*
        Esta función recibe como parámetro un DNI.
        Comprueba si se ha rellenado de forma correcta y devuelve el valor booleano de esta condición.
        Si el DNI es correcto introduce un texto con el dni en el mensaje de respuesta.
        En caso de error añade un texto a la variable global con el tipo de error.
        */

        global $errorDni;
        global $salidaTexto;
        $letra = strtoupper(substr($dni, -1)); 
        $numerosDni = substr($dni, 0, -1);
        $letrasPosibles  = "TRWAGMYFPDXBNJZSQVHLCKE";
        $dniCorrecto = false;
        if (is_numeric($numerosDni)){
            $letraCorrecta = substr($letrasPosibles, $numerosDni%23, 1);
        }
        else {
            $letraCorrecta = null;
        }
        $longitud = strlen($numerosDni);
        
        switch (true){  //el switch consulta true ya que se va a mirar varias condiones y no el valor de una variable
            case (is_numeric($numerosDni) == false):
                $errorDni =  "El formato del dni introducido NO es correcto $numerosDni";
                break;
            
            case ($longitud > 8):
                $errorDni =  ("El dni introducido tiene demasiados números");
                break;

            case (($longitud < 8) && is_numeric($letra)):
                $numerosDni = $dni;
                $letraCorrecta = substr($letrasPosibles, $numerosDni%23, 1);
                $errorDni =  "Se ha introducido un dni sin letra";
                $letra = null;
            
            case (($letraCorrecta !== $letra)):
                $errorDni .=  "El DNI introducido tiene mal la letra. El DNI correcto es: $numerosDni$letraCorrecta";
                break;

            case (($letraCorrecta == $letra)):
                $salidaTexto .= "Tu DNI es: $dni <br>";
                $dniCorrecto = true;
                break;
        }
        return $dniCorrecto;
    }


    /*
    Código de validación de los datos introducidos en el formulario.
    */
    $salidaTexto = ""; 
    $requisitos = false;

    $errorNombre = $errorApellido = $errorNacimiento = $errorLibro = $errorEmail= $errorFecha = $errorDni ="";


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //variables con los datos introducidos en el formulario
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $libro = $_POST['libro'];
        $email = $_POST['email'];
        $fechaNacimiento = new DateTime($_POST['fechaNac']);
        $fechaAlquiler = $_POST['fecha'];
        $dni = $_POST['dni'];

        if (empty($nombre)){
            $errorNombre = " No has introducido el nombre";
        } else { 
            $salidaTexto = "<br>Hola $nombre <br>";
            $requisitos = true;
        }

        if(empty($apellido)) {
            $errorApellido =  " No has introducido el apellido";
            $requisitos &= false;
        }
 
        if(empty($libro)){
            $errorLibro = " No has introducido el libro";
            $requisitos &= false;
        }  else {
            $salidaTexto .= "Has alquilado el libro $libro <br>";
        }

        if (empty($email)){
            $errorEmail =  " El correo electrónico está sin poner";
            $requisitos &= false;
        } else {
            $requisitos &= tratar_correo($email);
        }

        if (empty($fechaNacimiento)){
            $errorNacimiento =  " La fecha de nacimiento está sin poner";
            $requisitos &= false;
        } else {
            $requisitos &= mayor_de_edad($fechaNacimiento);
        }

       if (empty($fechaAlquiler)){
            $errorFecha = " La fecha de alquiler está sin poner";
            $requisitos &= false;
        } else {
            tratar_fecha($fechaAlquiler);
        } 

         if (empty($dni)){
            $errorDni = " El DNI está sin poner";
            $requisitos &= false;
        } else {
            $requisitos &= tratar_dni($dni);
        }  



        if ($requisitos){
            header("location:webRespuesta.php?mensaje=$salidaTexto");
        }
        
    }

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title> DWES UD02</title>
        <link rel="stylesheet" href="style.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body class="formularioServer">

        <div class="container">
            <h2>Alquiler de libros</h2>
        </div>
        <br/>
        <div class="container">
            <form name="formulario" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

                <label for="Nombre" class="form-label">Nombre del Usuario</label>
                <span class="error">* <?php echo $errorNombre;?></span>
                <br/>
                <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                <br/>

                <label for="Apellido" class="form-label">Apellido del Usuario</label>
                <span class="error">* <?php echo $errorApellido;?></span>
                <br/>
                <input type="text" class="form-control" name="apellido" placeholder="Apellido">
                <br/>
                
                <label for="FechaNac" class="form-label">Fecha de nacimiento</label>
                <span class="error">* <?php echo $errorNacimiento;?></span>
                <br/>
                <input type="date" class="form-control" name="fechaNac">
                <br/>

                <label for="Libro" class="form-label">Libro Alquilado</label>
                <span class="error">* <?php echo $errorLibro;?></span>
                <br/>
                <input type="text" class="form-control" name="libro" placeholder="Título">
                <br/>

                <label for="Correo" class="form-label">Correo electrónico</label>
                <span class="error">* <?php echo $errorEmail;?></span>
                <br/>
                <input type="mail" class="form-control" name="email" placeholder="Email">
                <br/>

                <label for="Fecha" class="form-label">Fecha Alquiler</label>
                <span class="error">* <?php echo $errorFecha;?></span>
                <br/>
                <input type="date" class="form-control" name="fecha">
                <br/>

                <label for="DNI" class="form-label">DNI del Usuario</label>
                <span class="error">* <?php echo $errorDni;?></span>
                <br/>
                <input type="text" class="form-control" name="dni" placeholder="00000000A">
                <br/>


                <br/>
                <input type="submit" class="btn btn-primary" name="enviar" value="Enviar" id="enviar">
                
            </form>

        </div>
    
  </body>
</html>
