<?php
$newsData = $news->getNews();

if ($newsData === false) {
    $errMsg = "Произошла ошибка при выводе новостной ленты";
    echo "<div class='error'>" . htmlspecialchars($errMsg) . "</div>";
} else {
    $newsCount = count($newsData);
    echo "<h2>Всего новостей: " . $newsCount . "</h2>";
    
    if ($newsCount > 0) {
        echo "<div id='news-list'>";
        
        foreach ($newsData as $newsItem) {
            echo "<div class='news-item'>";
            
            echo "<div class='news-title'>";
            echo "<a href='?view=" . $newsItem['id'] . "'>" . htmlspecialchars($newsItem['title']) . "</a>";
            echo "</div>";
            
            echo "<div class='news-category'>Категория: " . htmlspecialchars($newsItem['category']) . "</div>";
            
            echo "<div class='news-description'>" . htmlspecialchars($newsItem['description']) . "</div>";
            
            echo "<div class='news-source'>Источник: " . htmlspecialchars($newsItem['source']) . "</div>";
            
            echo "<div class='news-date'>Дата: " . date('d.m.Y H:i:s', $newsItem['datetime']) . "</div>";
            
            echo "<div style='margin-top: 10px;'>";
            echo "<a href='?delete=" . $newsItem['id'] . "' class='delete-link' onclick=\"return confirm('Вы уверены, что хотите удалить эту новость?')\">Удалить</a>";
            echo "</div>";
            
            echo "</div>";
        }
        
        echo "</div>";
    } else {
        echo "<p>Новостей пока нет.</p>";
    }
}
?>
