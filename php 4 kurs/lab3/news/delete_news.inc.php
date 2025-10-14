<?php
$deleteId = isset($_GET['delete']) ? $_GET['delete'] : null;

if ($deleteId === null || !is_numeric($deleteId) || intval($deleteId) <= 0) {
    header("Location: news.php");
    exit();
}

$deleteId = intval($deleteId);

$deleteResult = $news->deleteNews($deleteId);

if ($deleteResult === false) {
    $errMsg = "Произошла ошибка при удалении новости";
} else {
    header("локация: news.php");
    exit();
}
?>
