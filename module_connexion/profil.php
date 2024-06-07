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
        $hashed_password = password_hash($mot_de_passe, PASSWORD_DEFAULT);
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
        echo "Vos informations ont bien été mises à jour";
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
    <!-- Intégration de Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <a href="./index.php" class="btn btn-secondary mb-4">Accueil</a>
        <h1 class="text-center">Modifier mon profil</h1>

        <form method="post" action="profil.php" class="w-50 mx-auto mt-4">
            <div class="form-group">
                <label for="login">Login:</label>
                <input type="text" id="login" name="login" class="form-control" value="<?php echo htmlspecialchars($user_data['login']); ?>" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom:</label>
                <input type="text" id="prenom" name="prenom" class="form-control" value="<?php echo htmlspecialchars($user_data['prenom']); ?>" required>
            </div>
            <div class="form-group">
                <label for="nom">Nom:</label>
                <input type="text" id="nom" name="nom" class="form-control" value="<?php echo htmlspecialchars($user_data['nom']); ?>" required>
            </div>
            <div class="form-group">
                <label for="mot_de_passe">Nouveau mot de passe (laissez vide pour ne pas changer):</label>
                <input type="password" id="mot_de_passe" name="mot_de_passe" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Mettre à jour</button>
        </form>
        <?php
        if ($_SESSION['user_id'] == 1) {
        echo "<a href='./admin.php'>";
        echo "ADMIN";
        echo "</a>";
        }
         ?>

        
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
