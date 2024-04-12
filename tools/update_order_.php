<?php
require_once '../connection.php';
require_once '../Order.php';
$order = new Order (new Database());

$id=$_POST['order_id']; 
$change1=$_POST['selectedColumnUser'];    

$order->updateOrder($id, $change1);

header('Location: /');
?>