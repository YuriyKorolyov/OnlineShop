<?php
require_once '../connection.php';
require_once '../Order.php';

$order_id = $_GET['id'];
$order = new Order(new Database());
$order->deleteOrder($order_id);
header('Location: /');
?>