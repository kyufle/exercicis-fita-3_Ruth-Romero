<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>INTRODUEIX DADES</h1>
    <form method="post">
        <textarea name="comentari" id=""></textarea>
        <label for="separador">Separador: <input type="text" name="separador"></input></label>
        <input type="submit" value="Enviar">
    </form>
    <?php

        $comentari = $_POST["comentari"];
        $separador = $_POST["separador"];
        if(isset($comentari) && isset($separador)){
            file_put_contents(
                "comentaris.txt",
                str_replace(
                    ' ',
                    $separador,
                    $comentari
                    . "\n",
                ),
                FILE_APPEND                
            );
        }      
    ?>   
</body>
</html>