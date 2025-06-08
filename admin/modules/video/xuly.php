<?php
include('../config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['them'])) {
        // Thêm video mới
        $tenvideo = mysqli_real_escape_string($conn, $_POST['tenvideo']);
        $linkvideo = mysqli_real_escape_string($conn, $_POST['linkvideo']);
        
        // Xử lý upload ảnh
        $anhvideo = '';
        if (!empty($_FILES['anhvideo']['name'])) {
            $anhvideo = basename($_FILES['anhvideo']['name']);
            move_uploaded_file($_FILES['anhvideo']['tmp_name'], "uploads/" . $anhvideo);
        }
        
        $sql = "INSERT INTO video (tenvideo, linkvideo, anhvideo) VALUES ('$tenvideo', '$linkvideo', '$anhvideo')";
        
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Thêm video thành công!'); window.location.href='list_video.php';</script>";
        } else {
            echo "<p class='text-danger'>Lỗi: " . mysqli_error($conn) . "</p>";
        }
    }
    
    if (isset($_POST['sua'])) {
        // Cập nhật video
        $id_video = intval($_POST['id_video']);
        $tenvideo = mysqli_real_escape_string($conn, $_POST['tenvideo']);
        $linkvideo = mysqli_real_escape_string($conn, $_POST['linkvideo']);
        
        // Xử lý ảnh mới (nếu có)
        if (!empty($_FILES['anhvideo']['name'])) {
            $anhvideo = basename($_FILES['anhvideo']['name']);
            move_uploaded_file($_FILES['anhvideo']['tmp_name'], "uploads/" . $anhvideo);
            $update_sql = "UPDATE video SET tenvideo='$tenvideo', linkvideo='$linkvideo', anhvideo='$anhvideo' WHERE id_video=$id_video";
        } else {
            $update_sql = "UPDATE video SET tenvideo='$tenvideo', linkvideo='$linkvideo' WHERE id_video=$id_video";
        }
        
        if (mysqli_query($conn, $update_sql)) {
            echo "<script>alert('Cập nhật thành công!'); window.location.href='list_video.php';</script>";
        } else {
            echo "<p class='text-danger'>Lỗi cập nhật: " . mysqli_error($conn) . "</p>";
        }
    }
}

// XỬ LÝ XÓA VIDEO
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    // Lấy thông tin ảnh của video
    $query = "SELECT anhvideo FROM video WHERE id_video = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $image_path = "uploads/" . $row['anhvideo'];
        if (file_exists($image_path) && is_file($image_path)) {
            unlink($image_path); // Xóa file ảnh
        }

        // Xóa video trong database
        $sql = "DELETE FROM video WHERE id_video = $id";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('🗑️ Video đã được xóa thành công!'); window.location.href='list_video.php';</script>";
        } else {
            echo "❌ Lỗi khi xóa video: " . mysqli_error($conn);
        }
    } else {
        echo "❌ Không tìm thấy video!";
    }
}

mysqli_close($conn);
?>
