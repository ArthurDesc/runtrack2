<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $val0 = 98;
        $val1 = 173;
        $val2 = 171;
        $val3 = 200;
        $val4 = 204;
        $val5 = 404;
        $val6 = 459;

        $numbers = array ($val0, $val1, $val2, $val3, $val4, $val5, $val6);

        
    ?>



    <table border="1">
        <tr>
            <th><?php echo $numbers[0]; ?></th>
            <th><?php echo $numbers[1]; ?></th>
            <th><?php echo $numbers[2]; ?></th>
            <th><?php echo $numbers[3]; ?></th>
            <th><?php echo $numbers[4]; ?></th>
            <th><?php echo $numbers[5]; ?></th>
            <th><?php echo $numbers[6]; ?></th>
        </tr>


        <tr>
            <?php foreach ($numbers as $val) : ?>
                <td><?php echo ($val % 2 == 0) ? "pair" : "impair"; ?></td>
            <?php endforeach; ?>
        </tr>

        
    </table>





</body>
</html>