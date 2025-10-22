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

        if (!file_exists($db_file) || filesize($db_file) === 0) {
            try {
                $dsn = 'sqlite:' . $db_file;
                $this->_db = new PDO($dsn);
                $this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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

                    $this->_db->exec("INSERT INTO category(id, name) VALUES (1, 'Политика')");
                    $this->_db->exec("INSERT INTO category(id, name) VALUES (2, 'Культура')");
                    $this->_db->exec("INSERT INTO category(id, name) VALUES (3, 'Спорт')");

                    $this->_db->commit();
                    
                } catch (PDOException $e) {
                    if ($this->_db->inTransaction()) {
                        $this->_db->rollBack();
                    }
                    die("Ошибка: невозможно создать базу данных. " . $e->getMessage() . " (Код: " . $e->getCode() . ")");
                }
                
            } catch (PDOException $e) {
                die("Ошибка: невозможно создать базу данных. " . $e->getMessage() . " (Код: " . $e->getCode() . ")");
            }
        } else {
            try {
                $dsn = 'sqlite:' . $db_file;
                $this->_db = new PDO($dsn);
                $this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            } catch (PDOException $e) {
                die("Ошибка подключения к базе данных: " . $e->getMessage() . " (Код: " . $e->getCode() . ")");
            }
        }
    }

    public function __destruct() {
        $this->_db = null;
    }

    public function saveNews($title, $category, $description, $source) {
        try {
            $quotedTitle = $this->_db->quote($title);
            $quotedCategory = $this->_db->quote($category);
            $quotedDescription = $this->_db->quote($description);
            $quotedSource = $this->_db->quote($source);
            $quotedDatetime = $this->_db->quote(time());

            $sql = "INSERT INTO msgs (title, category, description, source, datetime) 
                    VALUES ($quotedTitle, $quotedCategory, $quotedDescription, $quotedSource, $quotedDatetime)";
            
            $result = $this->_db->exec($sql);
            
            return $result !== false;
            
        } catch (PDOException $e) {
            error_log("Ошибка saveNews: " . $e->getMessage() . " (Код: " . $e->getCode() . ")");
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

            if (!$result) {
                $errorInfo = $this->_db->errorInfo();
                error_log("Ошибка getNews: " . $errorInfo[2] . " (Код: " . $this->_db->errorCode() . ")");
                return false;
            }

            $news = [];
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $news[] = $row;
            }
            
            return $news;
            
        } catch (PDOException $e) {
            error_log("Ошибка getNews: " . $e->getMessage() . " (Код: " . $e->getCode() . ")");
            return false;
        }
    }

    public function deleteNews($id) {
        try {
            $quotedId = $this->_db->quote($id);
            
            $countQuery = "SELECT COUNT(*) as count FROM msgs WHERE id = $quotedId";
            $countResult = $this->_db->query($countQuery);
            
            if (!$countResult) {
                $errorInfo = $this->_db->errorInfo();
                error_log("Ошибка deleteNews (проверка): " . $errorInfo[2] . " (Код: " . $this->_db->errorCode() . ")");
                return false;
            }
            
            $countRow = $countResult->fetch(PDO::FETCH_ASSOC);

            if ($countRow['count'] == 0) {
                return false;
            }

            $deleteQuery = "DELETE FROM msgs WHERE id = $quotedId";
            $result = $this->_db->exec($deleteQuery);

            return $result === 1;
            
        } catch (PDOException $e) {
            error_log("Ошибка deleteNews: " . $e->getMessage() . " (Код: " . $e->getCode() . ")");
            return false;
        }
    }
}
?>
