<?php
session_start();
$message = '';

// Vérifier si la méthode de requête est POST
if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    $login = $_POST['login'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $mot_de_passe = $_POST['mot_de_passe'];
    $confirm_mot_de_passe = $_POST['confirm_mot_de_passe'];

    // Comparer les mots de passe
    if ($mot_de_passe !== $confirm_mot_de_passe) {
        $message = "Les mots de passe ne correspondent pas.";
    } else {
        // SECURISE LE MOT DE PASSE
        $hashed_password = password_hash($mot_de_passe, PASSWORD_DEFAULT);




        // Connexion à la base de données
        $mysqli = mysqli_connect("localhost", "root", "", "moduleconnexion");
        if (!$mysqli) {
            die("Échec de la connexion : " . mysqli_connect_error());
        }

        // Requête que l'on donne au SQL
        $sql = "INSERT INTO utilisateurs (nom, prenom, login, password) VALUES ('$nom', '$prenom', '$login', '$hashed_password')";

        // Exécution de la requête SQL
        if (mysqli_query($mysqli, $sql)) {
            // Rediriger vers la page de connexion
            header("Location: connexion.php");
            exit;
        } else {
            // Afficher une erreur si la requête a échoué
            $message = "Erreur lors de l'inscription : " . mysqli_error($mysqli);
        }

        // Fermeture de la connexion
        mysqli_close($mysqli);
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
</head>
<body>
    <h1>Inscription</h1>
    <?php if ($message): ?>
        <p><?php echo htmlspecialchars($message); ?></p>
    <?php endif;?> 
    <form method="post" action="inscription.php">
        <label for="login">Login:</label>
        <input type="text" id="login" name="login" required><br><br>
        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" required><br><br>
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required><br><br>
        <label for="mot_de_passe">Mot de passe:</label>
        <input type="password" id="mot_de_passe" name="mot_de_passe" required><br><br>
        <label for="confirm_mot_de_passe">Confirmez le mot de passe:</label>
        <input type="password" id="confirm_mot_de_passe" name="confirm_mot_de_passe" required><br /><br />
        <button type="submit">Inscription</button>
    </form>
</body>
</html>
