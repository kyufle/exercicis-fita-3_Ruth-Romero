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
        echo str_replace("##","<h1>",fgets($ex34));
    ?>
</body>
</html>