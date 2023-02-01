<?php
session_start();
require("../scripts/database_connection.php");

if(isset($_GET['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $dbConnection->prepare("SELECT * FROM admins WHERE username = :username");
    $res = $stmt->execute(array('username' => $username));
    $user = $stmt->fetch();

    if($user !== false && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['user_id'];
        header('Location: trip_manager.php');
        exit;
    } else {
        $errorMessage = "Username or Password was Wrong<br>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<?php
if(isset($errorMessage)) {
    echo $errorMessage;
}
?>
<form action="?login=1" method="post">
    Username:<br>
    <input type="text" size="40" maxlength="250" name="username">
    Password:<br>
    <input type="password" size="40" maxlength="250" name="password">
    <input type="submit" value="LogIn">
</form>
</body>
</html>