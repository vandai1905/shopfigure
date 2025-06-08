<?php 
include('../config.php');

// Số khách hàng trên mỗi trang
$limit = 5; 

// Xác định trang hiện tại
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Truy vấn tổng số khách hàng
$total_sql = "SELECT COUNT(*) AS total FROM customers";
$total_result = mysqli_query($conn, $total_sql);
$total_row = mysqli_fetch_assoc($total_result);
$total_records = $total_row['total'];
$total_pages = ceil($total_records / $limit);

// Truy vấn lấy khách hàng theo trang
$sql = "SELECT * FROM customers ORDER BY customer_id ASC LIMIT $limit OFFSET $offset";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Khách hàng</title>
    <link rel="stylesheet" type="text/css" href="../css.css">
</head>
<body>
<div class="wrapper">
    <?php include('../header.php'); ?>

    <!-- Thanh tiêu đề + nút thêm -->
    <div class="d-flex justify-content-between align-items-center mb-3 table-container">
        <h2 class="text-primary">👤 Danh sách Khách hàng</h2>
    </div>

    <div class="table-container">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Tên đăng nhập</th>
                    <th>Email</th>
                    <th>Quốc gia</th>
                    <th>Thành phố</th>
                    <th>Liên hệ</th>
                    <th>Hình ảnh</th>
                    <th>Địa chỉ</th>
                </tr>
            </thead>
            <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?php echo $row['customer_id']; ?></td>
                    <td><?php echo htmlspecialchars($row['customer_name'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($row['customer_email'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($row['customer_country'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($row['customer_city'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($row['customer_contact'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td>
                        <img src="../khachhang/uploads/<?php echo htmlspecialchars($row['customer_image']); ?>" width="50" height="50" alt="Avatar">
                    </td>
                    <td><?php echo nl2br(htmlspecialchars($row['customer_address'], ENT_QUOTES, 'UTF-8')); ?></td>
                </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='8' class='text-center text-danger'>Không có khách hàng nào!</td></tr>";
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
