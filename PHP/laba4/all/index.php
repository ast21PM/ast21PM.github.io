<?php
include 'inc/lib.inc.php';
include 'inc/data.inc.php';

$welcome = date('h:i:s');
$title = 'Сайт нашей школы';
$header = "$welcome, Гость!";
$id = strtolower(strip_tags(trim($_GET['id'] ?? '')));

switch ($id) {
    case 'about':
        $title = 'О сайте';
        $header = 'О нашем сайте';
        break;
    case 'contact':
        $title = 'Контакты';
        $header = 'Обратная связь';
        break;
    case 'table':
        $title = 'Таблица умножения';
        $header = 'Таблица умножения';
        break;
    case 'calc':
        $title = 'Он-лайн калькулятор';
        $header = 'Калькулятор';
        break;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <!-- Верхняя часть страницы -->
        <?php include 'inc/top.inc.php'; ?>
        <!-- Верхняя часть страницы -->
    </header>

    <nav>
        <!-- Навигация -->
        <?php include 'inc/menu.inc.php'; ?>
        <?= getMenu($menu); ?>
        <!-- Навигация -->
    </nav>

    <section>
        <!-- Заголовок -->
        <h1><?= $header ?></h1>
        <!-- Заголовок -->

        <!-- Область основного контента -->
        <?php
        switch ($id) {
            case 'about':
                include 'about.php';
                break;
            case 'contact':
                include 'contact.php';
                break;
            case 'table':
                include 'table.php';
                break;
            case 'calc':
                ?>
                <!-- Калькулятор -->
                <div id="calculator">
                    <form action="calc_result.php" method="post">
                        <label for="num1">Число 1</label>
                        <input type="text" id="num1" name="num1">

                        <label for="operator">Оператор</label>
                        <select id="operator" name="operator">
                            <option value="+">+</option>
                            <option value="-">-</option>
                            <option value="*">*</option>
                            <option value="/">/</option>
                        </select>

                        <label for="num2">Число 2</label>
                        <input type="text" id="num2" name="num2">

                        <button type="submit">Считать!</button>
                    </form>
                </div>
                <!-- Калькулятор -->
                <?php
                break;
            default:
                include 'inc/index.inc.php';
        }
        ?>
        <!-- Область основного контента -->
    </section>

    <footer>
        <!-- Нижняя часть страницы -->
        <?php include 'inc/bottom.inc.php'; ?>
        <!-- Нижняя часть страницы -->
    </footer>
</body>
</html>
