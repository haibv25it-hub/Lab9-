<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "phantrang"
);

if (!$conn) {
    die("Lỗi kết nối: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8mb4");

// Số tin trên mỗi trang
$limit = 10;

// Lấy trang hiện tại
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

if ($page < 1) {
    $page = 1;
}

// Tổng số tin
$sql_total = "SELECT COUNT(*) AS total FROM tintuc";

$result_total = mysqli_query($conn, $sql_total);

$row_total = mysqli_fetch_assoc($result_total);

$total_title = $row_total['total'];

// Tổng số trang
$total_page = ceil($total_title / $limit);

if ($total_page > 0 && $page > $total_page) {
    $page = $total_page;
}

// Vị trí bắt đầu
$start = ($page - 1) * $limit;

// Lấy dữ liệu
$sql = "SELECT * FROM tintuc
        ORDER BY id ASC
        LIMIT $start, $limit";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bài 11 - Phân trang</title>

    <style>
        body {
            font-family: Arial;
            background: #ecf0f1;
        }

        .title {
            width: 600px;
            margin: 30px auto;
            padding: 20px;
            background: #3498db;
        }

        .title a {
            color: white;
            text-decoration: none;
            line-height: 2;
        }

        .pagination {
            width: 600px;
            margin: auto;
        }

        .pagination a {
            padding: 8px;
            text-decoration: none;
        }

        .active {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <h2 align="center">DANH SÁCH TIN TỨC</h2>

    <div class="title">

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>

            <a href="#">
                <?php echo $row['id'] . ". " .
                    htmlspecialchars($row['title']); ?>
            </a>

            <br>

        <?php } ?>

    </div>

    <div class="pagination">

        <?php for ($i = 1; $i <= $total_page; $i++) { ?>

            <a
                class="<?php echo ($i == $page) ? 'active' : ''; ?>"
                href="phantrang.php?page=<?php echo $i; ?>">

                <?php echo $i; ?>

            </a>

        <?php } ?>

    </div>

</body>
</html>