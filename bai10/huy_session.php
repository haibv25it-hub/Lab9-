<?php
session_start();

unset($_SESSION['name']);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Hủy Session</title>
</head>
<body>

    <h2>ĐÃ HỦY SESSION NAME</h2>

    <?php
    echo "Tên: ";

    if (isset($_SESSION['name'])) {
        echo $_SESSION['name'];
    } else {
        echo "Session name đã bị xóa!";
    }

    echo "<br>";

    if (isset($_SESSION['age'])) {
        echo "Tuổi: " . $_SESSION['age'];
    }
    ?>

    <br><br>

    <a href="session.php">Quay lại</a>

</body>
</html>