<?php
require_once 'connection.php';
$db = new Database();
$product_id = $_GET['id'];

$stmt = $db->executePreparedStatement("SELECT * FROM products WHERE ProductID = $product_id", []);
$product = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Изменить</title>
</head>
<body>
    <h3>Изменить товар</h3>
    <form action="tools/update_product_.php" method="POST">
        <?php
            echo '<input type="hidden" name="id" value="'.$product_id.'">';
            echo '<p>Продукт</p>'.'<input type="text" name="ProductName" value="'.$product["ProductName"].'">';
            echo '<p>Цена</p>'.'<input type="text" name="Price" value="'.$product["Price"].'">';
        ?>
        <br></br>

        <button type="submit">Изменить</button>
    </form>
</body>
</html>

