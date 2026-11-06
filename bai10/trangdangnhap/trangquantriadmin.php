<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: dangnhap.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trang quản trị</title>
</head>
<body>

    <h2>TRANG QUẢN TRỊ</h2>

    <?php
    echo "Xin chào: " . htmlspecialchars($_SESSION['username']);
    ?>

    <br><br>

    <a href="logout.php">Đăng xuất</a>

</body>
</html>