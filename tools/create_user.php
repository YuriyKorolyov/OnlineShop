<?php
require_once '../connection.php';
require_once '../User.php';

$change=$_POST['Username'];
$user = new User(new Database());
$users = $user->createUser($change);
header('Location: /');
?>



