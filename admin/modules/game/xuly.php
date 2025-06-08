<?php
include('../config.php'); // Đảm bảo kết nối đúng

// Kiểm tra nếu 'id' tồn tại trong URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Kiểm tra nếu 'game' tồn tại trong form
$game = isset($_POST['game']) ? trim($_POST['game']) : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['them']) && !empty($game)) {
        // Thêm mới
        $game = mysqli_real_escape_string($conn, $game);
        $sql = "INSERT INTO game (tengame) VALUES ('$game')";
        mysqli_query($conn, $sql);
        header('Location: list_game.php'); // Chuyển về danh sách game
        exit();
    } elseif (isset($_POST['sua']) && $id > 0 && !empty($game)) {
        // Sửa
        $game = mysqli_real_escape_string($conn, $game);
        $sql = "UPDATE game SET tengame='$game' WHERE game_id=$id";
        mysqli_query($conn, $sql);
        header('Location: list_game.php'); // Chuyển về danh sách game
        exit();
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && $id > 0) {
    // Xóa
    $sql = "DELETE FROM game WHERE game_id=$id";
    mysqli_query($conn, $sql);
    header('Location: list_game.php'); // Chuyển về danh sách game
    exit();
} else {
    echo "❌ Lỗi: Dữ liệu không hợp lệ.";
}
?>
