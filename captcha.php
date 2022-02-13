<?php
session_start();

header("Content-type:image/jpeg");

$n = $_SESSION['captcha'];
$imagem = imagecreate(100,50);
imagecolorallocate($imagem,200,200,200);

$corDaFonte = imagecolorallocate($imagem,20,20,20);


imagettftext($imagem, 40, 0, 10, 30, $corDaFonte, __DIR__.'/Ginga.otf', $n);

imagejpeg($imagem,null);

?>