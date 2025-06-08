<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "shopfigure";

// Kết nối MySQLi
$conn = mysqli_connect($servername, $username, $password, $database);

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

// Thiết lập bộ mã ký tự 
mysqli_set_charset($conn, "utf8mb4");
?>
