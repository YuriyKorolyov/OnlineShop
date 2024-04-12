<?php
require_once '../connection.php';
require_once '../OrderDetail.php';
$order = new OrderDetail (new Database());

$id=$_POST['order_id']; 
$change1=$_POST['selectedColumnProduct'];   
$change2=$_POST['Quantity'];     

$order->updateOrderDetail($id, $change1, $change2);

header('Location: /');
?>