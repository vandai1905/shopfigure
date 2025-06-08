<?php
include('admin/modules/config.php');

$id = mysqli_real_escape_string($conn, $_GET['id']); 

// Lấy danh sách sản phẩm theo thương hiệu
$sql = "SELECT * FROM products WHERE product_brand='$id'";
$nhanvat = mysqli_query($con, $sql);

// Lấy tên thương hiệu
$sql_tennhanvat = "SELECT tennhanvat FROM nhanvat WHERE nhanvat_id='$id'";
$tennhanvat_result = mysqli_query($con, $sql_tennhanvat);
$dong_tennhanvat = mysqli_fetch_array($tennhanvat_result, MYSQLI_ASSOC);
?>

<p class="loai"><?php echo $dong_tennhanvat['tennhanvat'] ?></p>
<ul>
    <?php
    while ($dong_nhanvat = mysqli_fetch_array($nhanvat, MYSQLI_ASSOC)) {
    ?>
        <li>
        <a href="index.php?xem=chitiet&id=<?php echo $dong_nhanvat['product_id']; ?>">
            <img src="admin/modules/sanpham/uploads/<?php echo $dong_nhanvat['product_image']; ?>" width="120" height="150"/>
        </a>
            <p>Tên sản phẩm: <?php echo $dong_nhanvat['product_title']; ?></p>
            <p>Giá: <?php echo number_format($dong_nhanvat['product_price'], 0, ',', '.'); ?> USD</p>
            <!-- Nút thêm vào giỏ hàng thay vì liên kết chi tiết -->
            <button class="add-to-cart"
                    data-id="<?php echo $dong_nhanvat['product_id']; ?>"
                    data-name="<?php echo htmlspecialchars($dong_nhanvat['product_title'], ENT_QUOTES, 'UTF-8'); ?>"
                    data-price="<?php echo $dong_nhanvat['product_price']; ?>"
                    data-image="<?php echo $dong_nhanvat['product_image']; ?>">
                Thêm vào giỏ hàng
            </button>
        </li>
    <?php
    }
    ?>
</ul>

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
/* Căn giữa nút "Thêm vào giỏ hàng" */
.add-to-cart {
    display: block;
    width: 80%;
    padding: 7px 11px;
    background-color: #ff6600; 
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 14px;
    font-weight: bold;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s ease;
    margin: 3px auto;
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
    /* Canh giữa và đẩy xuống dưới */
    text-align: center;
    margin: 20px 0;
    clear: both;
}

.pagination .btn {
    display: inline-block;
    margin: 0 5px;
    padding: 8px 12px;
    border: 1px solid #ddd;
    background: #fff;
    cursor: pointer;
    font-size: 14px;
    text-decoration: none;
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