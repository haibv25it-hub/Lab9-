<?php

session_start();

require_once "../connect.php";

if (isset($_POST['cancel'])) {
    header("Location: dangnhap.php");
    exit;
}

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users_bai10 WHERE Username = ? AND Password = ?";

    $stmt = mysqli_prepare($connect, $sql);

    mysqli_stmt_bind_param($stmt, "ss", $username, $password);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {

        $_SESSION['username'] = $username;

        if (isset($_POST['remember'])) {
            setcookie(
                "username",
                $username,
                time() + 3600,
                "/"
            );
        }

        header("Location: trangquantriadmin.php");
        exit;

    } else {

        echo "<script>
            alert('Đăng nhập thất bại!');
            location.href='dangnhap.php';
        </script>";
    }
}

?>