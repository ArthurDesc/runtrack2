<?php
$title = "Mon profil";

session_start();
$message = 'Ici vous pouvez modifier vos informations personnelles';

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: connexion.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Connexion à la base de données
$mysqli = new mysqli("localhost", "root", "", "livreor");
if ($mysqli->connect_error) {
    die("Échec de la connexion : " . $mysqli->connect_error);
}
 

// Récupérer les informations actuelles de l'utilisateur
$request = $mysqli->prepare("SELECT login FROM utilisateurs WHERE id = ?");
$request->bind_param("i", $user_id);
$request->execute();
$result = $request->get_result();
$user_data = $result->fetch_assoc();
$request->close();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["login"];
    $password = $_POST["password"];

    // Mettre à jour les informations de l'utilisateur
    if (!empty($password)) {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $update_request = $mysqli->prepare("UPDATE utilisateurs SET login = ? WHERE id = ?");
        $update_request->bind_param("ssi", $login, $hashed_password, $user_id);
    } else {
        $update_request = $mysqli->prepare("UPDATE utilisateurs SET login = ? WHERE id = ?");
        $update_request->bind_param("si", $login, $user_id);
    }

    if ($update_request->execute()) {
        // Mettre à jour les informations de session
        $_SESSION['login'] = $login;
        header("Location: " . $_SERVER['PHP_SELF']);
        $message = "Vos informations ont bien été mises à jour";
    } else {
        $message = "Erreur lors de la mise à jour des informations.";
    }
    
    if (isset($_POST['logout'])) {
        unset($_SESSION['user_id']);
        header("location: ./connexion.php");
        exit();
    }

    $update_request->close();
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="fr">

<?php include('./includes/_head.php') ?>

<body>

<?php include('./includes/_header.php')?>

<main>


    <div class="container mt-5">
        <a href="./index.php" class="btn btn-secondary mb-4">Accueil</a>
        <h1 class="text-center">Modifier mon profil</h1>

        <form method="post" action="profil.php" class="w-50 mx-auto mt-4">
            <div class="form-group">
                <label for="login">Login:</label>
                <input type="text" id="login" name="login" class="form-control" value="<?php echo htmlspecialchars($user_data['login']); ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Nouveau mot de passe (laissez vide pour ne pas changer):</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Mettre à jour</button>
            <button type="submit" name="logout" class="btn btn-primary btn-block">Se déconnecter</button>
        </form>

        <a href="./commentaires.php">Laisser un commentaire</a>        
        <br />
        <a href="./livre-or.php">Voir les commentaires</a>        
        <?php if ($message): ?>
            <div class="alert alert-info mt-4" role="alert">
                <?php echo htmlspecialchars($message); ?>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php include('./includes/_footer.php') ?>


</body>
</html>
