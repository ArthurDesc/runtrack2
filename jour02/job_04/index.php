<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        for ($list = 1; $list <= 100; $list++) {
        if ($list % 3 == 0 && $list % 5 == 0) {
            echo "FizzBuzz<br />";
        } elseif ($list % 3 == 0) { 
            echo "Fizz<br />";
        } elseif ($list % 5 == 0) {
            echo "Buzz<br />";
        } else {
            echo "$list<br />";
            }
        }
    ?>
</body>
</html>