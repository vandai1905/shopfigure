<?php
include('../config.php'); 

if (isset($_GET['id'])) {
    $tam = intval($_GET['id']); 

    $sql = "DELETE FROM cart WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $tam);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    header('Location: ../../index.php?quanly=donhang&ac=lietke');
    exit(); 
} else {
    echo "Lỗi: Không có ID để xóa!";
}
?>
