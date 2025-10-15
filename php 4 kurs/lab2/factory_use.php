<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'patterns/factory//router.php';
require_once 'patterns/factory/models/collection.php';
require_once 'patterns/factory/models/users.php';

use Factory\Models\Users;

$usersObj = new Users();

foreach ($usersObj->users as $user) {
    echo "Email: " . $user['email'] . PHP_EOL;
    echo "First Name: " . $user['first_name'] . PHP_EOL;
    echo "Last Name: " . $user['last_name'] . PHP_EOL;
    echo "-----------------------------" . PHP_EOL;
}
