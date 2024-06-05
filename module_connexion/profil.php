<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profil</title>
</head>
<body>
    <h1>Modifier votre profil</h1>
    <form method="post" action="profil.php">
        <label for="login">Login:</label>
        <input type="text" id="login" name="login" value="<?php echo htmlspecialchars($login); ?>" readonly><br><br>
        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($prenom); ?>" required><br><br>
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($nom); ?>" required><br><br>
        <label for="mot_de_passe">Nouveau mot de passe (laissez vide pour ne pas changer):</label>
        <input type="password" id="mot_de_passe" name="mot_de_passe"><br><br>
        <button type="submit">Mettre à jour</button>
    </form>

    <a href="./index.php">Accueil</a>
</body>
</html>
