<?php

define('FILE_NAME', 'names.txt');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $fname = trim(htmlspecialchars($_POST['fname']));
    $lname = trim(htmlspecialchars($_POST['lname']));

    if (!empty($fname) && !empty($lname)) {
        $data = $fname . " " . $lname . PHP_EOL;
        file_put_contents(FILE_NAME, $data, FILE_APPEND);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } else {
        echo "<div class='error'>Пожалуйста, заполните все поля.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Гостевая книга</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #ffffff;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        form {
            background-color: #1e1e1e;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            max-width: 400px;
            margin: 0 auto;
        }
        input[type="text"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #444;
            border-radius: 5px;
            background-color: #333;
            color: #ffffff;
        }
        input[type="submit"] {
            background-color: #6200ea;
            color: #ffffff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #3700b3;
        }
        .error {
            color: #ff0000;
            text-align: center;
            margin-top: 10px;
        }
        .names-list {
            margin-top: 20px;
            background-color: #1e1e1e;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
        .names-list div {
            margin: 5px 0;
        }
    </style>
</head>
<body>

<h1>Заполните форму</h1>

<form method="post" action="<?=$_SERVER['PHP_SELF']?>">
    <label for="fname">Имя:</label>
    <input type="text" id="fname" name="fname" required>
    <label for="lname">Фамилия:</label>
    <input type="text" id="lname" name="lname" required>
    <input type="submit" value="Отправить!">
</form>

<div class="names-list">
    <h2>Список имен:</h2>
    <?php
    if (file_exists(FILE_NAME)) {
        $lines = file(FILE_NAME);
        foreach ($lines as $index => $line) {
            echo "<div>" . ($index + 1) . ". " . htmlspecialchars($line) . "</div>";
        }
        echo "<div>Размер файла: " . filesize(FILE_NAME) . " байт</div>";
    }
    ?>
</div>

</body>
</html>
