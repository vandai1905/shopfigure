<?php
include('../config.php');

// Số đơn hàng trên mỗi trang
$limit = 5;

// Xác định trang hiện tại
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) {
    $page = 1; // Đảm bảo trang >= 1
}
$offset = ($page - 1) * $limit;

// Truy vấn tổng số đơn hàng
$total_sql = "SELECT COUNT(DISTINCT cart.id) AS total FROM cart";
$total_result = mysqli_query($conn, $total_sql);
$total_records = 0;

if ($total_result) {
    $total_row = mysqli_fetch_assoc($total_result);
    $total_records = $total_row['total'];
} else {
    die("❌ Lỗi truy vấn tổng số đơn hàng: " . mysqli_error($conn));
}

$total_pages = ($total_records > 0) ? ceil($total_records / $limit) : 1;

// Truy vấn dữ liệu đơn hàng với phân trang
$sql = "
    SELECT 
        cart.id, 
        cart.fullname, 
        cart.date, 
        cart_detail.product_id, 
        cart_detail.quantity, 
        cart_detail.price, 
        products.product_title
    FROM cart
    INNER JOIN cart_detail ON cart_detail.cart_id = cart.id
    INNER JOIN products ON products.product_id = cart_detail.product_id
    LIMIT $limit OFFSET $offset
";

$run_cart = mysqli_query($conn, $sql);

// Kiểm tra lỗi khi truy vấn SQL
if (!$run_cart) {
    die("❌ Lỗi truy vấn danh sách đơn hàng: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Đơn hàng</title>
    <link rel="stylesheet" type="text/css" href="../css.css">

</head>
<body>
<div class="wrapper">
    <?php include('../header.php'); ?>

    <div class="d-flex justify-content-between align-items-center mb-3 table-container">
        <h2 class="text-primary">📄 Danh sách Đơn hàng</h2>
    </div>

    <div class="table-container">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Tên người mua</th>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Thành tiền</th> <!-- ✅ Thêm cột Thành tiền -->
                    <th>Ngày đặt</th>
                    <th>Quản lý</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $i = $offset + 1;
            while ($dong_cart = mysqli_fetch_array($run_cart, MYSQLI_ASSOC)) {
                $thanh_tien = $dong_cart['quantity'] * $dong_cart['price']; // ✅ Tính tổng tiền
            ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo htmlspecialchars($dong_cart['fullname'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($dong_cart['product_title'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo $dong_cart['quantity']; ?></td>
                    <td><?php echo number_format($dong_cart['price'], 0, ',', '.'); ?> USD</td>
                    <td><?php echo number_format($thanh_tien, 0, ',', '.'); ?> USD</td> <!-- ✅ Hiển thị Thành tiền -->
                    <td><?php echo $dong_cart['date']; ?></td>
                    <td class="d-flex">
                        <a href="sua.php?id=<?php echo $dong_cart['id']; ?>" class="btn-edit">✏️ Sửa</a>
                        <a href="xuly.php?id=<?php echo $dong_cart['id']; ?>" onclick="return confirm('Bạn có chắc muốn xóa đơn hàng này?');" class="btn-delete">🗑️ Xóa</a>
                    </td>
                </tr>
            <?php
                $i++;
            }
            ?>
            </tbody>
        </table>
    </div>

    <div class="pagination">
        <form method="GET">
            <button type="submit" name="page" value="<?php echo max(1, $page - 1); ?>" class="btn prev <?php echo ($page == 1) ? 'disabled' : ''; ?>">« Trước</button>
        </form>

        <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
            <form method="GET">
                <button type="submit" name="page" value="<?php echo $i; ?>" class="btn <?php echo ($i == $page) ? 'active' : ''; ?>">
                    <?php echo $i; ?>
                </button>
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
