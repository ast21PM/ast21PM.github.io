<?php
use Classes\User;
use Classes\SuperUser;

function my_autoloader($class) {
    $path = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
    include $path;
}

spl_autoload_register('my_autoloader');

$user1 = new User("Ivan", "ivanovivan", "password1");
$user2 = new User("Alex", "alexJumboo", "password2");
echo "<br>";

$user1->showInfo();
$user2->showInfo();
echo "<br>";

$user = new SuperUser("Petya", "petya_admin", "password1", "admin");
$user->showInfo();
echo "<br>";

?>