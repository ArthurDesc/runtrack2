<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $str = "On n'est pas le meilleur quand on le croit mais quand on le sait.";
        $dict = array(
            "voyelles" => array ("a", "e", "i", "o", "u", "y", "A", "E", "I", "O", "U", "Y"),
            "consonnes" => array ("b", "c", "d", "f", "g", "h", "j", "k", "l", "m", "n", "p", "q", "r", "s", "t", "v", "w", "x", "z")
        );

        $compteur = array(
            "voyelles" => 0,
            "consonnes" => 0
        );

        for ($index=0; isset($str[$index]);$index++) {
                if (in_array($str[$index], $dict["voyelles"])) { 
                    $compteur ["voyelles"]++;
            
                } elseif (in_array($str[$index], $dict["consonnes"])) {
                    $compteur ["consonnes"]++;
                }
            }


    ?>

    <table border ="2">

        <tr>
            <th>Consonnes</th>
            <th>Voyelles</th>
        </tr>

        <tr>
            <td><?php echo $compteur["consonnes"]?></td>
            <td><?php echo $compteur["voyelles"]?></td>
        </tr>


    </table>


</body>
</html>