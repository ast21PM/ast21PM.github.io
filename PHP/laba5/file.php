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

        echo "Пожалуйста, заполните все поля.";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Работа с файлами</title>
</head>
<body>

<h1>Заполните форму</h1>

<form method="post" action="<?=$_SERVER['PHP_SELF']?>">
    Имя: <input type="text" name="fname"><br>
    Фамилия: <input type="text" name="lname"><br>
    <br>
    <input type="submit" value="Отправить!">
</form>

<?php

if (file_exists(FILE_NAME)) {

    $lines = file(FILE_NAME);


    foreach ($lines as $index => $line) {
        echo ($index + 1) . ". " . htmlspecialchars($line) . "<br>";
    }


    echo "Размер файла: " . filesize(FILE_NAME) . " байт";
}
?>

</body>
</html>
