<?php

include("functions.php");

if (isset($_GET['id'])) {

    $id = (int)$_GET['id'];

    if ($id <= 0) {
        die("ID sản phẩm không hợp lệ!");
    }

    // Xử lý đánh giá
    if (isset($_POST['rate_submit'])) {

        $rate = isset($_POST['rate']) ? (int)$_POST['rate'] : 0;

        setRatingInfo($id, $rate);

        header("Location: index.php?id=" . $id);
        exit;
    }

    $html = getProduct($id);

    include("template/view-product.php");

} else {

    $html = listProduct();

    include("template/list-products.php");
}

?>