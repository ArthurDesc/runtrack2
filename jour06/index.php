<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Changer le style du formulaire</title>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset( $_GET['style'] )) {
            $style = $_GET["style"];
        echo '<link rel="stylesheet" href="' . $style . '.css">';
        } 
    ?>

</head>


<body>
    <form method="get" action="index.php">
        <label for="select">Choisissez un style :</label>

        <select name="style" id="style">
            <option value="bleu">Style 1</option>
            <option value="rouge">Style 2</option>
            <option value="vert">Style 3</option>
        </select>

        <input type="submit" value="Valider">
    </form>
 
</body>


</html>
