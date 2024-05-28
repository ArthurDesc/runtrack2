<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="test.php">test</a>
    <a href="copie.php">copie</a>
<form method="post" action="index.php">
    <label for="largeur">largeur</label> : <input type="text" name="largeur" id="largeur">
    <label for="hauteur"> hauteur</label> : <input type="text" name="hauteur" id="hauteur">
    <input type="submit" value="envoyer">
</form>


    <?php
 if (isset($_POST['largeur']) && isset($_POST['hauteur'])) {
    $largeur = intval($_POST['largeur']);
    $hauteur = intval($_POST['hauteur']);

    if ($largeur > 0 && $hauteur > 0) {
        
        for ($i = 1; $i <= $hauteur; $i++) {
            echo str_repeat('&nbsp;&nbsp;', $hauteur - $i);
            echo '/';
            if ($i > 1) {
                echo str_repeat('_', 2 * ($i - 1) );
            }
            echo '\\<br>';
        }

        for ($i = 1; $i <= $hauteur; $i++) {
            echo '|';
            echo str_repeat('&nbsp;&nbsp;', $largeur -2);
            echo '|<br>';
        }
        echo '|';
        echo str_repeat('_', $largeur - 2);
        echo '|<br>';

    } 
} 
    ?>
</body>
</html>