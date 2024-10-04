<?php
$cols = 10;
$rows = 10;
$color = '#ffff00';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$cols = abs((int) $_POST['cols']);
	$rows = abs((int) $_POST['rows']);
	$color = trim(strip_tags($_POST['color']));
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Таблица умножения</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Область основного контента -->
    <form action='<?=$_SERVER['REQUEST_URI']?>' method='POST'>
      <label>Количество колонок: </label>
      <br>
      <input name='cols' type='text' value="<?=@$_POST['cols']?>">
      <br>
      <label>Количество строк: </label>
      <br>
      <input name='rows' type='text' value="<?=@$_POST['rows']?>">
      <br>
      <label>Цвет: </label>
      <br>
      <input name='color' type='color' value="<?=@$_POST['color']?>" list="listColors">
	<datalist id="listColors">
		<option>#ff0000</option>/>
		<option>#00ff00</option>
		<option>#0000ff</option>
	</datalist>
      <br>
      <br>
      <input type='submit' value='Создать'>
    </form>
    <br>
    <!-- Таблица -->
    <? getTable($cols, $rows, $color) ?>
    <!-- Таблица -->
    <!-- Область основного контента -->
</body>
</html>