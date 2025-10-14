<?php
require_once 'INewsDB.class.php';


class NewsDB implements INewsDB {

    const DB_NAME = 'news.db';

    private $_db;

    protected function getDb() {
        return $this->_db;
    }

    public function __construct() {
        try {
            $this->_db = new SQLite3(self::DB_NAME);

            $this->initDatabase();

        } catch (Exception $e) {
            die("Ошибка подключения к базе данных: " . $e->getMessage());
        }
    }

    public function __destruct() {
        if ($this->_db) {
            $this->_db->close();
        }
    }
    private function initDatabase() {
        $createMsgsTable = "
            CREATE TABLE IF NOT EXISTS msgs(
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                title TEXT,
                category INTEGER,
                description TEXT,
                source TEXT,
                datetime INTEGER
            )
        ";

        $createCategoryTable = "
            CREATE TABLE IF NOT EXISTS category(
                id INTEGER,
                name TEXT
            )
        ";

        $insertCategories = "
            INSERT OR IGNORE INTO category(id, name)
            SELECT 1 as id, 'Политика' as name
            UNION SELECT 2 as id, 'Культура' as name
            UNION SELECT 3 as id, 'Спорт' as name
        ";

        $this->_db->exec($createMsgsTable);
        $this->_db->exec($createCategoryTable);
        $this->_db->exec($insertCategories);
    }


    public function saveNews($title, $category, $description, $source) {
        try {
            $stmt = $this->_db->prepare("
                INSERT INTO msgs (title, category, description, source, datetime) 
                VALUES (?, ?, ?, ?, ?)
            ");

            $stmt->bindValue(1, $title, SQLITE3_TEXT);
            $stmt->bindValue(2, (int)$category, SQLITE3_INTEGER);
            $stmt->bindValue(3, $description, SQLITE3_TEXT);
            $stmt->bindValue(4, $source, SQLITE3_TEXT);
            $stmt->bindValue(5, time(), SQLITE3_INTEGER);

            $result = $stmt->execute();
            return $result !== false;

        } catch (Exception $e) {
            return false;
        }
    }

    public function getNews() {
        try {
            $query = "
                SELECT msgs.id as id, title, category.name as category, description, source, datetime
                FROM msgs, category
                WHERE category.id = msgs.category
                ORDER BY msgs.id DESC
            ";
    
            $result = $this->_db->query($query);
            
            if (!$result) {
                return false;
            }
            
            $news = [];
            while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                $news[] = $row;
            }
    
            return $news;
    
        } catch (Exception $e) {
            return false;
        }
    }
    

    public function deleteNews($id) {
        try {
            $stmt = $this->_db->prepare("DELETE FROM msgs WHERE id = ?");
            $stmt->bindValue(1, (int)$id, SQLITE3_INTEGER);

            $result = $stmt->execute();
            return $result !== false;

        } catch (Exception $e) {
            return false;
        }
    }
}

?>