<?php
session_start();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Menu Tài Khoản</title>
</head>
<body>

<div class="menu">
    <ul>
        <li><a href="index.php?xem=trangchu">Trang chủ</a></li>
        <li><a href="index.php?xem=contact">Liên hệ</a></li>
        <li><a href="index.php?xem=tintuc">Tin tức</a></li>
        <li><a href="index.php?xem=video">Video</a></li>
        <li><a href="index.php?xem=huongdan">Hướng dẫn</a></li>
        <li><a href="index.php?xem=cart">Giỏ hàng</a></li>
        <li class="account-menu">
            
            <a href="#" id="account-link">
                <?php echo isset($_SESSION['customer_name']) ? $_SESSION['customer_name'] : 'Tài khoản'; ?>
            </a>
            <ul class="dropdown">
                <?php if (isset($_SESSION['customer_name'])): ?>
                    <li><a href="logout.php">Đăng xuất</a></li>
                <?php else: ?>
                    <li><a href="index.php?xem=taikhoan">Đăng nhập</a></li>
                    <li><a href="index.php?xem=dangky">Đăng ký</a></li>
                <?php endif; ?>
            </ul>
        </li>
        

        <div class="search-box">
            <form action="index.php?xem=ketqua" method="post">
                <input type="text" name="search_query" placeholder="Tìm kiếm...">
                <input type="submit" name="search" value="🔍">
            </form>
        </div>
    </ul>
</div>


<script>
    // JavaScript để xử lý dropdown menu
    document.addEventListener("DOMContentLoaded", function () {
        const accountMenu = document.querySelector(".account-menu");
        const dropdown = accountMenu.querySelector(".dropdown");

        accountMenu.addEventListener("mouseenter", function () {
            dropdown.style.display = "block";
        });

        accountMenu.addEventListener("mouseleave", function () {
            dropdown.style.display = "none";
        });
    });
</script>

</body>
</html>
