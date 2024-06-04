<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: connexion.php");
    exit();
}

$message = '';
$user_id = $_SESSION['user_id'];

$conn = new mysqli("localhost", "votre_utilisateur", "votre_mot_de_passe", "votre_base_de_donnees");
if ($conn->connect_error) {
    die("Erreur de connexion: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $mot_de_passe = $_POST['mot_de_passe'];

    if (!empty($mot_de_passe)) {
        $hashed_password = password_hash($mot_de_passe, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE utilisateurs SET prenom = ?, nom = ?, mot_de_passe = ? WHERE id = ?");
        $stmt->bind_param("sssi", $prenom, $nom, $hashed_password, $user_id);
    } else {
        $stmt = $conn->prepare("UPDATE utilisateurs SET prenom = ?, nom = ? WHERE id = ?");
        $stmt->bind_param("ssi", $prenom, $nom, $user_id);
    }

    if ($stmt->execute()) {
        $message = "Profil mis à jour avec succès.";
    } else {
        $message = "Erreur lors de la mise à jour du profil.";
    }

    $stmt->close();
}

$stmt = $conn->prepare("SELECT login, prenom, nom FROM utilisateurs WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($login, $prenom, $nom);
$stmt->fetch();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profil</title>
</head>
<body>
    <h1>Modifier votre profil</h1>
    <?php if ($message): ?>
        <p><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>
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
</body>
</html>
