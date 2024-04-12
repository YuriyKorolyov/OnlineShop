<?php
require 'connection.php';
require 'User.php';
require 'Product.php';
require 'Order.php';
require 'OrderDetail.php';
$user = new User(new Database());
$users = $user->readUsers();

$product = new Product (new Database());
$products = $product->readProducts();

$order = new Order(new Database());
$orders = $order->readOrders();

$orderDetail = new OrderDetail(new Database());
$orderDetails = $orderDetail->readOrderDetails();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<title>Главная страница</title>
</head>
<body>
<div class="Main">

<div class="AddStr1">
    <h3>Добавить нового пользователя</h3>
    <form action="tools/create_user.php" method="POST">
        <?php 
            echo 'Имя пользователя: <input type="text" name="Username" value="">';
        ?>
        <button type="submit">Добавить</button> 
    </form>
</div>

<div class="AddStr2">
    <h3>Добавить новый продукт</h3>
    <form action="tools/create_product.php" method="POST">
        <?php 

            echo 'Название продукта: <input type="text" name="ProductName" value="">';  
            
        ?>
        <button type="submit">Добавить</button> 
    </form>
</div>

<div class="AddStr3">
    <h3>Добавить новый заказ</h3>
    <form action="tools/create_orderdetails.php" method="POST">
        <?php 
            echo '<p>Товар:</p>';

            echo '<select name="selectedColumnProduct">';
            foreach ($products as $product): 
                echo '<option value="' . $product['ProductID'] . '">' . $product['ProductName'] . '</option>';
            endforeach; 
            echo '</select>';

            echo '<p>Количество:</p>'.'<input type="text" name="Quantity" value="0">';

            echo '<p>Пользователь:</p>';
            echo '<select name="selectedColumnUser">';
            foreach ($users as $user): 
                echo '<option value="' . $user['UserID'] . '">' . $user['Username'] . '</option>';
            endforeach; 
            echo '</select>';
        ?>
        <button type="submit">Добавить</button> 
    </form>
</div>

<div class="Table">
	<table>
	<caption>Пользователи</caption>
    <?php
        echo '<tr>';
        echo '<th>Пользователь</th>';
        echo '<th>Email</th>';
        echo '<th>Change</th>';
        echo '<th>Delete</th>';
        echo '</tr>';

        foreach ($users as $user): 
            echo '<tr>';
            echo '<td>'.$user['Username'].'</td>';
            echo '<td>'.$user['Email'].'</td>';
            echo '<td><a href="update_user.php?id=' . $user["UserID"] . '">Изменить</a></td>';
            echo '<td><a style="color:red;" href="tools/delete_user.php?id=' . $user["UserID"] . '">Удалить</a></td>';
            echo '</tr>';
        endforeach; 
    ?>		
	</table>
    <table>
    <caption>Каталог товаров</caption>
    <?php
        echo '<tr>';
        echo '<th>Товар</th>';
        echo '<th>Цена</th>';
        echo '<th>Change</th>';
        echo '<th>Delete</th>';
        echo '</tr>';

        foreach ($products as $product): 
            echo '<tr>';
            echo '<td>'.$product['ProductName'].'</td>';
            echo '<td>'.$product['Price'].'</td>';
            echo '<td><a href="update_product.php?id=' . $product["ProductID"] . '">Изменить</a></td>';
            echo '<td><a style="color:red;" href="tools/delete_product.php?id=' . $product["ProductID"] . '">Удалить</a></td>';
            echo '</tr>';
        endforeach; 
    ?>          
    </table>
    <table>
    <caption>Заказы</caption>
    <?php  
        echo '<tr>';
        echo '<th>Номер заказа</th>';
        echo '<th>Пользователь</th>';
        echo '<th>Change</th>';
        echo '<th>Delete</th>';
        echo '</tr>';  

        foreach ($orders as $order): 
            echo '<tr>';
            echo '<td>'.$order['OrderID'].'</td>';
            echo '<td>'.$order['Username'].'</td>';
            echo '<td><a href="tools/update_order.php?id=' . $order["OrderID"] . '">Изменить</a></td>';
            echo '<td><a style="color:red;" href="tools/delete_order.php?id=' . $order["OrderID"] . '">Удалить</a></td>';
            echo '</tr>';
        endforeach; 
    ?>          
    </table>
    <table>
    <caption>Информация о заказах</caption>
    <?php       
        echo '<tr>';
        echo '<th>Номер заказа</th>';
        echo '<th>Название продукта</th>';
        echo '<th>Количество</th>';
        echo '<th>Change</th>';
        echo '<th>Delete</th>';
        echo '</tr>';


        foreach ($orderDetails as $orderDetail): 
            echo '<tr>';
            echo '<td>'.$orderDetail['OrderID'].'</td>';
            echo '<td>'.$orderDetail['ProductName'].'</td>';
            echo '<td>'.$orderDetail['Quantity'].'</td>';
            echo '<td><a href="tools/update_orderdetails.php?id=' . $orderDetail["OrderID"] . '">Изменить</a></td>';
            echo '<td><a style="color:red;" href="tools/delete_orderdetails.php?id=' . $orderDetail["OrderID"] . '">Удалить</a></td>';
            echo '</tr>';
        endforeach;
    ?>          
    </table>
</div>
</div>
</body>
</html>