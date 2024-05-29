<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Changer le style du formulaire</title>

    <?php
    $selectedStyle = "";
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['style'])) {
        $style = $_GET["style"];
        $selectedStyle = $style; // Sauvegarde du style sélectionné pour le garder après la soumission du formulaire
        echo '<link rel="stylesheet" href="' . $style . '.css">';
    }
    ?>

</head>
<body>
    <form method="get" action="index.php">
        <label for="select">Choisissez un style :</label>
        <select name="style" id="style">
            <option value="bleu" <?php if ($selectedStyle == "bleu") echo "selected"; ?>>Style 1</option>
            <option value="rouge" <?php if ($selectedStyle == "rouge") echo "selected"; ?>>Style 2</option>
            <option value="vert" <?php if ($selectedStyle == "vert") echo "selected"; ?>>Style 3</option>
        </select>
        <input type="submit" value="Valider">
    </form>
</body>
</html>
