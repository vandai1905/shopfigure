<?php 
include('../config.php');

// Xóa bình luận nếu có yêu cầu
if (isset($_GET['delete_id'])) {
    $delete_id = (int)$_GET['delete_id'];
    $delete_sql = "DELETE FROM comment WHERE id = $delete_id";
    if (mysqli_query($conn, $delete_sql)) {
        header("Location: list_binhluan.php");
        exit();
    } else {
        echo "Lỗi khi xóa bình luận: " . mysqli_error($conn);
    }
}

// Số bình luận trên mỗi trang
$limit = 5; 

// Xác định trang hiện tại
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Truy vấn tổng số bình luận
$total_sql = "SELECT COUNT(*) AS total FROM comment";
$total_result = mysqli_query($conn, $total_sql);

if (!$total_result) {
    die("Lỗi truy vấn tổng số bình luận: " . mysqli_error($conn));
}

$total_row = mysqli_fetch_assoc($total_result);
$total_records = $total_row['total'];
$total_pages = ceil($total_records / $limit);

// Truy vấn lấy bình luận theo trang
$sql = "SELECT * FROM comment ORDER BY id ASC LIMIT $limit OFFSET $offset";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Lỗi truy vấn danh sách bình luận: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Bình luận</title>
    <link rel="stylesheet" type="text/css" href="../css.css">
    <style>
        td:nth-child(3), td:nth-child(4) {
            text-align: left;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <?php include('../header.php'); ?>

    <div class="table-container">
        <h2 class="text-primary">💬 Danh sách Bình luận</h2>
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>ID Sản phẩm</th>
                    <th>Tên</th>
                    <th>Bình luận</th>
                    <th>Ngày đăng</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['id_sanpham']; ?></td>
                    <td><?php echo htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($row['comment'], ENT_QUOTES, 'UTF-8')); ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td>
                        <a href="?delete_id=<?php echo $row['id']; ?>" class="btn-delete" onclick="return confirm('Bạn có chắc chắn muốn xóa bình luận này không?');">Xóa</a>
                    </td>
                </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='6' class='text-center text-danger'>Không có bình luận nào!</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </div>

    <!-- Phân trang -->
    <div class="pagination">
        <form method="GET">
            <button type="submit" name="page" value="<?php echo max(1, $page - 1); ?>" 
                    class="btn prev <?php echo ($page == 1) ? 'disabled' : ''; ?>">
                « Trước
            </button>
        </form>

        <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
            <form method="GET">
                <button type="submit" name="page" value="<?php echo $i; ?>" 
                        class="btn <?php echo ($i == $page) ? 'active' : ''; ?>">
                    <?php echo $i; ?>
                </button>
            </form>
        <?php endfor; ?>

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