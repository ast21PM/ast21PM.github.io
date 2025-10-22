<?php
require_once 'INewsDB.class.php';

class NewsDB implements INewsDB {
    const DB_NAME = 'news.db';
    private $_db;

    protected function getDb() {
        return $this->_db;
    }

    public function __construct() {
        $db_file = self::DB_NAME;

        if (!file_exists($db_file)) {
            die("Ошибка: файл news.db не найден. Создайте пустой файл news.db!");
        }
        if (filesize($db_file) === 0) {
            die("Ошибка: файл news.db существует, но его размер 0 байт. Возможна ошибка создания или инициализации базы.");
        }

        try {
            $dsn = 'sqlite:' . $db_file;
            $this->_db = new PDO($dsn);
            $this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $categoryTable = $this->_db->query("SELECT name FROM sqlite_master WHERE type='table' AND name='category'")->fetch(PDO::FETCH_ASSOC);
            $msgsTable = $this->_db->query("SELECT name FROM sqlite_master WHERE type='table' AND name='msgs'")->fetch(PDO::FETCH_ASSOC);

            if (!$categoryTable || !$msgsTable) {
                $this->_db->beginTransaction();
                try {
                    $this->_db->exec("
                        CREATE TABLE IF NOT EXISTS msgs(
                            id INTEGER PRIMARY KEY AUTOINCREMENT,
                            title TEXT,
                            category INTEGER,
                            description TEXT,
                            source TEXT,
                            datetime INTEGER
                        )");

                    $this->_db->exec("
                        CREATE TABLE IF NOT EXISTS category(
                            id INTEGER PRIMARY KEY,
                            name TEXT
                        )");

                        $this->_db->exec("INSERT INTO category(id name) VALUES (1, 'Политика')");
                        $this->_db->exec("INSERT INTO category(id, name) VALUES (2, 'Культура')");
                        $this->_db->exec("INSERT INTO category(id, name) VALUES (3, 'Спорт')");
                        

                    $this->_db->commit();
                } catch (PDOException $e) {
                    if ($this->_db->inTransaction()) {
                        $this->_db->rollBack();
                    }
                    die("Ошибка создания/инициализации базы: " . $e->getMessage() . " Код: " . $e->getCode());
                }
            }
        } catch (PDOException $e) {
            die("Ошибка подключения к базе данных: " . $e->getMessage() . " Код: " . $e->getCode());
        }
    }

    public function __destruct() {
        $this->_db = null;
    }

    public function saveNews($title, $category, $description, $source) {
        try {
            $sql = "INSERT INTO msgs (title, category, description, source, datetime) 
                    VALUES (:title, :category, :description, :source, :datetime)";
            $stmt = $this->_db->prepare($sql);
            $stmt->bindValue(':title', $title, PDO::PARAM_STR);
            $stmt->bindValue(':category', $category, PDO::PARAM_INT);
            $stmt->bindValue(':description', $description, PDO::PARAM_STR);
            $stmt->bindValue(':source', $source, PDO::PARAM_STR);
            $stmt->bindValue(':datetime', time(), PDO::PARAM_INT);

            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getNews() {
        try {
            $query = "
                SELECT msgs.id as id, title, category.name as category, description, source, datetime
                FROM msgs 
                LEFT JOIN category ON category.id = msgs.category
                ORDER BY msgs.id DESC
            ";
            $result = $this->_db->query($query);

            if (!$result) return false;

            $news = [];
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $news[] = $row;
            }
            return $news;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function deleteNews($id) {
        try {
            $countQuery = "SELECT COUNT(*) as count FROM msgs WHERE id = " . $this->_db->quote($id);
            $countResult = $this->_db->query($countQuery)->fetch(PDO::FETCH_ASSOC);

            if ($countResult['count'] == 0) {
                return false;
            }

            $stmt = $this->_db->prepare("DELETE FROM msgs WHERE id = :id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->rowCount() === 1;
        } catch (PDOException $e) {
            return false;
        }
    }
}
?>
