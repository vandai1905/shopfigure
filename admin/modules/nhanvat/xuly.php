<?php
include('../config.php'); // Đảm bảo kết nối đúng

// Kiểm tra nếu 'id' tồn tại trong URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Kiểm tra nếu 'nhanvat' tồn tại trong form
$nhanvat = isset($_POST['nhanvat']) ? trim($_POST['nhanvat']) : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['them']) && !empty($nhanvat)) {
        // Thêm mới
        $nhanvat = mysqli_real_escape_string($conn, $nhanvat);
        $sql = "INSERT INTO nhanvat (tennhanvat) VALUES ('$nhanvat')";
        mysqli_query($conn, $sql);
        header('Location: list_nhanvat.php'); // Chuyển về danh sách nhanvat
        exit();
    } elseif (isset($_POST['sua']) && $id > 0 && !empty($nhanvat)) {
        // Sửa
        $nhanvat = mysqli_real_escape_string($conn, $nhanvat);
        $sql = "UPDATE nhanvat SET tennhanvat='$nhanvat' WHERE nhanvat_id=$id";
        mysqli_query($conn, $sql);
        header('Location: list_nhanvat.php'); // Chuyển về danh sách nhanvat
        exit();
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && $id > 0) {
    // Xóa
    $sql = "DELETE FROM nhanvat WHERE nhanvat_id=$id";
    mysqli_query($conn, $sql);
    header('Location: list_nhanvat.php'); // Chuyển về danh sách nhanvat
    exit();
} else {
    echo "❌ Lỗi: Dữ liệu không hợp lệ.";
}
?>
