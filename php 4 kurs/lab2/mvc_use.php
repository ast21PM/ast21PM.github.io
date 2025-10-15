<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'patterns/factory/models/users.php';
require_once 'patterns/mvc/views/MarkdownView.php';

use Mvc\Models\Users;
use Mvc\Views\MarkdownView;

$usersObj = new Users();
$users = $usersObj->users;

$view = new MarkdownView($users);
echo $view->render();
