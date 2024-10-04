<?php
function getMenu(array $menu, bool $vertical = true): void {
    $class = $vertical ? 'menu' : 'menu horizontal';
    echo "<ul class='$class'>";

    foreach ($menu as $item) {
        echo "<li><a href='{$item['href']}'>{$item['link']}</a></li>";
    }
    echo "</ul>";
}
$leftMenu = [
    ['link' => 'Домой', 'href' => 'index.php'],
    ['link' => 'О нас', 'href' => 'about.php'],
    ['link' => 'Контакты', 'href' => 'contact.php'],
    ['link' => 'Таблица умножения', 'href' => 'table.php'],
    ['link' => 'Калькулятор', 'href' => 'calc.php']
];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Меню</title>
	<style>
		.menu {
			list-style-type: none;
			margin: 0;	
			padding: 0;
		}
		.menu li {
			margin: 5px 0;
		}
		.horizontal li {
			display: inline;
			padding: 5px;
		}
	</style>
</head>
<body>
	<h1>Меню</h1>
	<?php
	getMenu($leftMenu);
	getMenu($leftMenu, false);
	?> 
</body>
</html>
