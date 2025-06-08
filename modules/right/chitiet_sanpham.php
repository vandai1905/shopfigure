<?php
$con = mysqli_connect("localhost", "root", "", "shopfigure");
if (!$con) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
mysqli_set_charset($con, "utf8mb4");

// Lấy ID sản phẩm từ URL
$id = intval($_GET['id']);
$sql = "SELECT * FROM products WHERE product_id=$id";
$chitiet = mysqli_query($con, $sql);
$row_chitiet = mysqli_fetch_array($chitiet);
?>

<!-- Chi tiết sản phẩm -->
<div class="new-content" style="width:100%; padding-top:10px;">
    <?php $current_url = base64_encode($_SERVER['REQUEST_URI']); ?>
    <img src="admin/modules/sanpham/uploads/<?php echo $row_chitiet['product_image']; ?>" width="120" height="150"/>
    <p style="margin-bottom:10px;font-size:20px">Sản phẩm: <?php echo $row_chitiet['product_title']; ?></p>
    <p>Giá: <?php echo number_format($row_chitiet['product_price'], 0, ',', '.'); ?> USD</p>
    <p style="font-weight:bold"><?php echo nl2br(htmlspecialchars($row_chitiet['product_desc'], ENT_QUOTES, 'UTF-8')); ?></p>


    <!-- Form thêm vào giỏ hàng -->
    <form id="add-to-cart" method="post">
        <input type="hidden" name="product_id" value="<?php echo $id; ?>"/>
        <input type="hidden" name="type" value="add"/>
        <input type="hidden" name="return_url" value="<?php echo $current_url; ?>"/>
        <p>Số lượng <input type="text" name="qty" value="1" size="3" /></p>
        <input type="submit" name="add" value="Thêm vào giỏ hàng"/>
    </form>
    <p id="cart-message" style="color:green; display:none;">Thêm vào giỏ hàng thành công!</p>
</div>

<!-- Nút quay lại -->
<a href="index.php" class="back-button">Quay lại</a>

<script>
document.getElementById("add-to-cart").addEventListener("submit", function(event) {
    event.preventDefault();
    let formData = new FormData(this);
    fetch("cart_update.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById("cart-message").style.display = "block";
        setTimeout(() => { document.getElementById("cart-message").style.display = "none"; }, 3000);
    });
});
</script>
<!-- Phần bình luận -->
<div class="comment-section">
    <h3>Bình luận</h3>
    <?php if (isset($_SESSION['customer_name'])) { ?>
        <form id="comment-form" method="post">
            <input type="hidden" name="id_sanpham" value="<?php echo $id; ?>">
            <input type="hidden" name="name" value="<?php echo htmlspecialchars($user_name, ENT_QUOTES, 'UTF-8'); ?>">
            <textarea name="comment" placeholder="Viết bình luận..." required></textarea>
            <input type="submit" value="Gửi bình luận">
        </form>
    <?php } else { ?>
        <p>Bạn cần <a href="login.php">đăng nhập</a> để bình luận.</p>
    <?php } ?>
    <div id="comment-list">
        <?php
        $sql_comments = "SELECT * FROM comment WHERE id_sanpham=$id ORDER BY date DESC";
        $result_comments = mysqli_query($con, $sql_comments);
        while ($row = mysqli_fetch_array($result_comments)) {
            echo "<p><strong>" . htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') . "</strong>: " . nl2br(htmlspecialchars($row['comment'], ENT_QUOTES, 'UTF-8')) . "</p><small>" . $row['date'] . "</small><hr>";
        }
        ?>
    </div>
</div>

<!-- Xử lý bình luận bằng AJAX -->
<script>
document.getElementById("comment-form")?.addEventListener("submit", function(event) {
    event.preventDefault();
    let formData = new FormData(this);
    fetch("modules/right/comment_process.php", {  // Đảm bảo đường dẫn đúng
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById("comment-list").innerHTML = data;
        this.reset();
    });
});

</script>
<style>
body {
    font-family: Arial, sans-serif;
    background: #f8f9fa;
    margin: 0;
    padding: 20px;
}

/* Chi tiết sản phẩm */
.content_right {
    max-width: 600px;
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    margin: auto;
}
.content_right img {
    width: 300px;
    height: auto;
    display: block;
    margin: 0 auto;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.content_right p {
    font-size: 18px;
    margin: 10px;
}
.content_right form {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    gap: 10px;
}
.content_right .back-button {
    display: block;
    margin-top: 20px;
    text-align: center;
    width: 100%;
}
.content_right form input[type="text"] {
    width: 50px;
    text-align: center;
    font-size: 16px;
    padding: 5px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.content_right form input[type="submit"] {
    background: #28a745;
    color: white;
    padding: 10px 15px;
    border: none;
    cursor: pointer;
    font-size: 16px;
    border-radius: 5px;
}

.content_right form input[type="submit"]:hover {
    background: #218838;
}

/* Chỉ áp dụng cho nút quay lại trong trang chi tiết sản phẩm */
.content_right .back-button {
    display: inline-block;
    font-size: 16px;
    padding: 8px 12px;
    background: #ffc107;
    color: black;
    border-radius: 5px;
    text-decoration: none;
    font-weight: bold;
    transition: 0.3s;
}

.content_right .back-button:hover {
    background: #e0a800;
}
/* Comment */
.comment-section {
    margin-top: 20px;
    padding: 20px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}
.comment-section h3 {
    margin-bottom: 10px;
}
.comment-section input, .comment-section textarea {
    width: 100%;
    margin-bottom: 10px;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
}
.comment-section input[type="submit"] {
    background: #007bff;
    color: white;
    border: none;
    cursor: pointer;
}
.comment-section input[type="submit"]:hover {
    background: #0056b3;
}
</style>