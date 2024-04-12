<?php
require_once '../connection.php';
require_once '../User.php';
$db = new Database();
$order_id = $_GET['id'];

$user = new User(new Database());
$users = $user->readUsers();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Изменить</title>
</head>
<body>
    <h3>Изменить товар</h3>
    <form action="update_order_.php" method="POST">
        <?php
            echo '<input type="hidden" name="order_id" value="'.$order_id.'">';
            echo '<p>Пользователь:</p>';
            echo '<select name="selectedColumnUser">';
            foreach ($users as $user): 
                echo '<option value="' . $user['UserID'] . '">' . $user['Username'] . '</option>';
            endforeach; 
            echo '</select>';
        ?>
        <br></br>

        <button type="submit">Изменить</button>
    </form>
</body>
</html>
