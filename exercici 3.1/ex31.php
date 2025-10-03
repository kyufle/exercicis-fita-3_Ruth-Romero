<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="contactes.css">
</head>
<body>
    <p>PROCESSA CONTACTES</p>
    <table>
    <?php
    $ficheroContactos = file("./contactes31.txt");
    
    foreach($ficheroContactos as $usuarios){
        $separationCommas = explode(', ',$usuarios);
        echo "<tr>";
            echo "<td>".$separationCommas[0]."</td>";
            echo "<td>".$separationCommas[1]."</td>"; 
            echo "<td>".$separationCommas[2]."</td>";
            echo "<td>".$separationCommas[3]."</td>";
        echo "</tr>";
    }
    file_put_contents(
        "contactes31b.txt",
        str_replace(
            ', ',
            '#',
            $ficheroContactos
        )

    )
    ?>
    </table>
</body>
</html>