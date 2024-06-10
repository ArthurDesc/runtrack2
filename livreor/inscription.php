<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $error_message = '';

    if ($password !== $confirmPassword) {
        $error_message = "Les mots de passe ne correspondent pas";
    } else {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $mysqli = mysqli_connect('localhost', 'root', '', 'livreor');

        if (!$mysqli) {
            die("Could not connect: " . mysqli_connect_error());
        }

        // Utilisation d'une requête préparée pour éviter les injections SQL
        $stmt = $mysqli->prepare("INSERT INTO utilisateurs (login, password) VALUES (?, ?)");
        if ($stmt) {
            $stmt->bind_param("ss", $login, $hashed_password);
            $result = $stmt->execute();

            if ($result) {
                header("Location: ./connexion.php");
                exit();
            } else {
                $error_message = "Erreur lors de l'inscription: " . $stmt->error;
            }
            $stmt->close();
        } else {
            $error_message = "Erreur lors de la préparation de la requête: " . $mysqli->error;
        }

        mysqli_close($mysqli);
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <form action="inscription.php" method="post">
        <label for="login">Nom d'utilisateur</label>
        <br />
        <input type="text" name="login" placeholder="Nom d'utilisateur" required>
        <br />
        <label for="password">Mot de passe :</label>
        <br />
        <input type="password" name="password" placeholder="Mot de passe" required>
        <br />
        <label for="confirmPassword">Confirrmez votre mot de passe :</label>
        <br />
        <input type="password" name="confirmPassword" placeholder="Confirmer le mot de passe" required>
        <br />
        <button type="submit">S'inscrire</button>
    </form>
    <?php if (!empty($error_message)) : ?>
        <p><?php echo $error_message; ?></p>
    <?php endif; ?>
</body>
</html>
