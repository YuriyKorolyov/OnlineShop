<?php
require_once '../connection.php';
require_once '../Order.php';
require_once '../OrderDetail.php';

$user_id=$_POST['selectedColumnUser'];
$product_id=$_POST['selectedColumnProduct'];
$quantity=$_POST['Quantity'];

$order = new Order(new Database());
$order_id = $order->createOrder($user_id);

$order = new OrderDetail(new Database());
$order = $order->createOrderDetail($order_id, $product_id, $quantity);
header('Location: /');
?>