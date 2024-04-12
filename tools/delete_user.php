<?php
require_once '../connection.php';
require_once '../User.php';

$user_id = $_GET['id'];
$user = new User(new Database());
$user->deleteUser($user_id);
header('Location: /');
?>