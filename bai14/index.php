<?php

session_start();

$message = "";

if (isset($_POST['submit'])) {

    $input = isset($_POST['input'])
        ? trim($_POST['input'])
        : "";

    if (
        isset($_SESSION['captcha']) &&
        strtoupper($input) === $_SESSION['captcha']
    ) {

        $message = "Right captcha !!!";

    } else {

        $message = "Wrong captcha !!!";
    }
}

?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">

    <title>CAPTCHA</title>

    <style>
        body {
            font-family: Arial;
            background: #ecf0f1;
        }

        form {
            width: 400px;
            margin: 50px auto;
            padding: 20px;
            background: white;
            border: 1px solid #95a5a6;
        }

        input[type="text"] {
            width: 150px;
            height: 35px;
        }

        input[type="submit"] {
            padding: 8px 20px;
        }

        #message {
            color: red;
        }
    </style>

</head>

<body>

    <form method="POST" action="">

        <h2>CAPTCHA - WEB</h2>

        <p>Please enter the captcha:</p>

        <input type="text" name="input" required>

        <img
            src="captcha.php?t=<?php echo time(); ?>"
            alt="CAPTCHA"
        >

        <br><br>

        <input type="submit" name="submit" value="Send">

        <p id="message">
            <?php echo htmlspecialchars($message); ?>
        </p>

    </form>

</body>
</html>