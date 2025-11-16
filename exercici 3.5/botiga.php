<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Botiga</title>
</head>
<body>
    <?php
        $productes = fopen("productes.txt","r");
        echo "<form method='post'>";
        while (!feof($productes)){
            //coger cada linea del fichero y mostrarla
            $productesInfo = trim(fgets($productes));
            echo "<label for='".$productesInfo."'>".$productesInfo."</label>";
            echo "<input id='".$productesInfo."' type='checkbox' name='".$productesInfo."'>";
            echo "\n";
        }
        echo "<input type='text' name='usuari'>";
        echo "<button type='submit'>enviar</button>";
        echo "</form>";

        
        if (isset($_POST['usuari'])) {
            $usuari = $_POST["usuari"];
            $comandes = fopen("comandes.txt","w");
            $comanda = $usuari;
            foreach (array_keys($_POST) as $key) {
                if ($key == "usuari") {continue;}
                $changeSpace = str_replace("_", " ",$key);
                $comanda .= ",".$changeSpace;
            }
            fwrite($comandes, $comanda);
        }
        echo $comanda;
    ?>
</body>
</html>