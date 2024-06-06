<?php
session_start();
$message = 'Connectez vous pour accéder à votre profil ';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'];
    $password = $_POST['password'];

    // Connexion à la base de données
    $mysqli = mysqli_connect("localhost", "root", "", "moduleconnexion");
    if (!$mysqli) {
        die("Échec de la connexion : " . mysqli_connect_error());
    }

    // Préparer et exécuter la requête SQL pour sélectionner l'utilisateur
    $request = $mysqli->prepare("SELECT id, prenom, password FROM utilisateurs WHERE login = ?"); 
    $request->bind_param("s", $login);
    $request->execute(); 
    $result = $request->get_result();

    // Vérifier si l'utilisateur existe
    if ($result->num_rows > 0) { 
        $user_data = $result->fetch_assoc();

        // Vérifier le mot de passe
        if (password_verify($password, $user_data['password'])) {
            // Mot de passe correct, démarrer la session utilisateur
            $_SESSION['user_id'] = $user_data['id'];
            $_SESSION['user_name'] = $user_data['prenom'];
            
            // Rediriger vers une page protégée ou une page d'accueil
            header("Location: profil.php");
            exit;

        } elseif ($user_data['id'] == 1) {
            header("Location: admin.php");
        } else {
            $message = "Mot de passe incorrect.";
        }
    } else {
        $message = "Aucun utilisateur trouvé avec ce login.";
    }

    // Fermer la requête et la connexion
    $request->close();
    mysqli_close($mysqli);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <!-- Intégration de Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <a href="./index.php" class="btn btn-secondary mb-4">Accueil</a>
        <h1 class="text-center">Connexion</h1>
        <form method="post" action="connexion.php" class="w-50 mx-auto mt-4">
            <div class="form-group">
                <label for="login">Login:</label>
                <input type="text" id="login" name="login" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Connexion</button>
        </form>
        
        <?php if ($message): ?>
            <div class="alert alert-info mt-4" role="alert">
                <?php echo htmlspecialchars($message); ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Intégration de Bootstrap JS et ses dépendances -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
