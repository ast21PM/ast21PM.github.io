<?php
require_once 'patterns/factory/models/users.php';

$usersObj = new Users();

foreach ($usersObj->users as $user) {
    echo "Email: " . $user['email'] . PHP_EOL;
    echo "First Name: " . $user['first_name'] . PHP_EOL;
    echo "Last Name: " . $user['last_name'] . PHP_EOL;
    echo "-----------------------------" . PHP_EOL;
}
