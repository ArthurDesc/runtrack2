<?php
$message = '';
// Vérifier si la méthode de requête est POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $mot_de_passe = $_POST['mot_de_passe'];
    $confirm_mot_de_passe = $_POST['confirm_mot_de_passe'];

    // Comparer les mots de passe
    if ($mot_de_passe !== $confirm_mot_de_passe) {
        $message = "Les mots de passe ne correspondent pas.";
    } else {
        // Sécuriser le mot de passe
        $hashed_password = password_hash($mot_de_passe, PASSWORD_DEFAULT);

        // Connexion à la base de données
        $mysqli = mysqli_connect("localhost", "root", "", "moduleconnexion");
        if (!$mysqli) {
            die("Échec de la connexion : " . mysqli_connect_error());
        }

        // Requête SQL
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
    <!-- Intégration de Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <a href="./index.php" class="btn btn-secondary mb-4">Accueil</a>
        <h1 class="text-center">Inscription</h1>
        
        <?php if ($message): ?>
            <div class="alert alert-info mt-4" role="alert">
                <?php echo htmlspecialchars($message); ?>
            </div>
        <?php endif; ?> 
        
        <form method="post" action="inscription.php" class="w-50 mx-auto mt-4">
            <div class="form-group">
                <label for="login">Login :</label>
                <input type="text" id="login" name="login" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="mot_de_passe">Mot de passe :</label>
                <input type="password" id="mot_de_passe" name="mot_de_passe" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="confirm_mot_de_passe">Confirmez le mot de passe :</label>
                <input type="password" id="confirm_mot_de_passe" name="confirm_mot_de_passe" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Inscription</button>
        </form>
    </div>

    <!-- Intégration de Bootstrap JS et ses dépendances -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
