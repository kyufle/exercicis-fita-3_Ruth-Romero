<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar contactes</title>
</head>
<body>
    <p>PROCESSA CONTACTES</p>
    <?php
        //se lee el fichero 
        $contantes31 = fopen("contactes31.txt","r");
        $contantes31b = fopen("contactes31b.txt","w");
        echo "<table>";
        while(!feof($contantes31)){
            $infoContactes = explode(",",fgets($contantes31));
            $todosLosStrings = implode("#",$infoContactes);
            fwrite($contantes31b, $todosLosStrings);
            echo "<tr>";
                for($i=0;$i<count($infoContactes);$i++){
                    echo "<td>".$infoContactes[$i]."</td>";      
                }
            echo "</tr>";
        }
            
        echo "</table>";
        
        fclose($contantes31);
    ?>
     
</body>
</html>