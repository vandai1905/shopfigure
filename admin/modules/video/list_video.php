<?php
include('../config.php');

// Số video trên mỗi trang
$limit = 5; 

// Xác định trang hiện tại
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Truy vấn tổng số video
$total_sql = "SELECT COUNT(*) AS total FROM video";
$total_result = mysqli_query($conn, $total_sql);
$total_row = mysqli_fetch_assoc($total_result);
$total_records = $total_row['total'];
$total_pages = ceil($total_records / $limit);

// Truy vấn lấy video theo trang
$sql = "SELECT * FROM video ORDER BY id_video ASC LIMIT $limit OFFSET $offset";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Video</title>
    <link rel="stylesheet" type="text/css" href="../css.css">
</head>
<body>
<div class="wrapper">
    <?php include('../header.php'); ?>

    <!-- Tiêu đề + nút thêm -->
    <div class="d-flex justify-content-between align-items-center mb-3 table-container">
        <h2 class="text-primary">📹 Danh sách Video</h2>
        <a href="them.php" class="btn-add">+ Thêm video</a>
    </div>

    <div class="table-container">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Tên Video</th>
                    <th>Hình ảnh</th>
                    <th>Link Video</th>
                    <th>Quản lý</th>
                </tr>
            </thead>
            <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?php echo $row['id_video']; ?></td>
                    <td><?php echo htmlspecialchars($row['tenvideo'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><img src="uploads/<?php echo htmlspecialchars($row['anhvideo']); ?>" width="50" height="50"></td>
                    <td><a href="<?php echo htmlspecialchars($row['linkvideo']); ?>" target="_blank" class="btn-view">🔗 Xem</a></td>
                    <td class="d-flex">
                        <a href="sua.php?id=<?php echo $row['id_video']; ?>" class="btn-edit">✏️ Sửa</a>
                        <a href="xuly.php?id=<?php echo $row['id_video']; ?>" onclick="return confirm('Bạn có chắc muốn xóa video này?');" class="btn-delete">🗑️ Xóa</a>
                    </td>
                </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='5' class='text-center text-danger'>Không có video nào!</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </div>    

    <!-- Phân trang -->
    <div class="pagination">
        <!-- Nút "Trước" -->
        <form method="GET">
            <button type="submit" name="page" value="<?php echo max(1, $page - 1); ?>" 
                    class="btn prev <?php echo ($page == 1) ? 'disabled' : ''; ?>">
                « Trước
            </button>
        </form>

        <!-- Hiển thị số trang -->
        <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
            <form method="GET">
                <button type="submit" name="page" value="<?php echo $i; ?>" 
                        class="btn <?php echo ($i == $page) ? 'active' : ''; ?>">
                    <?php echo $i; ?>
                </button>
            </form>
        <?php endfor; ?>

        <!-- Nút "Tiếp" -->
        <form method="GET">
            <button type="submit" name="page" value="<?php echo min($total_pages, $page + 1); ?>" 
                    class="btn next <?php echo ($page == $total_pages) ? 'disabled' : ''; ?>">
                Tiếp »
            </button>
        </form>
    </div>

    <?php include('../footer.php'); ?>
</div>

</body>
</html>

<?php
mysqli_close($conn);
?>
