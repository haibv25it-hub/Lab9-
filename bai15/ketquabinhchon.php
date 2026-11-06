<?php

require_once("config.php");

$sql = "SELECT * FROM binhchon WHERE idBC = 1";

$result = mysqli_query($config, $sql);

$question = mysqli_fetch_assoc($result);

$sql_total = "
    SELECT SUM(SoLanChon) AS total
    FROM phuongan
    WHERE idBC = 1
";

$result_total = mysqli_query($config, $sql_total);

$row_total = mysqli_fetch_assoc($result_total);

$total = (int)$row_total['total'];

$sql_options = "
    SELECT * FROM phuongan
    WHERE idBC = 1
";

$result_options = mysqli_query($config, $sql_options);

?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kết quả bình chọn</title>

    <style>
        body {
            font-family: Arial;
        }

        table {
            width: 650px;
            border-collapse: collapse;
        }

        td {
            border: 1px solid black;
            padding: 8px;
        }

        .bar {
            height: 15px;
            background: red;
        }
    </style>
</head>

<body>

    <h2>KẾT QUẢ BÌNH CHỌN</h2>

    <table>

        <tr>
            <td colspan="3" align="center">
                <strong>
                    <?php echo htmlspecialchars($question['MoTa']); ?>
                </strong>
            </td>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result_options)) {

            $count = (int)$row['SoLanChon'];

            $percent = ($total > 0)
                ? ($count / $total) * 100
                : 0;

            $width = ($percent / 100) * 150;

        ?>

            <tr>

                <td>
                    <?php echo htmlspecialchars($row['MoTa']); ?>
                </td>

                <td>

                    <div
                        class="bar"
                        style="width: <?php echo $width; ?>px;"
                    ></div>

                    <?php echo round($percent, 2); ?>%

                </td>

                <td>
                    Số lần chọn: <?php echo $count; ?>
                </td>

            </tr>

        <?php } ?>

        <tr>
            <td colspan="3" align="right">
                Tổng số lượt bình chọn: <?php echo $total; ?>
            </td>
        </tr>

    </table>

    <br>

    <a href="index.php">Quay lại bình chọn</a>

</body>
</html>