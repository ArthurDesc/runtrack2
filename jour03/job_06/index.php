<html lang="en">
<head>
    <meta charset="UTF-2">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $str = "Les choses que l'on possède finissent par nous posséder.";
    $phrase_inverse = "";

        for ($index=0; isset($str[$index]);$index++) {
        }
            for ($index = $index - 1; $index >= 0; $index--) {
            $phrase_inverse .= $str[$index];
            }

            echo $phrase_inverse


    ?>
</body>
</html>