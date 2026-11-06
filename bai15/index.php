<?php
require_once("config.php");

$sql = "SELECT * FROM phuongan WHERE idBC = 1";

$result = mysqli_query($config, $sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bình chọn</title>
</head>
<body>

    <h2>BÌNH CHỌN</h2>

    <form method="get" action="xulybinhchon.php">

        <p>
            Bạn nghĩ sao về chất lượng của trang web?
        </p>

        <?php
        $i = 0;

        while ($row = mysqli_fetch_assoc($result)) {
        ?>

            <label>

                <input
                    type="radio"
                    name="idPA"
                    value="<?php echo $row['idPA']; ?>"
                    <?php
                    if ($i == 0) {
                        echo "checked";
                        $i++;
                    }
                    ?>
                >

                <?php echo htmlspecialchars($row['MoTa']); ?>

            </label>

            <br>

        <?php } ?>

        <br>

        <input
            type="submit"
            value="Xem kết quả"
            name="Submit"
        >

    </form>

</body>
</html>