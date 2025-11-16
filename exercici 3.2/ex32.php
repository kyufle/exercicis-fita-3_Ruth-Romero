<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>INTRODUIR DADES</p>
    <form method="post">
        <textarea name="comentari"></textarea>
        <label for="separador">Separador:</label>
        <input type="text" name="separador" id="separador">
        <input type="submit" value="Enviar">
    </form>
    <?php 
        if (isset($_POST["comentari"]) && isset($_POST["separador"])) {
            $comentari = $_POST["comentari"];
            $separador = $_POST["separador"];
            $comentariFitxer = fopen("comentaris.txt","a");
            $contentComentariFitxer = implode($separador, explode(" ",$comentari));
            fwrite($comentariFitxer, $contentComentariFitxer."\n");    
        }
    ?>
</body>
</html>