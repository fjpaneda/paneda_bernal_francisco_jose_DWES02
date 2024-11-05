<?php
    require "lib/fechas.php";
    require "lib/recursos.php";

    if(isset($_POST['enviado'])){

        header('Location: ./valido.php');
        // if($datos['coche_alquilado']){
        //     header('Location: ./valido.php');
        // }
        // else {
        //     header('Location: no_valido.php');
        // }
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        <input type="hidden" name="enviado">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>