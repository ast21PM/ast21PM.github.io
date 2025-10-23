<?php
$db_file = 'news.db';
$new_file = '123.db';

if (file_exists($db_file)) {
    if (rename($db_file, $new_file)) {
        echo "Файл news.db удален";
    } else {
        echo "Ошибка в удалении news.db";
    }
} else {
    echo "Файл news.db не найден";
}
?>
