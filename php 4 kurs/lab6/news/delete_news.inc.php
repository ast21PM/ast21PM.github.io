<?php
if (!isset($_GET['delete']) || !is_numeric($_GET['delete']) || intval($_GET['delete']) <= 0) {
    header("Location: news.php");
    exit();
}

$deleteId = intval($_GET['delete']);
$result = $news->deleteNews($deleteId);

if ($result) {
    header("Location: news.php");
    exit();
} else {
    $errMsg = "Произошла ошибка при удалении новости";
}
?>
