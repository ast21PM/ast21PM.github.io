<?php

require_once 'patterns/singleton/Settings.php';

$settings = Settings::get();

$settings->count = 47;
$settings->name = "Энтони «Тони» Сопрано";
$settings->enabled = false;

echo "Count: " . $settings->count . PHP_EOL;
echo "Name: " . $settings->name . PHP_EOL;
echo "Enabled: " . ($settings->enabled ? 'true' : 'false') . PHP_EOL;
