<?php
echo "<pre>";
$extensions = get_loaded_extensions();
foreach ($extensions as $extension => $value) {
    echo "<h2>" .$value . "</h2>";
    print_r(get_extension_funcs($value));
}
echo "</pre>";
?>