<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'NewsDB.class.php';
$news = new NewsDB();
$errMsg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'save_news.inc.php';
}

if (isset($_GET['delete'])) {
    require 'delete_news.inc.php';
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Новостная лента</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 20px auto; }
        h1 { text-align: center; }
        .error { color: #a00; background: #fee; padding: 10px; border: 1px solid #f99; border-radius: 4px; margin-bottom: 20px; }
        form { background: #f4f4f4; padding: 15px; border-radius: 4px; margin-bottom: 30px; }
        form input, form select, form textarea { width: 100%; padding: 8px; margin: 5px 0 15px; border: 1px solid #ccc; border-radius: 4px; }
        form input[type="submit"] { width: auto; background: #28a745; color: #fff; cursor: pointer; padding: 10px 20px; border: none; border-radius: 4px; }
        form input[type="submit"]:hover { background: #218838; }
        .news-item { border: 1px solid #ddd; padding: 15px; border-radius: 4px; margin-bottom: 20px; }
        .news-title { font-weight: bold; font-size: 1.2em; margin-bottom: 5px; }
        .news-category { color: #666; font-style: italic; }
        .news-source, .news-date { color: #888; font-size: 12px; }
        .delete-link { color: #c00; text-decoration: none; font-size: 0.9em; }
        .delete-link:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <h1>Последние новости</h1>

    <?php if ($errMsg !== ''): ?>
        <div class="error"><?= htmlspecialchars($errMsg, ENT_QUOTES, 'UTF-8') ?></div>
    <?php endif ?>

    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'UTF-8') ?>" method="post">
        <label>Заголовок новости:</label><br>
        <input type="text" name="title" required>

        <label>Категория:</label><br>
        <select name="category" required>
            <option value="">— Выберите —</option>
            <?php foreach ($news as $id => $name): ?>
                <option value="<?= htmlspecialchars($id, ENT_QUOTES, 'UTF-8') ?>">
                    <?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label>Текст новости:</label><br>
        <textarea name="description" rows="5" required></textarea>

        <label>Источник:</label><br>
        <input type="text" name="source" required>

        <input type="submit" value="Добавить новость">
    </form>

    <?php include 'get_news.inc.php'; ?>
</body>
</html>
