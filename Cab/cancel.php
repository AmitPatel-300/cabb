<?php
session_start();
unset($_SESSION['ride']);
header('location:index.php');
?>