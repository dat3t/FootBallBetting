<?php
$server_username = "root"; // di?n username dang nh?p mysql
$server_password = ""; // di?n password dang nh?p mysql
$server_host = "localhost";// di?n t?n host
$database = 'footballbetting'; // tên database
 
// t?o bi?n k?t n?i t?i database
$conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không th? k?t n?i t?i database");
?>