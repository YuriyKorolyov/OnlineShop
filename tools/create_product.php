<?php
require_once '../connection.php';
require_once '../Product.php';

$change=$_POST['ProductName'];
$product = new Product(new Database());
$products = $product->createProduct($change);
header('Location: /');
?>