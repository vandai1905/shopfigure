<?php 
include('../config.php');

// Số bài viết trên mỗi trang
$limit = 5; 

// Xác định trang hiện tại
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Truy vấn tổng số bài viết
$total_sql = "SELECT COUNT(*) AS total FROM tintuc";
$total_result = mysqli_query($conn, $total_sql);
$total_row = mysqli_fetch_assoc($total_result);
$total_records = $total_row['total'];
$total_pages = ceil($total_records / $limit);

// Truy vấn lấy tin tức theo trang
$sql = "SELECT * FROM tintuc ORDER BY id_baiviet ASC LIMIT $limit OFFSET $offset";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Tin tức</title>
    <link rel="stylesheet" type="text/css" href="../css.css">
</head>
<body>
<div class="wrapper">
    <?php include('../header.php'); ?>
    
    <div class="table-container">
        <h2 class="text-primary">📰 Danh sách Tin tức</h2>
        <div class="add-news">
        <a href="them.php" class="btn-add">+ Thêm Tin Tức</a>
</div>

        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Tiêu đề</th>
                    <th>Hình ảnh</th>
                    <th>Quản lý</th>
                </tr>
            </thead>
            <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['id_baiviet']; ?></td>
                    <td><?php echo htmlspecialchars($row['tenbaiviet']); ?></td>
                    <td><img src="../tintuc/uploads/<?php echo htmlspecialchars($row['anhminhhoa']); ?>" width="50" height="50"></td>
                    <td class="d-flex">
                        <a href="../tintuc/sua.php?id=<?php echo $row['id_baiviet']; ?>" class="btn-edit">✏️ Sửa</a>
                        <a href="../tintuc/xuly.php?id=<?php echo $row['id_baiviet']; ?>" onclick="return confirm('⚠️ Bạn có chắc muốn xóa bài viết này không?');" class="btn-delete">❌ Xóa</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>    
    
    <!-- Phân trang -->
    <div class="pagination">
        <form method="GET">
            <button type="submit" name="page" value="<?php echo max(1, $page - 1); ?>" class="btn prev <?php echo ($page == 1) ? 'disabled' : ''; ?>">« Trước</button>
        </form>
        
        <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
            <form method="GET">
                <button type="submit" name="page" value="<?php echo $i; ?>" class="btn <?php echo ($i == $page) ? 'active' : ''; ?>"> <?php echo $i; ?> </button>
            </form>
        <?php endfor; ?>
        
        <form method="GET">
            <button type="submit" name="page" value="<?php echo min($total_pages, $page + 1); ?>" class="btn next <?php echo ($page == $total_pages) ? 'disabled' : ''; ?>">Tiếp »</button>
        </form>
    </div>

    <?php include('../footer.php'); ?>
</div>
</body>
</html>

<?php
mysqli_close($conn);
?>
