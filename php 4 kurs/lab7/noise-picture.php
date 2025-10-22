<?php
session_start();

$image = imagecreatefromjpeg('noise.jpg');

$width = imagesx($image);
$height = imagesy($image);

$characters = 'ABCDEFGHJKLMNPQRSTUVWXYZ123456789';
$captcha_length = rand(5, 6);
$captcha_string = '';

for ($i = 0; $i < $captcha_length; $i++) {
    $captcha_string .= $characters[rand(0, strlen($characters) - 1)];
}

$_SESSION['captcha_code'] = $captcha_string;

$fonts = glob('fonts/*.ttf');
if (empty($fonts)) {
    $fonts = glob('fonts/*.TTF');
}

$x = 20;
$y = 30;

for ($i = 0; $i < strlen($captcha_string); $i++) {
    $char = $captcha_string[$i];
    
    $font_size = rand(18, 30);
    
    $angle = rand(-15, 15);
    
    $text_color = imagecolorallocate($image, rand(0, 100), rand(0, 100), rand(0, 100));
    
    $font = $fonts[array_rand($fonts)];
    imagettftext($image, $font_size, $angle, $x, $y, $text_color, $font, $char);
    
    $x += 40;
}

header('Content-Type: image/jpeg');
imagejpeg($image, null, 50);
imagedestroy($image);
?>
