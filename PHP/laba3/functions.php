<?php

$extensions = get_loaded_extensions();


foreach ($extensions as $extension) {
    echo "<h2>Модуль: $extension</h2>";
    
    $functions = get_extension_funcs($extension);
    
    if ($functions !== false) {
        echo "<ul>";
        foreach ($functions as $function) {
            echo "<li>$function</li>";
        }
        echo "</ul>";
    } else {
        echo "Функции для данного модуля недоступны.<br>";
    }
}
?>
