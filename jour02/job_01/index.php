<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    for ($list = 0; $list <= 1337; $list++) {
                if ($list == 26 || $list == 37 || $list == 88 || $list == 1111 || $list == 3233) {
                continue;
                }

                if ($list == 42) 
                { echo "<b><u>42</u></b><br>"; }

                else

                { echo "$list<br />";}
}
?>

    
</body>
</html>