<?php
require_once '../connection.php';
require_once '../Product.php';
$db = new Database();
$order_id = $_GET['id'];

$product = new Product(new Database());
$products = $product->readProducts();

$stmt = $db->executePreparedStatement("SELECT * FROM orderdetails WHERE OrderID = $order_id", []);
$order = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Изменить</title>
</head>
<body>
    <h3>Изменить товар</h3>
    <form action="update_orderdetails_.php" method="POST">
        <?php
            echo '<input type="hidden" name="order_id" value="'.$order_id.'">';
            echo '<p>Количество:</p>'.'<input type="text" name="Quantity" value="'.$order['Quantity'].'">';

            echo '<p>Товар:</p>';
            echo '<select name="selectedColumnProduct">';
            foreach ($products as $product): 
                echo '<option value="' . $product['ProductID'] . '">' . $product['ProductName'] . '</option>';
            endforeach; 
            echo '</select>';
        ?>
        <br></br>

        <button type="submit">Изменить</button>
    </form>
</body>
</html>