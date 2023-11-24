<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Web de respuesta DWES UD2</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body> 
        <div class="container">
             
            <pre>
            <?php 
                $texto = $_GET["mensaje"];
                echo($texto);
                
            ?> 
            </pre>

            <br/> 
            <a href="index.php">  
            <button type="submit" class="btn btn-primary">Volver Atrás</button>
            </a>
        </div>
        
    </body>
</html>
