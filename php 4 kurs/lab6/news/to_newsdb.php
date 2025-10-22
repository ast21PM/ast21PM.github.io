<?php
$db_file = 'news.db';
$new_file = '123.db';

if (file_exists($new_file)) {
    if (rename($new_file, $db_file)) {
        echo "Файл 123.db успешно переименован в news.db";
    } else {
        echo "Ошибка переименования 123.db";
    }
} else {
    echo "Файл 123.db не найден";
}
?>
