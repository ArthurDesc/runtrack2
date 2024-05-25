<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form method="get">
    <label for="nombre">Nombre : </label>
    <input type="text" id="nombre" name="nombre" required>
    <input type="submit" value="Envoyer">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['nombre'])) {
    $input = $_GET['nombre'];
    $negative = false;
    $nombre = 0;

    // Check for negative sign manually
    if ($input !== '' && $input[0] == '-') {
        $negative = true;
        $startIndex = 1; // Start processing from the second character
    } else {
        $startIndex = 0; // Start processing from the first character
    }

    // Manual string length calculation
    $length = 0;
    while (isset($input[$length])) {
        $length++;
    }

    // Manual conversion from string to integer
    for ($i = $startIndex; $i < $length; $i++) {
        $char = $input[$i];

        // Check if the character is between '0' and '9'
        if ($char >= '0' && $char <= '9') {
            // Convert character to its integer value
            $digitValue = ord($char) - ord('0');
            $nombre = $nombre * 10 + $digitValue;
        } else {
            echo "Entrée invalide.";
            exit();
        }
    }

    // Apply negative sign if necessary
    if ($negative) {
        $nombre = -$nombre;
    }

    // Check if the number is even or odd
    if ($nombre % 2 == 0) {
        echo "Ce Nombre est pair";
    } else {
        echo "Ce Nombre est impair";
    }
}
?>

</body>
</html>
