<?php
session_start();
$message = '';

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
    $request->bind_param("s", $login); // ATTRIBUT LE TYPE STRING A LA VARIABLE LOGIN
    $request->execute(); 
    $result = $request->get_result(); // ON CREER UNE VARIABLE POUR LUI DONNER LE RESULT DE NOTRE REQUETE

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
</head>
<body>
    <a href="./index.php">Accueil</a>
    <h1>Connexion</h1>
    <?php if ($message): ?>
        <p><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>
    <form method="post" action="connexion.php">
        <label for="login">Login:</label>
        <input type="text" id="login" name="login" required><br><br>
        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit">Connexion</button>
    </form>


</body>
</html>
