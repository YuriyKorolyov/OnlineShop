<?php
require_once '../connection.php';
require_once '../User.php';
$user = new User (new Database());

$id=$_POST['id']; 
$change1=$_POST['Username'];
$change2=$_POST['Email'];    

$user->updateUser($id, $change1, $change2);

header('Location: /');
?>