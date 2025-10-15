<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'patterns/factory/router.php';
require_once 'patterns/factory/models/collection.php';
require_once 'patterns/factory/models/user.php';
require_once 'patterns/factory/models/users.php';
require_once 'patterns/mvc/views/MarkdownView.php';


use Mvc\Views\MarkdownView;
use Factory\Models\Users;

$usersObj = new Users();
$users = $usersObj->users;

$view = new MarkdownView($users);
echo nl2br($view->render());

