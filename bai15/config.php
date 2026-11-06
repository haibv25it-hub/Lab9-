<?php

$config = mysqli_connect(
    "localhost",
    "root",
    "",
    "review"
);

if (!$config) {
    die(
        "Không thể kết nối Database: " .
        mysqli_connect_error()
    );
}

mysqli_set_charset($config, "utf8mb4");

?>