<?php
require_once '../connection.php';
require_once '../Product.php';

$product_id = $_GET['id'];
$product = new Product(new Database());
$product->deleteProduct($product_id);
header('Location: /');
?>