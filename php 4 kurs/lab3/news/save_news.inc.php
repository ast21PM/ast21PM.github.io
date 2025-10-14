<?php
if (empty($_POST['title']) || empty($_POST['category']) || empty($_POST['description']) || empty($_POST['source'])) {
    $errMsg = "Заполните все поля формы!";
} else {
    $title = trim($_POST['title']);
    $category = intval($_POST['category']);
    $description = trim($_POST['description']);
    $source = trim($_POST['source']);

    if (!in_array($category, [1, 2, 3])) {
        $errMsg = "Неверная категория!";
    } else {
        $result = $news->saveNews($title, $category, $description, $source);
        if ($result) {
            header("Location: news.php");
            exit();
        } else {
            $errMsg = "Произошла ошибка при добавлении новости";
        }
    }
}
?>
