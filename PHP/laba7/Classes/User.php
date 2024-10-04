<?php
namespace Classes;


class User {
    public $name;
    public $login;
    private $password;
    
    public function __construct($name, $login, $password) {
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
        echo "Пользователь {$this->login} создан.<br>";
    }  
    
    public function showInfo() {
        echo "Имя: " .$this->name .", логин: " .$this->login ."<br>";
    }
    
    public function __destruct() {
        echo "Пользователь {$this->login} удален.<br>";
    }    
}
?>