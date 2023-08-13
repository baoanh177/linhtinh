<?php
    $mes = '';
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['username'];
        $password = $_POST['password'];
        if($name == 'admin' && $password == '000000') {
            setcookie('username', $name, time() + 30);
            setcookie('password', $password, time() + 30);
            header("location: index.php");
        }else {
            $mes = "Ten dang nhap hoac mat khau khong dung";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta password="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Đăng nhập</h2>
    <form action="login.php" method="post">
        Username: <input type="text" name="username"><br><br>
        Password: <input type="password" name="password"><br>
        <b style="color: red;"><?php echo $mes; ?></b><br><br>
        <button type="submit">Đăng nhập</button>
    </form>
</body>
</html>