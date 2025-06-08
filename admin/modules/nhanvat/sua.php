<?php
include('../config.php'); 
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Lỗi: ID không hợp lệ.");
}

$id = intval($_GET['id']);

// Lấy thông tin nhanvat cần sửa
$sql = "SELECT * FROM nhanvat WHERE nhanvat_id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) == 0) {
    die("Lỗi: nhanvat không tồn tại.");
}

$dong = mysqli_fetch_assoc($result);

// Xử lý khi người dùng gửi form sửa
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sua'])) {
    $nhanvat = trim($_POST['nhanvat']);

    if (!empty($nhanvat)) {
        $nhanvat = mysqli_real_escape_string($conn, $nhanvat);
        $update_sql = "UPDATE nhanvat SET tennhanvat = ? WHERE nhanvat_id = ?";
        $update_stmt = mysqli_prepare($conn, $update_sql);
        mysqli_stmt_bind_param($update_stmt, "si", $nhanvat, $id);

        if (mysqli_stmt_execute($update_stmt)) {
            header("Location: list_nhanvat.php"); // Quay lại danh sách
            exit();
        } else {
            $error = "❌ Lỗi khi cập nhật nhân vật!";
        }
    } else {
        $error = "Vui lòng nhập tên nhân vật!";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa Nhân vật</title>
    <link rel="stylesheet" type="text/css" href="../css.css">
</head>
<body>
<div class="wrapper">
    <?php include('../header.php'); ?>

    <div class="container mt-4">
        <h2 class="text-primary">Sửa Nhân vật</h2>

        <?php if (isset($error)) { ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php } ?>

        <form action="sua.php?id=<?php echo $id; ?>" method="POST">
            <div class="mb-3">
                <label for="nhanvat" class="form-label">Tên Nhân vật:</label>
                <input type="text" class="form-control" name="nhanvat" id="nhanvat" value="<?php echo htmlspecialchars($dong['tennhanvat']); ?>" required>
            </div>
            <button type="submit" name="sua" class="btn btn-update">Cập nhật</button>
            <button type="button" class="btn btn-back" onclick="window.location.href='list_nhanvat.php'">Quay lại</button>
        </form>
    </div>

    <?php include('../footer.php'); ?>
</div>
</body>
</html>
