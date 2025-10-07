<?php
declare(strict_types=1);

namespace MyProject\Classes;

require_once 'User.php';
require_once 'SuperUserInterface.php';

class SuperUser extends User implements SuperUserInterface {
    public static int $count = 0;
    public $role;

    public function __construct($name, $login, $password, $role) {
        parent::__construct($name, $login, $password);
        $this->role = $role;
    }

    public function showInfo(): void {
        parent::showInfo();
        echo "Роль: " . $this->role . "<br>";
    }

    public function getInfo(): array {
        return [
            'name' => $this->name,
            'login' => $this->login,
            'role' => $this->role
        ];
    }
}
?>