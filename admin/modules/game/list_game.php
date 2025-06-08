<?php
include('../config.php');
$sql = "SELECT * FROM game ORDER BY game_id ASC";
$game = mysqli_query($conn, $sql);
?>

<!DOCTYPE>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css.css" />
<title>Trang game</title>
</head>

<body>
<div class="wrapper">
    <?php include('../header.php'); ?>

    <!-- Thanh tiêu đề + nút thêm -->
    <div class="d-flex justify-content-between align-items-center mb-3 table-container">
        <h2 class="text-primary">🎮  Danh sách game</h2>
        <a href="them.php" class="btn-add">+ Thêm game</a> <!-- Đường dẫn chính xác -->
    </div>

    <div class="table-container">
        <table class="table table-bordered table-hover">
            <tr class="table-header">
                <td width="60">ID game</td>
                <td width="200">Tên game</td>
                <td width="150">Quản lý</td>
            </tr>
            <?php
            $i = 1;
            while ($dong = mysqli_fetch_array($game, MYSQLI_ASSOC)) {
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo htmlspecialchars($dong['tengame']); ?></td>
                <td class="d-flex">
                    <a href="sua.php?id=<?php echo $dong['game_id']; ?>" class="btn-edit">Sửa</a> <!-- Đường dẫn chính xác -->
                    <a href="xuly.php?id=<?php echo $dong['game_id']; ?>" onclick="return confirm('Bạn có chắc muốn xóa?');" class="btn-delete">Xóa</a> <!-- Đường dẫn chính xác -->
                </td>
            </tr>
            <?php
            $i++;
            }
            ?>
        </table>
    </div>

    <?php include('../footer.php'); ?>
</div>


</body>
</html>
