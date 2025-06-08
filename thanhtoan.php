<?php
session_start();
include('admin/modules/config.php'); // Đảm bảo kết nối đúng

// Kiểm tra nếu chưa đăng nhập hoặc giỏ hàng trống
if (!isset($_SESSION['dangnhap']) || empty($_SESSION['product'])) {
    header('Location: index.php?xem=camon');
    exit();
}

$name = $_SESSION['dangnhap'];

// Thêm đơn hàng vào bảng `cart`
$insert_cart = "INSERT INTO cart (fullname) VALUES (?)";
$stmt = mysqli_prepare($conn, $insert_cart);
mysqli_stmt_bind_param($stmt, "s", $name);

if (mysqli_stmt_execute($stmt)) {
    $cart_id = mysqli_insert_id($conn); // Lấy ID giỏ hàng vừa tạo
    mysqli_stmt_close($stmt);

    // Thêm chi tiết giỏ hàng vào bảng `cart_detail`
    $insert_cart_detail = "INSERT INTO cart_detail (cart_id, product_id, quantity, price) VALUES (?, ?, ?, ?)";
    $stmt_detail = mysqli_prepare($conn, $insert_cart_detail);

    foreach ($_SESSION['product'] as $product) {
        $product_id = $product['id'];
        $quantity = $product['qty'];
        $price = $product['price'];

        // Gán tham số đúng kiểu dữ liệu
        mysqli_stmt_bind_param($stmt_detail, "iiid", $cart_id, $product_id, $quantity, $price);
        mysqli_stmt_execute($stmt_detail);
    }

    mysqli_stmt_close($stmt_detail);
}

// Xóa giỏ hàng khỏi session
unset($_SESSION['product']);

// Chuyển hướng đến trang cảm ơn
header('Location: index.php?xem=camon');
exit();
?>
