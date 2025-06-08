<?php
include('../config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    $tenbaiviet = mysqli_real_escape_string($conn, $_POST['tenbaiviet']);
    $noidung = mysqli_real_escape_string($conn, $_POST['noidung']);
    $tomtat = mysqli_real_escape_string($conn, $_POST['tomtat']);

    // Xử lý ảnh
    $anhminhhoa = $_FILES['anhminhhoa']['name'];
    $anhminhhoa_tmp = $_FILES['anhminhhoa']['tmp_name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($anhminhhoa);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $allowed_types = ["jpg", "jpeg", "png", "gif"];

    if (!empty($anhminhhoa)) {
        if (!in_array($imageFileType, $allowed_types)) {
            die("❌ Lỗi: Chỉ cho phép tải lên JPG, JPEG, PNG, GIF.");
        }
        move_uploaded_file($anhminhhoa_tmp, $target_file);
    }

    if (isset($_POST['them'])) {
        // ✅ Thêm bài viết
        $sql_tintuc = "INSERT INTO tintuc (tenbaiviet, noidung, tomtat, anhminhhoa) 
                       VALUES ('$tenbaiviet', '$noidung', '$tomtat', '$anhminhhoa')";
        
        if (mysqli_query($conn, $sql_tintuc)) {
            echo "<script>
                    alert('✅ Thêm bài viết thành công!');
                    window.location.href = 'list_tintuc.php';
                  </script>";
            exit();
        } else {
            die("❌ Lỗi khi thêm bài viết: " . mysqli_error($conn));
        }
    } elseif (isset($_POST['sua']) && $id > 0) {
        // ✅ Sửa bài viết
        if (!empty($anhminhhoa)) {
            $sql = "UPDATE tintuc SET 
                        tenbaiviet = '$tenbaiviet',
                        tomtat = '$tomtat',
                        noidung = '$noidung',
                        anhminhhoa = '$anhminhhoa'
                    WHERE id_baiviet = '$id'";
        } else {
            $sql = "UPDATE tintuc SET 
                        tenbaiviet = '$tenbaiviet',
                        tomtat = '$tomtat',
                        noidung = '$noidung'
                    WHERE id_baiviet = '$id'";
        }
    
        if (mysqli_query($conn, $sql)) {
            echo "<script>
                    alert('✅ Cập nhật bài viết thành công!');
                    window.location.href = 'list_tintuc.php';
                  </script>";
            exit();
        } else {
            die("❌ Lỗi khi cập nhật bài viết: " . mysqli_error($conn));
        }
    }
    
} elseif (isset($_GET['id'])) {
    // ✅ Xóa bài viết
    $id = intval($_GET['id']);
    $sql = "DELETE FROM tintuc WHERE id_baiviet='$id'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('✅ Xóa bài viết thành công!');
                window.location.href = 'list_tintuc.php';
              </script>";
        exit();
    } else {
        die("❌ Lỗi khi xóa bài viết: " . mysqli_error($conn));
    }
} else {
    die("❌ Yêu cầu không hợp lệ.");
}
?>
