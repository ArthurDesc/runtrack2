<?php
session_start();
$message = 'Ici vous pouvez modifier vos informations personnelles';

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: connexion.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Connexion à la base de données
$mysqli = new mysqli("localhost", "root", "", "moduleconnexion");
if ($mysqli->connect_error) {
    die("Échec de la connexion : " . $mysqli->connect_error);
}

// Récupérer les informations actuelles de l'utilisateur
$request = $mysqli->prepare("SELECT login, prenom, nom FROM utilisateurs WHERE id = ?");
$request->bind_param("i", $user_id);
$request->execute();
$result = $request->get_result();
$user_data = $result->fetch_assoc();
$request->close();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["login"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $mot_de_passe = $_POST["mot_de_passe"];

    // Mettre à jour les informations de l'utilisateur
    if (!empty($mot_de_passe)) {
        $hashed_password = password_hash($mot_de_passe, PASSWORD_DEFAULT); // SECURISE LE MOT DE PASSE
        $update_request = $mysqli->prepare("UPDATE utilisateurs SET login = ?, prenom = ?, nom = ?, password = ? WHERE id = ?");
        $update_request->bind_param("ssssi", $login, $prenom, $nom, $hashed_password, $user_id);
    } else {
        $update_request = $mysqli->prepare("UPDATE utilisateurs SET login = ?, prenom = ?, nom = ? WHERE id = ?");
        $update_request->bind_param("sssi", $login, $prenom, $nom, $user_id);
    }

    if ($update_request->execute()) {
        // Mettre à jour les informations de session
        $_SESSION['user_firstname'] = $prenom;
        $_SESSION['user_lastname'] = $nom;
        $_SESSION['login'] = $login;
        header("Location: " . $_SERVER['PHP_SELF']);
        echo "Vos informations ont bien été mis à jour";
    } else {
        $message = "Erreur lors de la mise à jour des informations.";
    }
    $update_request->close();
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier mon profil</title>
</head>
<body>
    <a href="./index.php">Accueil</a>
    <h1>Modifier mon profil</h1>

    <form method="post" action="profil.php">
        <label for="login">Login:</label>
        <input type="text" id="login" name="login" value="<?php echo htmlspecialchars($user_data['login']); ?>" required><br><br>
        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($user_data['prenom']); ?>" required><br><br>
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($user_data['nom']); ?>" required><br><br>
        <label for="mot_de_passe">Nouveau mot de passe (laissez vide pour ne pas changer):</label>
        <input type="password" id="mot_de_passe" name="mot_de_passe"><br><br>
        <button type="submit">Mettre à jour</button>
    </form>
    
    <?php if ($message): ?>
        <p><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>
</body>
</html>
