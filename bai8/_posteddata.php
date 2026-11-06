<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kết quả CKEditor</title>
</head>
<body>

    <h2>NỘI DUNG ĐÃ NHẬP</h2>

    <?php
    if (isset($_POST['tomtat'])) {
        echo $_POST['tomtat'];
    }
    ?>

    <br><br>
    <a href="index.php">Quay lại</a>

</body>
</html>