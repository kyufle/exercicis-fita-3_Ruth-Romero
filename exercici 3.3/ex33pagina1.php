<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $ex33 = fopen("ex33.txt","r+");
        while (!feof($ex33)) {
            $content = explode("\n", fgets($ex33));
            for ($i = 0; $i < count($content); $i++){
                echo "<p>".$content[$i]."</p>";
            }
        }
        if (isset($_POST["textarea"])) {
            $textarea = $_POST["textarea"];
            fwrite($ex33, $textarea. "\n");
        }
        
    ?>
    <form method="post">
        <textarea name="textarea"></textarea>
        <button type="submit">Enviar</button>
    </form>
    
</body>
</html>