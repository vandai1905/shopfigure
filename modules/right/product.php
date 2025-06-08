<?php
    // Kết nối MySQLi
    $con = mysqli_connect("localhost", "root", "", "shopfigure");

    // Kiểm tra kết nối
    if (!$con) {
        die("Kết nối thất bại: " . mysqli_connect_error());
    }

    // Thiết lập bộ mã ký tự UTF-8
    mysqli_set_charset($con, "utf8");

    // Số sản phẩm trên mỗi trang
    $limit = 6; 

    // Xác định trang hiện tại
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($page - 1) * $limit;

    // Lấy tổng số sản phẩm
    $total_sql = "SELECT COUNT(*) AS total FROM products";
    $total_result = mysqli_query($con, $total_sql);
    $total_row = mysqli_fetch_assoc($total_result);
    $total_records = $total_row['total'];
    $total_pages = ceil($total_records / $limit);

    // Truy vấn lấy sản phẩm theo trang
    $sql = "SELECT * FROM products LIMIT $limit OFFSET $offset";
    $sanpham = mysqli_query($con, $sql);
?>

<p class="loai">Tất cả sản phẩm</p>
<ul class="product-list">
<?php while ($row = mysqli_fetch_array($sanpham)) { ?>
    <li>
        <a href="index.php?xem=chitiet&id=<?php echo $row['product_id']; ?>" class="productt">
            <img src="admin/modules/sanpham/uploads/<?php echo $row['product_image']; ?>" width="120" height="150"/>
            <p><?php echo htmlspecialchars($row['product_title'], ENT_QUOTES, 'UTF-8'); ?></p>
            <p>Giá: <?php echo number_format($row['product_price'], 0, ',', '.'); ?> USD</p>
        </a>
        <button class="add-to-cart" data-id="<?php echo $row['product_id']; ?>" 
                data-name="<?php echo htmlspecialchars($row['product_title'], ENT_QUOTES, 'UTF-8'); ?>" 
                data-price="<?php echo $row['product_price']; ?>" 
                data-image="<?php echo $row['product_image']; ?>">Thêm vào giỏ hàng</button>
    </li>
<?php } ?>
<div class="clear"></div>
</ul>

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

<script>
document.addEventListener("DOMContentLoaded", function () {
    const buttons = document.querySelectorAll(".add-to-cart");

    buttons.forEach(button => {
        button.addEventListener("click", function (event) {
            event.preventDefault(); 

            let productId = this.getAttribute("data-id");
            let productQty = 1; // Thêm mặc định 1 sản phẩm
            let returnUrl = window.location.href; // Lấy URL hiện tại

            fetch("cart_update.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: `type=add&product_id=${productId}&qty=${productQty}&return_url=${btoa(returnUrl)}`
            })
            .then(response => response.text())
            .then(data => {
                console.log("Phản hồi từ server:", data);
                alert("Sản phẩm đã được thêm vào giỏ hàng!");
            })
            .catch(error => console.error("Lỗi:", error));
        });
    });
});
</script>

<style>
/* Tùy chỉnh danh sách sản phẩm */
.productt {
    display: block;
    text-decoration: none;
    color: black;
    text-align: center;
}
.product-list li {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 20px; 
}

.productt:hover {
    opacity: 0.8;
}

/* Hiệu ứng khi rê chuột */
li:hover {
    transform: translateY(-5px);
}

/* CSS cho nút "Thêm vào giỏ hàng" */
.add-to-cart {
    display: block;
    width: 80%;
    padding: 8px 12px;
    background-color: #ff6600; 
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 14px;
    font-weight: bold;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-top: 10px;
}

.add-to-cart:hover {
    background-color: #cc5500;
    transform: scale(1.05);
}

.add-to-cart:active {
    transform: scale(0.95);
}

/* CSS cho phân trang */
.pagination {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.pagination form {
    display: inline-block;
    margin: 0 5px;
}

.pagination .btn {
    padding: 8px 12px;
    border: 1px solid #ddd;
    background: #fff;
    cursor: pointer;
    font-size: 14px;
}

.pagination .btn:hover {
    background: #f1f1f1;
}

.pagination .btn.active {
    background: #007bff;
    color: white;
    border-color: #007bff;
}

.pagination .btn.disabled {
    opacity: 0.5;
    pointer-events: none;
}

</style>
