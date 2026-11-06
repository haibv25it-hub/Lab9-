<?php
$message = "";
$image = "";

if (isset($_POST['upload'])) {

    $target_path = "uploads/";

    if (!isset($_FILES['ufile']) || $_FILES['ufile']['error'] != 0) {
        $message = "Vui lòng chọn hình ảnh!";
    } else {

        $file = $_FILES['ufile'];

        // Kiểm tra dung lượng tối đa 5MB
        if ($file['size'] > 5000000) {
            $message = "File không được vượt quá 5MB!";
        } else {

            // Kiểm tra định dạng ảnh
            $allowed = ['jpg', 'jpeg', 'gif', 'png'];

            $extension = strtolower(
                pathinfo($file['name'], PATHINFO_EXTENSION)
            );

            if (!in_array($extension, $allowed)) {
                $message = "Không phải file hình ảnh hợp lệ!";
            } else {

                // Tạo tên file mới để tránh trùng tên
                $new_name = uniqid() . "." . $extension;

                $destination = $target_path . $new_name;

                if (move_uploaded_file(
                    $file['tmp_name'],
                    $destination
                )) {
                    $message = "Upload hình ảnh thành công!";
                    $image = $destination;
                } else {
                    $message = "Upload thất bại!";
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bài 9 - Upload hình ảnh</title>
</head>
<body>

    <h2>UPLOAD HÌNH ẢNH</h2>

    <form method="post" enctype="multipart/form-data">

        <input type="hidden" name="MAX_FILE_SIZE" value="5000000">

        <label>Chọn hình ảnh:</label>

        <input type="file" name="ufile" accept="image/*">

        <br><br>

        <input type="submit" name="upload" value="Upload">

    </form>

    <p>
        <?php echo htmlspecialchars($message); ?>
    </p>

    <?php if ($image != "") { ?>

        <h3>Hình ảnh đã upload:</h3>

        <img src="<?php echo htmlspecialchars($image); ?>"
             width="300">

    <?php } ?>

</body>
</html>