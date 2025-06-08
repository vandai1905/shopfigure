<div class="content_right" style="width:100%;">
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
        $timkiem = trim($_POST['search_query']);

        // Chuẩn bị câu lệnh truy vấn an toàn
        $sql = "SELECT * FROM products WHERE product_keywords LIKE ?";
        $stmt = mysqli_prepare($conn, $sql);
        $search_param = "%$timkiem%";
        mysqli_stmt_bind_param($stmt, "s", $search_param);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        // Kiểm tra nếu có kết quả
        if (mysqli_num_rows($result) > 0) {
            while ($dong_timkiem = mysqli_fetch_assoc($result)) {
                echo '<div class="product-item">';
                echo '<img src="admin/modules/sanpham/uploads/' . htmlspecialchars($dong_timkiem['product_image']) . '" width="120" height="150"/>';
                echo '<p><strong>Tên sản phẩm:</strong> ' . htmlspecialchars($dong_timkiem['product_title']) . '</p>';
                echo '<p><strong>Giá:</strong> ' . number_format($dong_timkiem['product_price'], 0, ',', '.') . ' VNĐ</p>';
                echo '<p><a href="index.php?xem=chitiet&id=' . intval($dong_timkiem['product_id']) . '">Chi tiết</a></p>';
                echo '</div>';
            }
        } else {
            echo '<p>Không tìm thấy kết quả cho từ khóa <strong>' . htmlspecialchars($timkiem) . '</strong>.</p>';
        }

        mysqli_stmt_close($stmt);
    } else {
        echo '<p>Vui lòng nhập từ khóa tìm kiếm.</p>';
    }
    ?>
</div>
