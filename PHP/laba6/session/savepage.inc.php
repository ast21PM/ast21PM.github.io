<?php
// Код для всех страниц - сохранение информации о посещенных страницах
if (!isset($_SESSION['visitedPages'])) {
    $_SESSION['visitedPages'] = [];
}

$current_page = $_SERVER['REQUEST_URI'];
$parsed_url = parse_url($current_page, PHP_URL_PATH);
$_SESSION['visitedPages'][] = $parsed_url;
?>