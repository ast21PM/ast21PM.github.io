<?php
if (empty($_POST['title']) || empty($_POST['category']) || empty($_POST['description']) || empty($_POST['source'])) {
    $errMsg = "Заполните все поля формы!";
} else {
    $title = trim(htmlspecialchars($_POST['title']));
    $category = intval($_POST['category']);
    $description = trim(htmlspecialchars($_POST['description']));
    $source = trim(htmlspecialchars($_POST['source']));
    
    if (empty($title) || empty($description) || empty($source) || !in_array($category, [1, 2, 3])) {
        $errMsg = "Заполните все поля формы!";
    } else {
        $result = $news->saveNews($title, $category, $description, $source);
        
        if ($result) {
            header("локация: news.php");
            exit();
        } else {
            $errMsg = "Произошла ошибка при добавлении новости";
        }
    }
}
?>
