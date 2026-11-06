<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "rating"
);

if (!$conn) {
    die("Không thể kết nối Database!");
}

mysqli_set_charset($conn, "utf8mb4");

function getRatingInfo($id) {

    global $conn;

    $sql = "SELECT * FROM rating_info WHERE product_id = ?";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "i", $id);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $html = "Đánh giá:<ul>";

    if ($row = mysqli_fetch_assoc($result)) {

        for ($i = 5; $i >= 1; $i--) {
            $html .= "<li>$i sao: " . $row["rate_$i"] . "</li>";
        }

    } else {

        $html .= "<li>Chưa có đánh giá</li>";
    }

    $html .= "</ul>";

    return $html;
}

function setRatingInfo($id, $rate) {

    global $conn;

    if ($rate < 1 || $rate > 5) {
        return false;
    }

    $column = "rate_" . $rate;

    $sql = "UPDATE rating_info
            SET $column = $column + 1
            WHERE product_id = ?";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "i", $id);

    return mysqli_stmt_execute($stmt);
}

function getProduct($id) {

    global $conn;

    $sql = "SELECT * FROM products WHERE id = ?";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "i", $id);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        return "<p>Không tìm thấy sản phẩm!</p>";
    }

    $title = htmlspecialchars($row['title']);
    $image = htmlspecialchars($row['img_url']);

    $html = '
        <div class="product-info">

            <img src="' . $image . '" width="150">

            <h2>' . $title . '</h2>

            ' . getRatingInfo($id) . '

        </div>
    ';

    return $html;
}

function listProduct() {

    global $conn;

    $sql = "SELECT * FROM products";

    $result = mysqli_query($conn, $sql);

    $html = "";

    while ($row = mysqli_fetch_assoc($result)) {

        $id = $row['id'];

        $title = htmlspecialchars($row['title']);

        $image = htmlspecialchars($row['img_url']);

        $html .= '
            <div class="product-info">

                <img src="' . $image . '" width="120">

                <h3>
                    <a href="index.php?id=' . $id . '">
                        ' . $title . '
                    </a>
                </h3>

                ' . getRatingInfo($id) . '

            </div>
        ';
    }

    return $html;
}

?>