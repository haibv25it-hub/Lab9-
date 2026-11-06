<?php
session_start();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kiểm tra Session</title>
</head>
<body>

    <h2>KIỂM TRA SESSION</h2>

    <?php
    if (isset($_SESSION['name'])) {
        echo "Xin chào " . $_SESSION['name'] . "<br>";
        echo "Tuổi của bạn: " . $_SESSION['age'];
    } else {
        echo "Session không tồn tại!";
    }
    ?>

    <br><br>

    <a href="huy_session.php">Hủy Session</a>

</body>
</html>