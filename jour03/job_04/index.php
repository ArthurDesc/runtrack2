<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $str = "Dans l'espace, personne ne vous entend crier.";
        $count = 0;


        for ($count=0; isset($str[$count]); $count++);
            echo "Il y a $count caractère(s) dans cette phrase"


    ?>


</body>
</html>