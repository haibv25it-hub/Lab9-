<?php

session_start();

$string = substr(
    strtoupper(bin2hex(random_bytes(4))),
    0,
    6
);

$_SESSION['captcha'] = $string;

$img = imagecreate(150, 50);

$background = imagecolorallocate($img, 0, 0, 0);

$text_color = imagecolorallocate($img, 255, 255, 255);

imagestring($img, 5, 40, 15, $string, $text_color);

header("Content-Type: image/png");

imagepng($img);

imagedestroy($img);

?>