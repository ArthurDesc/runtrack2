<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }

        form {
            width: 300px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        h1 {
            text-align: center;
            margin-top: 40px;
            color: #333;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }

        th {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>

    <form name="index.php" method="post">

    <label for="name">Prénom :</label>
    <input type="text" id="name" name="prenom">

    <br />

    <label for="lastname">Nom :</label>
    <input type="text" id="lastname" name="nom">

    <br />

    <label for="age">Age :</label>
    <input type="text" id="age" name="age">

    <br />

    <input type="submit" value="Envoyer">

    </form>

    <?php
    if ($_SERVER ['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {
        echo "<h1>Tableau de vos données :</h1> <br />";
        echo "<table border=1>";
        echo "<tr><th>Arguments</th><th>Valeurs</th></tr>";

        foreach ($_POST as $key => $value) {
        echo "<tr><td>$key</td><td>$value</td></tr>";
        }

        echo "</table>";
    }

    ?>
    
</body>
</html>
