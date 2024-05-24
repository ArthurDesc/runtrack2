<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire GET</title>
</head>
<body>
        <!-- // Si le formulaire a été soumis, traiter les données
        // Compter le nombre d'arguments GET
        

        // Afficher le nombre d'arguments GET envoyés -->
   

    <!-- Formulaire HTML -->
    <form action="index.php" method="get">
        <label for="name">Nom :</label>
        <input type="text" id="name" name="name"><br><br>
        
        <label for="email">Email :</label>
        <input type="text" id="email" name="email"><br><br>
        
        <label for="age">Âge :</label>
        <input type="text" id="age" name="age"><br><br>
        
        <input type="submit" value="Envoyer">
    </form>

    <?php
        $nombre_arguments_get = 0;
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET)) {

        foreach ($_GET as $key => $value) {
            $nombre_arguments_get++;
        }

        }
        echo "<p>Le nombre d'arguments GET envoyés est : " . $nombre_arguments_get . "</p>";
    ?>

</body>
</html>

    
</body>
</html>