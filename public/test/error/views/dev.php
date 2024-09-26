<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dev</title>
</head>
<body>
    <p>Тип ошибки: <?php echo 'Тип ошибки'. $errno;?></p>
    <p>Описание: <?=$errstr?></p>
    <p>В каком файле ошибка: <?=$errfile?></p>
    <!-- <p>В какой строке ошибка: <?=$errline?></p> -->
</body>
</html>
