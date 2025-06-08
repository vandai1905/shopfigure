<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="cart-container">
    <p class="loai">Giỏ hàng của bạn</p>

    <div class="user-info">
        <?php if (isset($_SESSION['customer_name'])): 
            if (isset($_SESSION['customer_image']) && !empty($_SESSION['customer_image'])) {
                $customerAvatar = '/banhang/admin/modules/khachhang/uploads/' . htmlspecialchars($_SESSION['customer_image'], ENT_QUOTES, 'UTF-8');
            } else {
                $customerAvatar = 'uploads/customers/default-avatar.png';
            }
        ?>
            <img src="<?php echo $customerAvatar; ?>" class="user-avatar" alt="Avatar">
            <p class="user-greeting">Xin chào: <?php echo htmlspecialchars($_SESSION['customer_name'], ENT_QUOTES, 'UTF-8'); ?></p>

            <form action="logout.php" method="post" class="logout-form">
                <input type="submit" name="logout" value="Đăng xuất" />
            </form>
        <?php endif; ?>
    </div>

    <div class="cart-items">
        <?php
        $current_url = base64_encode("http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
        if (!empty($_SESSION['product'])) {
            $total = 0;
            foreach ($_SESSION['product'] as $cart_itm) {
                echo '<div class="cart-item">';
            
                // Khối chứa ảnh và thông tin
                echo '<div class="cart-item-top">';
                    // Ảnh nằm bên trái
                    echo '<div class="cart-item-left">';
                        echo '<img src="admin/modules/sanpham/uploads/' . htmlspecialchars($cart_itm['image'], ENT_QUOTES, 'UTF-8') . '" class="cart-image" />';
                    echo '</div>';
            
                    // Thông tin nằm bên phải
                    echo '<div class="cart-item-right">';
                        echo '<p class="product-name">Tên sản phẩm: ' . htmlspecialchars($cart_itm['name'], ENT_QUOTES, 'UTF-8') . '</p>';
                        echo '<p class="product-code">Mã sản phẩm: ' . htmlspecialchars($cart_itm['id'], ENT_QUOTES, 'UTF-8') . '</p>';
                        echo '<p class="product-qty">Số lượng: ' . htmlspecialchars($cart_itm['qty'], ENT_QUOTES, 'UTF-8') . '</p>';
                        echo '<p class="product-price">Giá: ' . htmlspecialchars($cart_itm['price'], ENT_QUOTES, 'UTF-8') . ' USD</p>';
                        echo '<a href="cart_update.php?removep=' . htmlspecialchars($cart_itm['id'], ENT_QUOTES, 'UTF-8') . '&return_url=' . $current_url . '" class="remove-item">Xóa</a>';
                    echo '</div>';
                echo '</div>'; // Kết thúc cart-item-top
            
                // (Nếu bạn có thêm phần dưới nữa thì thêm ở đây)
            
                echo '</div>'; // Kết thúc cart-item
            
                // Tính tổng
                $subtotal = $cart_itm['price'] * $cart_itm['qty'];
                $total += $subtotal;
            }

            echo '<p class="cart-total">Tổng tiền: ' . number_format($total, 0, ',', '.') . ' USD</p>';
            echo '<div class="cart-actions">';
            echo '<form action="cart_update.php" method="get" class="clear-cart-form">';
            echo '<input type="hidden" name="emptycart" value="1">';
            echo '<input type="hidden" name="return_url" value="' . $current_url . '">';
            echo '<button type="submit" class="clear-cart">Xóa tất cả</button>';
            echo '</form>';

            if (!isset($_SESSION['customer_name'])) {
                echo '<p><a href="?xem=taikhoan" class="checkout"></a></p>';
            } else {
                echo '<form action="thanhtoan.php" method="post" class="checkout-form">';
                echo '<button type="submit" name="muahang" class="checkout-button">Mua Hàng</button>';
                echo '</form>';
            }
            echo '</div>'; 
        } else {
            echo '<p class="empty-cart">Giỏ hàng của bạn trống</p>';
        }
        ?>
    </div>

    <p class="continue-shopping"><a href="index.php">Tiếp tục xem sản phẩm</a></p>
</div>

<style>
    body {
        font-family: Arial, sans-serif;
    }
    .cart-container {
        width: 60%;
        margin: 20px auto;
        background-color: #ffebee;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .user-avatar {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        margin-right: 10px;
    }
    .user-info {
    margin: 10px 0; 
    display: flex;
    align-items: center;
    justify-content: space-between; 
    width: 100%;
}

.user-greeting {
    margin-right: 10px;
    font-weight: bold;
}

.logout-form {
    margin-left: auto; /
}

    .logout-form input[type="submit"] {
        background-color: #ff6b6b;
        color: white;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }
    .logout-form input[type="submit"]:hover {
        background-color: #ff8787;
    }
    .cart-item {
  border: 1px solid #ccc;
  margin: 10px 0;
  padding: 10px;
  background-color: #ffecee; /* Màu nền tùy ý */
}

/* Chứa ảnh và thông tin ngang nhau */
.cart-item-top {
  display: flex; 
  align-items: flex-start; /* Hoặc center nếu muốn căn giữa theo chiều dọc */
}

/* Ảnh bên trái */
.cart-item-left {
  margin-right: 15px; /* Khoảng cách với phần text */
}

.cart-image {
  width: 80px; /* Chiều rộng ảnh */
  height: 95px;
}

/* Thông tin bên phải */
.cart-item-right {
  display: flex;
  flex-direction: column;
}

.product-name,
.product-code,
.product-qty,
.product-price {
  margin: 5px 0;
}

.remove-item {
  color: red;
  text-decoration: none;
  font-weight: bold;
  margin-top: 5px;
}

    .continue-shopping a {
        display: block;
        text-align: center;
        color: #1976d2;
        text-decoration: none;
        font-size: 18px;
        margin-top: 20px;
    }
    .empty-cart {
    margin: 50px 0; 
    font-size: 16px;
    color: #d84315;
    text-align: center;
    }
    .cart-actions {
    display: flex;
    justify-content: space-between;
    align-items: center; 
    margin-top: 10px;
}

.clear-cart-form, .checkout-form {
    display: inline-block;
}

.clear-cart, .checkout-button {
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

.clear-cart {
    background-color: #ff6b6b;
    color: white;
}

.clear-cart:hover {
    background-color: #ff8787;
}

.checkout-button {
    background-color: #4caf50;
    color: white;
}

.checkout-button:hover {
    background-color: #66bb6a;
}

</style>
