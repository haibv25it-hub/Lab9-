<?php
session_start();

if (!isset($_SESSION['name'])) {
    $_SESSION['name'] = "Hoc PHP";
    $_SESSION['age'] = 19;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Session</title>
</head>
<body>

    <h2>THÔNG TIN SESSION</h2>

    <?php
    echo "Tên bạn là: " . $_SESSION['name'] . "<br>";
    echo "Tuổi của bạn: " . $_SESSION['age'];
    ?>

    <br><br>

    <a href="test_session.php">Kiểm tra Session</a>

</body>
</html>