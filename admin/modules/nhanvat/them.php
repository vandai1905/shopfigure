<?php
include('../config.php'); // Đảm bảo kết nối CSDL

// Xử lý khi người dùng gửi form
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['them'])) {
    $nhanvat = trim($_POST['nhanvat']); // Lấy giá trị từ form

    if (!empty($nhanvat)) {
        $nhanvat = mysqli_real_escape_string($conn, $nhanvat); // Tránh SQL Injection
        $sql = "INSERT INTO nhanvat (tennhanvat) VALUES ('$nhanvat')";
        if (mysqli_query($conn, $sql)) {
            header('Location: list_nhanvat.php'); // Chuyển hướng sau khi thêm thành công
            exit();
        } else {
            $error = "Lỗi khi thêm nhanvat!";
        }
    } else {
        $error = "Vui lòng nhập tên nhanvat!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css.css" />
    <title>Thêm Nhân vật</title>
</head>
<body>
<div class="wrapper">
    <?php include('../header.php'); ?>

    <div class="container mt-4">
        <h2 class="text-primary">Thêm Nhân vật</h2>

        <?php if (isset($error)) { ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php } ?>

        <form action="them.php" method="POST">
            <div class="mb-3">
                <label for="nhanvat" class="form-label">Tên nhân vật:</label>
                <input type="text" class="form-control" name="nhanvat" id="nhanvat" required>
            </div>
            <button type="submit" name="them" class="btn btn-success">Thêm</button>
            <button type="button" class="btn btn-back" onclick="window.location.href='list_nhanvat.php'">Quay lại</button>
        </form>
    </div>

    <?php include('../footer.php'); ?>
</div>
</body>
</html>
