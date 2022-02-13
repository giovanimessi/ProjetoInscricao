<?php
session_start();
unset($_SESSION['captcha']);
header("Location: ./");
?>