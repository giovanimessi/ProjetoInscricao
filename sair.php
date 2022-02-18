<?php
require 'config.php';
unset($_SESSION['captcha']);
header("Location: index.php");
exit;
?>