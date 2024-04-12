<?php
require_once 'connection.php';
$db = new Database();
$user_id = $_GET['id'];

$stmt = $db->executePreparedStatement("SELECT * FROM users WHERE UserID = $user_id", []);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Изменить</title>
</head>
<body>
    <h3>Изменить товар</h3>
    <form action="tools/update_user_.php" method="POST">
        <?php
            echo '<input type="hidden" name="id" value="'.$user_id.'">';
            echo '<p>Пользователь</p>'.'<input type="text" name="Username" value="'.$user["Username"].'">';
            echo '<p>Email</p>'.'<input type="text" name="Email" value="'.$user["Email"].'">';
        ?>
        <br></br>

        <button type="submit">Изменить</button>
    </form>
</body>
</html>

