<?php
require_once 'NewsDB.class.php';

$news = new NewsDB();
$errMsg = "";

if (isset($_GET['delete'])) {
    include 'delete_news.inc.php';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'save_news.inc.php';
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Новостная лента</title>
  <meta charset="utf-8">
  <style>
    .news-item {
      border: 1px solid #ccc;
      margin: 10px 0;
      padding: 10px;
      border-radius: 5px;
    }
    .news-title {
      font-weight: bold;
      font-size: 16px;
      color: #333;
    }
    .news-category {
      color: #666;
      font-style: italic;
    }
    .news-source {
      color: #888;
      font-size: 12px;
    }
    .news-date {
      color: #999;
      font-size: 12px;
    }
    .delete-link {
      color: red;
      text-decoration: none;
      font-size: 12px;
    }
    .error {
      color: red;
      background-color: #ffe6e6;
      padding: 10px;
      border-radius: 5px;
      margin: 10px 0;
    }
  </style>
</head>
<body>
  <h1>Последние новости</h1>
  
  <?php
  if ($errMsg !== "") {
      echo "<div class='error'>" . htmlspecialchars($errMsg) . "</div>";
  }
  ?>
  
  <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
    Заголовок новости:<br>
    <input type="text" name="title"><br>
    Выберите категорию:<br>
    <select name="category">
      <option value="1">Политика</option>
      <option value="2">Культура</option>
      <option value="3">Спорт</option>
    </select>
    <br />
    Текст новости:<br>
    <textarea name="description" cols="50" rows="5"></textarea><br>
    Источник:<br>
    <input type="text" name="source"><br>
    <br>
    <input type="submit" value="Добавить!">
  </form>
  
  <?php
  include 'get_news.inc.php';
  ?>
</body>
</html>
