<?php
include('../config.php'); // Đảm bảo kết nối CSDL

// Xử lý khi người dùng gửi form
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['them'])) {
    $game = trim($_POST['game']); // Lấy giá trị từ form

    if (!empty($game)) {
        $game = mysqli_real_escape_string($conn, $game); // Tránh SQL Injection
        $sql = "INSERT INTO game (tengame) VALUES ('$game')";
        if (mysqli_query($conn, $sql)) {
            header('Location: list_game.php'); // Chuyển hướng sau khi thêm thành công
            exit();
        } else {
            $error = "Lỗi khi thêm game!";
        }
    } else {
        $error = "Vui lòng nhập tên game!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css.css" />
    <title>Thêm Game</title>
</head>
<body>
<div class="wrapper">
    <?php include('../header.php'); ?>

    <div class="container mt-4">
        <h2 class="text-primary">Thêm Game</h2>

        <?php if (isset($error)) { ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php } ?>

        <form action="them.php" method="POST">
            <div class="mb-3">
                <label for="game" class="form-label">Tên Game:</label>
                <input type="text" class="form-control" name="game" id="game" required>
            </div>
            <button type="submit" name="them" class="btn btn-success">Thêm</button>
            <button type="button" class="btn btn-back" onclick="window.location.href='list_game.php'">Quay lại</button>
        </form>
    </div>

    <?php include('../footer.php'); ?>
</div>
</body>
</html>
