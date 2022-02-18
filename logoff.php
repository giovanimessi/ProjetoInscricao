<?php
require 'config.php';
unset($_SESSION['clogin']);
header("Location: admin.php");
exit;
?>