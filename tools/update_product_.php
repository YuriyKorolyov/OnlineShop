<?php
require_once '../connection.php';
require_once '../Product.php';
$product = new Product (new Database());

$change1=$_POST['ProductName'];
$change2=$_POST['Price'];   
$id=$_POST['id'];  

$product->updateProduct($id, $change1, $change2);

header('Location: /');
?>