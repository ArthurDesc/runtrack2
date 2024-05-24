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
        $phrase_mixed = "";


        for ($index=1; isset($str[$index]); $index++) {
                $phrase_mixed .= $str[$index];
            }


        $phrase_mixed .= $temp;

        echo $phrase_mixed
            

    ?>

</body>
</html>