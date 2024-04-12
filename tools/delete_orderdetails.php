<?php
require_once '../connection.php';
require_once '../OrderDetail.php';

$order_id = $_GET['id'];
$order = new OrderDetail(new Database());
$order->deleteOrderDetail($order_id);
header('Location: /');
?>