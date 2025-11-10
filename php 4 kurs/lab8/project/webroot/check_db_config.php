<?php

require_once dirname(__FILE__) . '/../config/connection.php';

echo "<h2>Проверка настроек подключения к базе данных</h2>";

echo "<h3>Текущие настройки в connection.php:</h3>";
echo "<ul>";
echo "<li><strong>DB_HOST:</strong> " . DB_HOST . "</li>";
echo "<li><strong>DB_USER:</strong> " . DB_USER . "</li>";
echo "<li><strong>DB_NAME:</strong> " . DB_NAME . "</li>";
echo "<li><strong>DB_PASS:</strong> " . (DB_PASS ? "***установлен (длина: " . strlen(DB_PASS) . " символов)***" : "не установлен") . "</li>";
echo "</ul>";

echo "<hr>";

echo "<h3>Проверка подключения с разными вариантами хоста:</h3>";

$hosts = ['localhost', '127.0.0.1', '10.0.1.23', '10.0.2.30'];

foreach ($hosts as $host) {
    echo "<h4>Проверка подключения к: <strong>$host</strong></h4>";
    
    $link = @mysqli_connect($host, DB_USER, DB_PASS, DB_NAME);
    
    if ($link) {
        echo "<p style='color: green;'><strong>✓ УСПЕХ! Подключение работает с хостом: $host</strong></p>";
        
        $result = mysqli_query($link, "SELECT USER(), CURRENT_USER(), DATABASE()");
        $row = mysqli_fetch_row($result);
        echo "<ul>";
        echo "<li>Пользователь: " . $row[0] . "</li>";
        echo "<li>Текущий пользователь: " . $row[1] . "</li>";
        echo "<li>База данных: " . $row[2] . "</li>";
        echo "</ul>";
        
        mysqli_close($link);
        echo "<p><strong>Рекомендуется использовать хост: <code>$host</code></strong></p>";
        break;
    } else {
        $error = mysqli_connect_error();
        $errno = mysqli_connect_errno();
        echo "<p style='color: red;'>✗ Ошибка: $error (код: $errno)</p>";
    }
    echo "<br>";
}

echo "<hr>";

echo "<h3>Инструкция по смене пароля в панели хостинга:</h3>";

echo "<h4>Beget:</h4>";
echo "<ol>";
echo "<li>Войдите в панель управления Beget</li>";
echo "<li>Перейдите в раздел <strong>Базы данных</strong> → <strong>MySQL</strong></li>";
echo "<li>Найдите пользователя <strong>" . DB_USER . "</strong></li>";
echo "<li>Нажмите на кнопку <strong>Изменить пароль</strong> или <strong>Показать пароль</strong></li>";
echo "<li>Скопируйте пароль или установите новый</li>";
echo "<li>Обновите пароль в файле <code>project/config/connection.php</code></li>";
echo "</ol>";

echo "<h4>SpaceWeb:</h4>";
echo "<ol>";
echo "<li>Войдите в панель управления SpaceWeb</li>";
echo "<li>Перейдите в раздел <strong>Базы данных</strong> → <strong>MySQL</strong></li>";
echo "<li>Найдите пользователя <strong>" . DB_USER . "</strong></li>";
echo "<li>Нажмите на кнопку <strong>Изменить</strong> или <strong>Показать пароль</strong></li>";
echo "<li>Скопируйте пароль или установите новый</li>";
echo "<li>Обновите пароль в файле <code>project/config/connection.php</code></li>";
echo "</ol>";

echo "<hr>";

echo "<h3>SQL команда для смены пароля (если есть доступ к root):</h3>";
echo "<pre>";
echo "ALTER USER '" . DB_USER . "'@'localhost' IDENTIFIED BY 'новый_пароль';\n";
echo "FLUSH PRIVILEGES;";
echo "</pre>";
echo "<p><em>Внимание: Эта команда требует прав администратора БД</em></p>";

?>

