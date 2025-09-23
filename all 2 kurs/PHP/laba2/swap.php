<?php
function swap(&$a, &$b) {
    $temp = $a;
    $a = $b;
    $b = $temp;
}
$a = 5;
$b = 8;
echo "До обмена: a = $a, b = $b\n; ";
swap($a, $b);
echo "После обмена: a = $a, b = $b\n";
?>
