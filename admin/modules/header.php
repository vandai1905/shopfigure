<div class="header">
    <h1 class="text-center">Trang quản trị nội dung</h1>
</div>

<div class="menu">
    <ul>
        <div class="menu-left">
            <li><a href="../game/list_game.php">Game</a></li>
            <li><a href="../nhanvat/list_nhanvat.php">Nhân vật</a></li>
            <li><a href="../sanpham/list_sanpham.php">Sản phẩm</a></li>
            <li><a href="../khachhang/list_khachhang.php">Khách hàng</a></li>
            <li><a href="../binhluan/list_binhluan.php">Bình luận</a></li>
            <li><a href="../donhang/list_donhang.php">Đơn hàng</a></li>
            <li><a href="../tintuc/list_tintuc.php">Tin tức</a></li>    
            <li><a href="../video/list_video.php">Video</a></li>
        </div>
        <li class="account-menu">
            <a href="#" id="account-link">
                <?php 
                session_start();
                echo isset($_SESSION['admin_name']) ? $_SESSION['admin_name'] : 'Tài khoản'; ?>
            </a>
            <?php if (isset($_SESSION['admin_name'])): ?>
                <ul class="dropdown">
                <li><a href="../../../index.php">Đăng xuất</a></li>
                </ul>
            <?php endif; ?>
        </li>
    </ul>
</div>
