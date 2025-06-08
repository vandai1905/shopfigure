<?php
include('admin/modules/config.php'); 

$id = mysqli_real_escape_string($con, $_GET['id']);

// 1. Xác định số sản phẩm trên mỗi trang và trang hiện tại
$limit = 6; // số sản phẩm mỗi trang
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) { 
    $page = 1; 
}
$start = ($page - 1) * $limit;

// 2. Đếm tổng số sản phẩm để phân trang
$sql_count = "SELECT COUNT(*) as total FROM products WHERE product_cat='$id'";
$result_count = mysqli_query($con, $sql_count);
$row_count = mysqli_fetch_array($result_count, MYSQLI_ASSOC);
$total_records = $row_count['total'];
$total_pages = ceil($total_records / $limit);

// 3. Cập nhật câu truy vấn để lấy dữ liệu theo phân trang
$sql = "SELECT game.tengame, products.product_image, products.product_title, products.product_price, products.product_id 
        FROM products 
        JOIN game ON products.product_cat = game.game_id 
        WHERE product_cat='$id'
        LIMIT $start, $limit";
$result = mysqli_query($con, $sql);

// Lấy tên loại sản phẩm
$sql_tengame = "SELECT tengame FROM game WHERE game_id='$id'";
$tengame_result = mysqli_query($con, $sql_tengame);
$dong_tengame = mysqli_fetch_array($tengame_result, MYSQLI_ASSOC);
?>

<p class="game loai"><?php echo $dong_tengame['tengame'] ?></p>
<ul>
<?php
while ($dong = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
?>
    <li>
        <!-- Ấn vào ảnh để chuyển đến trang chitiet.php -->
        <a href="index.php?xem=chitiet&id=<?php echo $dong['product_id']; ?>">
            <img src="admin/modules/sanpham/uploads/<?php echo $dong['product_image']; ?>" width="120" height="150"/>
        </a>
        <p><?php echo $dong['product_title']; ?></p>
        <p>Giá: <?php echo number_format($dong['product_price'], 0, ',', '.'); ?> USD</p>

        <!-- Nút thêm vào giỏ hàng -->
        <button class="add-to-cart" 
                data-id="<?php echo $dong['product_id']; ?>" 
                data-name="<?php echo htmlspecialchars($dong['product_title'], ENT_QUOTES, 'UTF-8'); ?>" 
                data-price="<?php echo $dong['product_price']; ?>" 
                data-image="<?php echo $dong['product_image']; ?>">
            Thêm vào giỏ hàng
        </button>
    </li>
<?php
}
?>
</ul>

<!-- Hiển thị phân trang -->
<div class="pagination">
    <?php 
    // Liên kết "Prev"
    if($page > 1) {
        echo '<a class="btn" href="index.php?xem=loai&id='.$id.'&page='.($page - 1).'">Prev</a>';
    } else {
        echo '<span class="btn disabled">Prev</span>';
    }

    // Hiển thị số trang
    for($i = 1; $i <= $total_pages; $i++){
        if($i == $page){
            echo '<span class="btn active">'.$i.'</span>';
        } else {
            echo '<a class="btn" href="index.php?xem=loai&id='.$id.'&page='.$i.'">'.$i.'</a>';
        }
    }

    // Liên kết "Next"
    if($page < $total_pages) {
        echo '<a class="btn" href="index.php?xem=loai&id='.$id.'&page='.($page + 1).'">Next</a>';
    } else {
        echo '<span class="btn disabled">Next</span>';
    }
    ?>
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
