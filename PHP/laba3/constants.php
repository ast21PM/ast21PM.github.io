<?php

$constants = get_defined_constants(true);


foreach ($constants as $category => $values) {
    echo "<h2>$category</h2>";
    foreach ($values as $name => $value) {
        echo "<strong>$name</strong>: " . htmlspecialchars(var_export($value, true)) . "<br>";
    }
}
?>
