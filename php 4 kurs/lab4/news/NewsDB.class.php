<?php
require_once 'INewsDB.class.php';

class NewsDB implements INewsDB, IteratorAggregate
{
    const DB_NAME = 'news.db';
    private $_db;
    private $items = [];

    public function __construct()
    {
        try {
            $this->_db = new SQLite3(self::DB_NAME);
            $this->_db->busyTimeout(5000);
            $this->initDatabase();
            $this->getCategories();
        } catch (Exception $e) {
            die("Ошибка подключения к базе данных: " . $e->getMessage());
        }
    }

    public function __destruct()
    {
        if ($this->_db) {
            $this->_db->close();
        }
    }

    protected function getDb()
    {
        return $this->_db;
    }

    private function initDatabase()
    {
        $tableExists = $this->_db->querySingle(
            "SELECT name FROM sqlite_master WHERE type='table' AND name='msgs'"
        );
        if (!$tableExists) {
            $this->_db->exec("
                CREATE TABLE msgs(
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    title TEXT,
                    category INTEGER,
                    description TEXT,
                    source TEXT,
                    datetime INTEGER
                )
            ");
            $this->_db->exec("
                CREATE TABLE category(
                    id INTEGER PRIMARY KEY,
                    name TEXT
                )
            ");
            $this->_db->exec("INSERT INTO category(id, name) VALUES (1, 'Политика')");
            $this->_db->exec("INSERT INTO category(id, name) VALUES (2, 'Культура')");
            $this->_db->exec("INSERT INTO category(id, name) VALUES (3, 'Спорт')");
        }
    }

    private function getCategories(): void
    {
        $sql = "SELECT id, name FROM category";
        $result = $this->_db->query($sql);
        $this->items = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $this->items[$row['id']] = $row['name'];
        }
    }

    public function saveNews($title, $category, $description, $source)
    {
        try {
            $stmt = $this->_db->prepare("
                INSERT INTO msgs (title, category, description, source, datetime) 
                VALUES (?, ?, ?, ?, ?)
            ");
            if (!$stmt) {
                return false;
            }
            $stmt->bindValue(1, $title,    SQLITE3_TEXT);
            $stmt->bindValue(2, (int)$category, SQLITE3_INTEGER);
            $stmt->bindValue(3, $description, SQLITE3_TEXT);
            $stmt->bindValue(4, $source,     SQLITE3_TEXT);
            $stmt->bindValue(5, time(),      SQLITE3_INTEGER);
            $result = $stmt->execute();
            return $result !== false;
        } catch (Exception $e) {
            return false;
        }
    }

    public function getNews()
    {
        try {
            $query = "
                SELECT msgs.id as id, title, category.name as category, description, source, datetime
                FROM msgs 
                LEFT JOIN category ON category.id = msgs.category
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

    public function deleteNews($id)
    {
        try {
            $checkStmt = $this->_db->prepare(
                "SELECT COUNT(*) as count FROM msgs WHERE id = ?"
            );
            if (!$checkStmt) {
                return false;
            }
            $checkStmt->bindValue(1, (int)$id, SQLITE3_INTEGER);
            $checkResult = $checkStmt->execute();
            $row = $checkResult->fetchArray(SQLITE3_ASSOC);
            if ($row['count'] == 0) {
                return false;
            }
            $stmt = $this->_db->prepare("DELETE FROM msgs WHERE id = ?");
            if (!$stmt) {
                return false;
            }
            $stmt->bindValue(1, (int)$id, SQLITE3_INTEGER);
            $result = $stmt->execute();
            return $result !== false && $this->_db->changes() === 1;
        } catch (Exception $e) {
            return false;
        }
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->items);
    }
}
