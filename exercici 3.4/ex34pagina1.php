<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wiki Markdown</title>
</head>
<body>
    <?php 
        $ex34 = fopen("ex34.txt","r");
        // echo str_replace("##","<h1>",fgets($ex34));
         while (!feof($ex34)){
            //coger cada linea del fichero y mostrarla
            $linea = fgets($ex34);
            if (str_starts_with($linea,"##")){
                echo str_replace("##", "<h1>",$linea)."</h1>";
            } else {
                echo $linea;
            }
        }
    ?>
</body>
</html>