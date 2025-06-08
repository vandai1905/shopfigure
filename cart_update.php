<?php
session_start();
include('admin/modules/config.php');

if (isset($_POST['type']) && $_POST['type'] == 'add') {
    $product_id = intval($_POST['product_id']); 
    $product_qty = intval($_POST['qty']);
    $return_url = base64_decode($_POST['return_url']);

    if ($product_qty > 10) {
        echo '<script>alert("Số lượng không được vượt quá 10 sản phẩm")</script>';
        echo '<a href="' . htmlspecialchars($return_url) . '">Quay lại</a>';
        exit;
    }

    // Kết nối MySQLi
    $con = mysqli_connect("localhost", "root", "", "shopfigure");
    if (!$con) {
        die("Lỗi kết nối MySQL: " . mysqli_connect_error());
    }

    mysqli_set_charset($con, "utf8");

    // Lấy thông tin sản phẩm từ database
    $sql = "SELECT product_image, product_price, product_title FROM products WHERE product_id='$product_id' LIMIT 1";
    $run_pro = mysqli_query($con, $sql);
    $row_pro = mysqli_fetch_array($run_pro, MYSQLI_ASSOC);

    if ($row_pro) {
        $new_pro = array(
            'id' => $product_id,
            'image' => $row_pro['product_image'],
            'name' => $row_pro['product_title'],
            'qty' => $product_qty,
            'price' => $row_pro['product_price']
        );

        if (isset($_SESSION['product'])) {
            $found = false;
            foreach ($_SESSION['product'] as &$cart_itm) {
                if ($cart_itm['id'] == $product_id) {
                    $cart_itm['qty'] += $product_qty; // Cộng dồn số lượng thay vì thay thế
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                $_SESSION['product'][] = $new_pro;
            }
        } else {
            $_SESSION['product'][] = $new_pro;
        }
    }

    mysqli_close($con);
    header('Location: index.php?xem=cart');
    exit;
}

// Xóa toàn bộ giỏ hàng
if (isset($_GET['emptycart']) && $_GET['emptycart'] == 1) {
    unset($_SESSION['product']);
    $return_url = base64_decode($_GET["return_url"]);
    header('Location: ' . htmlspecialchars($return_url));
    exit;
}

// Xóa một sản phẩm khỏi giỏ hàng
if (isset($_GET['removep']) && isset($_GET['return_url']) && isset($_SESSION['product'])) {
    $return_url = base64_decode($_GET['return_url']);
    $product_id = intval($_GET['removep']);

    $_SESSION['product'] = array_filter($_SESSION['product'], function ($cart_itm) use ($product_id) {
        return $cart_itm['id'] != $product_id;
    });

    header('Location: ' . htmlspecialchars($return_url));
    exit;
}
?>
