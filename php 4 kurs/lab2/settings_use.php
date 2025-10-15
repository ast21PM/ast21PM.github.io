<?php

require_once 'patterns/singleton/Settings.php';
use Singleton\Settings;

$settings = Settings::get();

$settings->count = 47;
$settings->name = "Энтони «Тони» Сопрано";
$settings->enabled = false;

echo "Count: " . $settings->count . "<br>";
echo "Name: " . $settings->name . "<br>";
echo "Enabled: " . ($settings->enabled ? 'true' : 'false') . "<br>";
