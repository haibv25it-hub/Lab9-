<?php

header("Content-Type: application/rss+xml; charset=utf-8");

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "rss"
);

if (!$conn) {
    die("Không thể kết nối Database!");
}

mysqli_set_charset($conn, "utf8mb4");

function xmlEscape($data) {
    return htmlspecialchars(
        $data,
        ENT_XML1 | ENT_QUOTES,
        "UTF-8"
    );
}

$sql = "SELECT * FROM news ORDER BY id DESC";

$result = mysqli_query($conn, $sql);

echo '<?xml version="1.0" encoding="UTF-8"?>';

?>

<rss version="2.0">

<channel>

    <title>Website học PHP</title>

    <link>https://example.com</link>

    <description>Trang RSS học lập trình PHP</description>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>

        <item>

            <title>
                <?php echo xmlEscape($row['title']); ?>
            </title>

            <link>
                <?php echo xmlEscape($row['link']); ?>
            </link>

            <description>
                <?php echo xmlEscape($row['description']); ?>
            </description>

        </item>

    <?php } ?>

</channel>

</rss>