<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form name="index.php" method="post">

        <label for="name">Prénom :</label>
        <input type="text" id="name" name="prenom">

        <br />

        <label for="lastname">Nom :</label>
        <input type="text" id="lastname" name="nom">

        <br />
        
        <label for="age">Age :</label>
        <input type="text" id="age" name="age">
        
        <br />
        
        <input type="submit" value="Envoyer">

    </form>

    <?php
    $nombre=0;

    if ($_SERVER ['REQUEST_METHOD'] == 'POST' && !empty($_POST))
        foreach ($_POST as $key => $value) {
        $nombre++;
        }

        echo "Il y a $nombre argument(s)";

    ?>

</body>
</html>