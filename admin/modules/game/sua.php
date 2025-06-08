<?php
include('../config.php'); 
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Lỗi: ID không hợp lệ.");
}

$id = intval($_GET['id']);

// Lấy thông tin game cần sửa
$sql = "SELECT * FROM game WHERE game_id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) == 0) {
    die("Lỗi: Game không tồn tại.");
}

$dong = mysqli_fetch_assoc($result);

// Xử lý khi người dùng gửi form sửa
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sua'])) {
    $game = trim($_POST['game']);

    if (!empty($game)) {
        $game = mysqli_real_escape_string($conn, $game);
        $update_sql = "UPDATE game SET tengame = ? WHERE game_id = ?";
        $update_stmt = mysqli_prepare($conn, $update_sql);
        mysqli_stmt_bind_param($update_stmt, "si", $game, $id);

        if (mysqli_stmt_execute($update_stmt)) {
            header("Location: list_game.php"); // Quay lại danh sách
            exit();
        } else {
            $error = "Lỗi khi cập nhật game!";
        }
    } else {
        $error = "Vui lòng nhập tên game!";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa Game</title>
    <link rel="stylesheet" type="text/css" href="../css.css">
</head>
<body>
<div class="wrapper">
    <?php include('../header.php'); ?>

    <div class="container mt-4">
        <h2 class="text-primary">Sửa Game</h2>

        <?php if (isset($error)) { ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php } ?>

        <form action="sua.php?id=<?php echo $id; ?>" method="POST">
            <div class="mb-3">
                <label for="game" class="form-label">Tên Game:</label>
                <input type="text" class="form-control" name="game" id="game" value="<?php echo htmlspecialchars($dong['tengame']); ?>" required>
            </div>
            <button type="submit" name="sua" class="btn btn-update">Cập nhật</button>
            <button type="button" class="btn btn-back" onclick="window.location.href='list_game.php'">Quay lại</button>
        </form>
    </div>

    <?php include('../footer.php'); ?>
</div>
</body>
</html>
