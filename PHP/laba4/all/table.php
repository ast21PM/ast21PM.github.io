<?php
$cols = 10;
$rows = 10;
$color = '#ff0000';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cols = abs((int) $_POST['cols']);
    $rows = abs((int) $_POST['rows']);
    $color = trim(strip_tags($_POST['color']));
}
?>
    <!-- Область основного контента -->
    <form action='<?=$_SERVER['REQUEST_URI']?>' method='POST'>
      <label>Количество колонок: </label>
      <br>
      <input name='cols' type='number' value="<?= htmlspecialchars($cols) ?>">
      <br>
      <label>Количество строк: </label>
      <br>
      <input name='rows' type='number' value="<?= htmlspecialchars($rows) ?>">
      <br>
      <label>Цвет: </label>
      <br>
      <input name='color' type='color' value="<?= htmlspecialchars($color) ?>" list="listColors">
	<datalist id="listColors">
		<option>#ff0000</option>
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