<?php
$db_file = 'news.db';
if (!file_exists($db_file)) {
    $handle = fopen($db_file, 'w');
    if ($handle) {
        fclose($handle);
        echo "Пустой файл news.db создан!";
    } else {
        echo "Ошибка создания news.db!";
    }
} else {
    echo "news.db уже существует!";
}
?>
