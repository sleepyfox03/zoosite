<?php
session_start();
session_destroy();
header('location:http://localhost/zoosite/login.php');
?>
