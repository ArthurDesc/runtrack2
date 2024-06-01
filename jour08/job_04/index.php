<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['connexion']) && isset($_POST['prenom'])) {
        // Enregistrer le prénom dans un cookie
        $prenom = htmlspecialchars($_POST['prenom']); // Récupère et sécurise le prénom
        setcookie('prenom', $prenom, time() + 3600, "/"); // Crée un cookie nommé 'prenom' avec la valeur du prénom
        header("Location: " . $_SERVER['PHP_SELF']); // Redirige pour éviter la resoumission
        exit;
    } elseif (isset($_POST['deco'])) {
        // Supprimer le cookie pour se déconnecter
        setcookie('prenom', '', time() - 3600, "/"); // Expire le cookie en définissant une date passée
        header("Location: " . $_SERVER['PHP_SELF']); // Redirige pour actualiser l'affichage
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        form, .welcome {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"], input[type="button"] {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #28a745;
            color: #fff;
            cursor: pointer;
        }
        input[type="submit"]:hover, input[type="button"]:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<?php if (isset($_COOKIE['prenom'])): ?>
    <div class="welcome">
        <p>Bonjour <?php echo htmlspecialchars($_COOKIE['prenom']); ?> !</p>
        <form action="index.php" method="post">
            <input type="submit" name="deco" value="Déconnexion">
        </form>
    </div>
<?php else: ?>
    <form action="index.php" method="post">
        <input type="text" name="prenom" placeholder="Entrez votre prénom" required>
        <br />
        <input type="submit" name="connexion" value="Connexion">
    </form>
<?php endif; ?>

</body>
</html>
