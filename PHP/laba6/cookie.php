<?php

$visits = 0;
$lastVisit = '';


if (isset($_COOKIE['visits'])) {

    $visits = (int) $_COOKIE['visits'];
    $lastVisit = trim(htmlspecialchars($_COOKIE['lastVisit']));
}


$visits++;


setcookie('visits', $visits, time() + 86400); 
setcookie('lastVisit', date('d-m-Y H:i:s'), time() + 86400);


?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Последний визит</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
            font-family: Arial, sans-serif;
        }
        h1 {
            font-size: 2em;
        }
        p {
            font-size: 1.5em;
        }
    </style>
</head>
<body>

<h1>Последний визит</h1>

<?php
if ($visits === 1) {
    echo "<p>Добро пожаловать!</p>";
} else {
    echo "<p>Вы зашли на страницу $visits раз(а)</p>";
    echo "<p>Последнее посещение: $lastVisit</p>";
}
?>

</body>
</html>
