<?php
$servername = "localhost";
$user = "root";
$passw = "12345";
$conn = mysqli_connect($servername, $user, $passw);
$db = "mydb";
mysqli_select_db($conn,$db);
?>
