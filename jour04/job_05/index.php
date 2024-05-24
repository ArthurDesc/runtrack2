<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form name="index.php" method="post">

<label for="username">Adresse mail :</label>
<input type="text" id="username" name="username">

<br />

<label for="password">Mot de passe :</label>
<input type="password" id="password" name="password">

<br />

<input type="submit" value="Se connecter">

</form>
    <?php
    if ($_SERVER ['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {
        $username = $_POST['username'];
        $password = $_POST['password'];


    if ($username == 'Jhon' && $password == 'Rambo') {
        echo "<p>C'est pas ma guerre<p/>";
    } else {
        echo "<p>Votre pire cauchemar.</p>";    
    }

}

    ?>
</body>
</html>