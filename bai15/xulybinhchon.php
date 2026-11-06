<?php

require_once("config.php");

if (!isset($_GET['idPA'])) {
    die("Vui lòng chọn phương án!");
}

$idPA = (int)$_GET['idPA'];

if ($idPA <= 0) {
    die("Phương án không hợp lệ!");
}

$sql_check = "
    SELECT idPA
    FROM phuongan
    WHERE idPA = ? AND idBC = 1
";

$stmt = mysqli_prepare($config, $sql_check);

mysqli_stmt_bind_param($stmt, "i", $idPA);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) == 0) {
    die("Phương án không tồn tại!");
}

// Bắt đầu giao dịch
mysqli_begin_transaction($config);

try {

    $sql1 = "
        UPDATE binhchon
        SET SoLanChon = SoLanChon + 1
        WHERE idBC = 1
    ";

    mysqli_query($config, $sql1);

    $sql2 = "
        UPDATE phuongan
        SET SoLanChon = SoLanChon + 1
        WHERE idPA = ? AND idBC = 1
    ";

    $stmt2 = mysqli_prepare($config, $sql2);

    mysqli_stmt_bind_param($stmt2, "i", $idPA);

    mysqli_stmt_execute($stmt2);

    mysqli_commit($config);

    header("Location: ketquabinhchon.php");
    exit;

} catch (Exception $e) {

    mysqli_rollback($config);

    die("Bình chọn thất bại!");
}

?>