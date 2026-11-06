<?php
session_start();

if (!isset($_SESSION['count'])) {
    $_SESSION['count'] = 1;
} else {
    $_SESSION['count']++;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đếm Session</title>
</head>
<body>

    <h2>SỐ LẦN TRUY CẬP</h2>

    <?php
    echo "Bạn đã truy cập: " . $_SESSION['count'] . " lần";
    ?>

    <br><br>

    <a href="tang.php">Next</a>

</body>
</html>