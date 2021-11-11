<?php
session_start();
$d = $_SESSION['mail'];
$con = new mysqli("localhost","root","","customers");
$sql ="delete from `user_info` where mail = '$d';";
$result = $con->query($sql);
header("Location:signup.php");
?>