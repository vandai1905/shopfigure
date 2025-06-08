<?php
include('../config.php');

if (isset($_POST['them'])) {
    // Xử lý THÊM sản phẩm
    $product_title = mysqli_real_escape_string($conn, $_POST['product_title']);
    $product_price = intval($_POST['product_price']);
    $product_cat = intval($_POST['product_cat']);
    $product_brand = intval($_POST['product_brand']);
    $product_desc = mysqli_real_escape_string($conn, htmlspecialchars($_POST['product_desc'], ENT_QUOTES, 'UTF-8'));
    $product_keywords = mysqli_real_escape_string($conn, $_POST['product_keywords']);

    // Kiểm tra xem có tải lên ảnh không
    if (!empty($_FILES['product_image']['name'])) {
        $image_name = $_FILES['product_image']['name'];
        $image_tmp = $_FILES['product_image']['tmp_name'];
        $image_path = "uploads/" . basename($image_name);
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
        $file_extension = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));

        if (!in_array($file_extension, $allowed_extensions)) {
            die("❌ Chỉ chấp nhận tệp JPG, JPEG, PNG hoặc GIF.");
        }

        if (move_uploaded_file($image_tmp, $image_path)) {
            $sql = "INSERT INTO products (product_title, product_price, product_cat, product_brand, product_desc, product_image, product_keywords) 
                    VALUES ('$product_title', '$product_price', '$product_cat', '$product_brand', '$product_desc', '$image_name', '$product_keywords')";
        } else {
            die("❌ Lỗi khi tải lên hình ảnh!");
        }
    } else {
        // Nếu không có ảnh, chỉ thêm dữ liệu sản phẩm
        $sql = "INSERT INTO products (product_title, product_price, product_cat, product_brand, product_desc, product_keywords) 
                VALUES ('$product_title', '$product_price', '$product_cat', '$product_brand', '$product_desc', '$product_keywords')";
    }

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('✅ Thêm sản phẩm thành công!'); window.location.href='../sanpham/list_sanpham.php';</script>";
    } else {
        echo "❌ Lỗi khi thêm sản phẩm: " . mysqli_error($conn);
    }
}

// XỬ LÝ SỬA SẢN PHẨM
if (isset($_POST['sua'])) {
    $id = intval($_POST['product_id']);
    $product_title = mysqli_real_escape_string($conn, $_POST['product_title']);
    $product_price = intval($_POST['product_price']);
    $product_cat = intval($_POST['product_cat']);
    $product_brand = intval($_POST['product_brand']);
    $product_desc = mysqli_real_escape_string($conn, $_POST['product_desc']);
    $product_keywords = mysqli_real_escape_string($conn, $_POST['product_keywords']);

    if ($_FILES['new_image']['name'] != '') {
        $query = "SELECT product_image FROM products WHERE product_id = $id";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            $old_image_path = "uploads/" . $row['product_image'];
            if (file_exists($old_image_path) && is_file($old_image_path)) {
                unlink($old_image_path);
            }
        }

        $image_name = $_FILES['new_image']['name'];
        $image_tmp = $_FILES['new_image']['tmp_name'];
        $image_path = "uploads/" . basename($image_name);
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
        $file_extension = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));

        if (!in_array($file_extension, $allowed_extensions)) {
            die("❌ Chỉ chấp nhận tệp JPG, JPEG, PNG hoặc GIF.");
        }

        if (move_uploaded_file($image_tmp, $image_path)) {
            $sql = "UPDATE products SET 
                        product_title='$product_title',
                        product_price='$product_price',
                        product_cat='$product_cat',
                        product_brand='$product_brand',
                        product_desc='$product_desc',
                        product_image='$image_name',
                        product_keywords='$product_keywords'
                    WHERE product_id=$id";
        } else {
            die("❌ Lỗi khi tải lên hình ảnh!");
        }
    } else {
        $sql = "UPDATE products SET 
                    product_title='$product_title',
                    product_price='$product_price',
                    product_cat='$product_cat',
                    product_brand='$product_brand',
                    product_desc='$product_desc',
                    product_keywords='$product_keywords'
                WHERE product_id=$id";
    }

    if (mysqli_query($conn, $sql)) {
        echo "<script>window.location.href='../sanpham/list_sanpham.php';</script>";
    } else {
        echo "❌ Lỗi: " . mysqli_error($conn);
    }
}

// XỬ LÝ XÓA SẢN PHẨM
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT product_image FROM products WHERE product_id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $image_path = "uploads/" . $row['product_image'];
        if (file_exists($image_path) && is_file($image_path)) {
            unlink($image_path);
        }

        $sql = "DELETE FROM products WHERE product_id = $id";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('🗑️ Sản phẩm đã được xóa thành công!'); window.location.href='../sanpham/list_sanpham.php';</script>";
        } else {
            echo "❌ Lỗi khi xóa sản phẩm: " . mysqli_error($conn);
        }
    } else {
        echo "❌ Không tìm thấy sản phẩm!";
    }
}

mysqli_close($conn);
?>
