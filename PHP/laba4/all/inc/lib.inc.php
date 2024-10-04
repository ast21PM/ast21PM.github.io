<?php
/**
 * Возвращает таблицу умножения.
 * @param int $cols Количество колонок в таблице. По умолчанию 2.
 * @param int $rows Количество строк в таблице. По умолчанию 2.
 * @param string $color Цвет фона таблицы. По умолчанию белый.
 * @return int Число вызовов функции.
 */
function getTable(int $cols = 2, int $rows = 2, string $color = 'white') {
  static $count = 0;
  ++$count;
  echo "<table>";
  for ($i = 1; $i <= $rows; $i++) {
      echo "<tr>";
      for ($j = 1; $j <= $cols; $j++) {
          if ($i == 1 || $j == 1) {
              echo "<th style='background-color: {$color};'>" . ($i * $j) . "</th>";
          } else {
              echo "<td>" . ($i * $j) . "</td>";
          }
      }
      echo "</tr>";
  }
  echo "</table>";
  return $count;
}

/**
* Отрисовывает меню на основе переданного массива и режима отображения.
*
* @param array $menu Массив, описывающий структуру меню.
* @param bool $vertical Режим отображения меню (true - вертикально, false - горизонтально).
* @return void
*/
function getMenu(array $menu, bool $vertical = true) {
    if(!is_array($menu)) {
        throw new Exception("Неправильно передан массив меню");        
    }
    echo ($vertical) ? "<ul class='menu vertical'>" : "<ul class='menu'>";
    foreach ($menu as $item) {
        echo "<li><a href='" . $item['href'] . "'>" . $item['link'] . "</a></li>";
    }
    echo "</ul>";
}

?>