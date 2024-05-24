<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $str = "Certaines choses changent, et d'autres ne changeront jamais.";
        $temp = $str[0];


        for ($index=1; isset($str[$index]); $index++) {
            for ($index= 0; $index >1; $index-- ) {
                $phrase_mixed .= $str[$index];
            }

        }

        $phrase_mixed .= $temp;

        echo $phrase_mixed
            

    ?>

</body>
</html>