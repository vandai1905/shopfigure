<?php 
include('../config.php');

// Số sản phẩm trên mỗi trang
$limit = 5; 

// Xác định trang hiện tại
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Thiết lập UTF-8 cho MySQL
mysqli_set_charset($conn, "utf8mb4");

// Truy vấn tổng số sản phẩm
$total_sql = "SELECT COUNT(*) AS total FROM products";
$total_result = mysqli_query($conn, $total_sql);
$total_row = mysqli_fetch_assoc($total_result);
$total_records = $total_row['total'];
$total_pages = ceil($total_records / $limit);

// Truy vấn lấy sản phẩm theo trang
$sql = "SELECT * FROM products ORDER BY product_id ASC LIMIT $limit OFFSET $offset";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Sản phẩm</title>
    <link rel="stylesheet" type="text/css" href="../css.css">
</head>
<body>
<div class="wrapper">
    <?php include('../header.php'); ?>

    <div class="d-flex justify-content-between align-items-center mb-3 table-container">
        <h2 class="text-primary">🛒 Danh sách Sản phẩm</h2>
        <a href="them.php" class="btn-add">+ Thêm sản phẩm</a>
    </div>

    <div class="table-container">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Giá</th>
                    <th>Game</th>
                    <th>Nhân vật</th>
                    <th>Mô tả</th>
                    <th>Từ khóa</th>
                    <th>Quản lý</th>
                </tr>
            </thead>
            <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?php echo $row['product_id']; ?></td>
                    <td><?php echo htmlspecialchars($row['product_title'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><img src="../sanpham/uploads/<?php echo htmlspecialchars($row['product_image']); ?>" width="50" height="50"></td>
                    <td><?php echo number_format($row['product_price'], 0, ',', '.'); ?> USD</td>
                    <td><?php echo htmlspecialchars($row['product_cat'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($row['product_brand'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td class="short-desc">
                        <span class="desc-preview">
                            <?php echo nl2br(htmlspecialchars(mb_strimwidth($row['product_desc'], 0, 100, '...'), ENT_QUOTES, 'UTF-8')); ?>
                        </span>
                        <span class="desc-full" style="display: none;">
                            <?php echo nl2br(htmlspecialchars($row['product_desc'], ENT_QUOTES, 'UTF-8')); ?>
                        </span>
                        <?php if (strlen($row['product_desc']) > 100) : ?>
                            <a href="#" class="toggle-desc">Xem thêm</a>
                        <?php endif; ?>
                    </td>
                    <td><?php echo htmlspecialchars($row['product_keywords'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td class="d-flex">
                        <a href="../sanpham/sua.php?id=<?php echo $row['product_id']; ?>" class="btn-edit">✏️ Sửa</a>
                        <a href="../sanpham/xuly.php?id=<?php echo $row['product_id']; ?>" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?');" class="btn-delete">🗑️ Xóa</a>
                    </td>
                </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='9' class='text-center text-danger'>Không có sản phẩm nào!</td></tr>";
            }
            ?>
            </tbody>
        </table>
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

<!-- JavaScript xử lý mô tả ngắn/dài -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".toggle-desc").forEach(function (btn) {
        btn.addEventListener("click", function (event) {
            event.preventDefault();
            let parent = this.closest(".short-desc");
            let preview = parent.querySelector(".desc-preview");
            let fullDesc = parent.querySelector(".desc-full");

            if (fullDesc.style.display === "none") {
                preview.style.display = "none";
                fullDesc.style.display = "inline";
                this.textContent = "Thu gọn";
            } else {
                preview.style.display = "inline";
                fullDesc.style.display = "none";
                this.textContent = "Xem thêm";
            }
        });
    });
});
</script>

</body>
</html>

<?php
mysqli_close($conn);
?>
