<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
</head>
<body>

    <h2>ĐĂNG NHẬP</h2>

    <form action="dangnhap_xuly.php" method="post">

        <label>Username:</label>
        <input type="text" name="username" required>

        <br><br>

        <label>Password:</label>
        <input type="password" name="password" required>

        <br><br>

        <input type="checkbox" name="remember" value="1">
        Remember me

        <br><br>

        <input type="submit" name="login" value="Login">

        <input type="submit" name="cancel" value="Cancel">

    </form>

</body>
</html>