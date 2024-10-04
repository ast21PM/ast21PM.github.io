<?php
include 'inc/lib.inc.php';
include 'inc/data.inc.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Сайт нашей школы</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <!-- Верхняя часть страницы -->
    <? include 'inc/top.inc.php'; ?>
    <!-- Верхняя часть страницы -->
  </header>

  <section>
    <!-- Заголовок -->
    <h1>Добро пожаловать на наш сайт!</h1>
    <!-- Заголовок -->
    <!-- Область основного контента -->
    <? include 'inc/index.inc.php'; ?>
    <!-- Область основного контента -->
  </section>
  <nav>
    <!-- Навигация -->
    <? include 'inc/menu.inc.php'; ?>
    <!-- Меню -->
    <?= getMenu($menu); ?>
    <!-- Меню -->
    <!-- Навигация -->
  </nav>
  <footer>
    <!-- Нижняя часть страницы -->
    <? include 'inc/bottom.inc.php'; ?>
    <!-- Нижняя часть страницы -->
  </footer>
</body>
</html>
