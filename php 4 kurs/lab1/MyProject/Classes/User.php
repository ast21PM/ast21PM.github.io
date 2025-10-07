<?php
declare(strict_types=1);

namespace MyProject\Classes;

require_once 'AbstractUser.php';

class User extends AbstractUser {
    public static int $count = 0;
    public $name;
    public $login;
    private $password;
    
    public function __construct($name, $login, $password) {
        self::$count++;
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
        echo "Пользователь {$this->login} создан.<br>";
    }   
    
    public function showInfo(): void {
        echo "Имя: " . $this->name . ", логин: " . $this->login . "<br>";
    }
    
    public function __destruct() {
        echo "Пользователь {$this->login} удален.<br>";
    }        
}
?>