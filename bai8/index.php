<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bài 8 - CKEditor</title>

    <script src="ckeditor/ckeditor.js"></script>
</head>
<body>

    <h2>SOẠN THẢO VĂN BẢN BẰNG CKEDITOR</h2>

    <form action="_posteddata.php" method="post">

        <textarea name="tomtat" id="tomtat"></textarea>

        <script>
            CKEDITOR.replace('tomtat');
        </script>

        <br>
        <input type="submit" name="ok" value="Gửi">

    </form>

</body>
</html>