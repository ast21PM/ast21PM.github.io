<?php
$file = 'NewsDB.class.php';

$contents = file_get_contents($file);

$contents = str_replace(
    "INSERT INTO category(id, name)",
    "INSET INTO category(id, name)", 
    $contents
);

file_put_contents($file, $contents);

echo "Ошибка внесена.\n";
?>
