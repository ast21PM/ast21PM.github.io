<?php
$name = 'Никита';
$age = 20;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Переменные и вывод</title>
</head>
<body>
    <h1>Переменные и вывод</h1>
    <p>Меня зовут: <?php echo $name; ?></p>
    <p>Мне <?php echo $age; ?> лет</p>
    <p>Тип переменной name: <?php echo gettype($name); ?></p>
    <p>Тип переменной age: <?php echo gettype($age); ?></p>
    
    <?php unset($name, $age); ?>
</body>
</html>
