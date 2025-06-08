<?php
if (isset($_POST['register'])) {
    // Kết nối MySQLi
    $con = mysqli_connect("localhost", "root", "", "shopfigure");
    if (!$con) {
        die("Lỗi kết nối MySQL: " . mysqli_connect_error());
    }
    mysqli_set_charset($con, "utf8");

    // Lấy dữ liệu từ form
    $c_name = trim($_POST['c_name']);
    $c_email = trim($_POST['c_email']);
    $c_pass = trim($_POST['c_pass']);
    $c_country = trim($_POST['c_country']);
    $c_city = trim($_POST['c_city']);
    $c_contact = trim($_POST['c_contact']);
    $c_address = trim($_POST['c_address']);

    // Kiểm tra email đã tồn tại chưa
    $check_email_query = "SELECT customer_email FROM customers WHERE customer_email = ?";
    $stmt_check = mysqli_prepare($con, $check_email_query);
    mysqli_stmt_bind_param($stmt_check, "s", $c_email);
    mysqli_stmt_execute($stmt_check);
    mysqli_stmt_store_result($stmt_check);
    
    if (mysqli_stmt_num_rows($stmt_check) > 0) {
        echo '<script>alert("Email này đã được sử dụng!");</script>';
        mysqli_stmt_close($stmt_check);
        mysqli_close($con);
        exit();
    }
    mysqli_stmt_close($stmt_check);

    // Kiểm tra tên đăng nhập đã tồn tại chưa
    $check_name_query = "SELECT customer_name FROM customers WHERE customer_name = ?";
    $stmt_name = mysqli_prepare($con, $check_name_query);
    mysqli_stmt_bind_param($stmt_name, "s", $c_name);
    mysqli_stmt_execute($stmt_name);
    mysqli_stmt_store_result($stmt_name);

    if (mysqli_stmt_num_rows($stmt_name) > 0) {
        echo '<script>alert("Tên đăng nhập đã được sử dụng!");</script>';
        mysqli_stmt_close($stmt_name);
        mysqli_close($con);
        exit();
    }
    mysqli_stmt_close($stmt_name);

    // Xử lý hình ảnh
    $c_image = $_FILES['c_image']['name'];
    $c_image_tmp = $_FILES['c_image']['tmp_name'];
    $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];

    // Kiểm tra định dạng file
    $image_extension = strtolower(pathinfo($c_image, PATHINFO_EXTENSION));
    if (!in_array($image_extension, $allowed_types)) {
        echo '<script>alert("Chỉ được tải lên file ảnh JPG, PNG, GIF!");</script>';
        exit();
    }

    $target_dir = "admin/modules/khachhang/uploads/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true); // Tạo thư mục nếu chưa tồn tại
    }

    $new_image_name = uniqid() . "." . $image_extension; // Tránh trùng tên file
    $target_file = $target_dir . $new_image_name;

    if (!move_uploaded_file($c_image_tmp, $target_file)) {
        echo '<script>alert("Lỗi tải ảnh. Kiểm tra quyền thư mục.");</script>';
        exit();
    }

    // Thêm dữ liệu vào database
    $insert_c = "INSERT INTO customers (customer_name, customer_email, customer_pass, customer_country, customer_city, customer_image, customer_contact, customer_address) 
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($con, $insert_c);
    mysqli_stmt_bind_param($stmt, "ssssssss", $c_name, $c_email, $c_pass, $c_country, $c_city, $new_image_name, $c_contact, $c_address);

    if (mysqli_stmt_execute($stmt)) {
        echo '<script>alert("Đăng ký thành công!"); window.location.href="index.php?xem=thanhtoan";</script>';
    } else {
        echo '<script>alert("Lỗi đăng ký. Vui lòng thử lại!");</script>';
    }

    // Đóng kết nối
    mysqli_stmt_close($stmt);
    mysqli_close($con);
}
?>

<div class="register-container">
    <h2>Đăng ký tài khoản</h2>
    <form action="index.php?xem=dangky" method="post" enctype="multipart/form-data">
        <div class="input-group">
            <label for="c_name">Tên đăng nhập</label>
            <input type="text" id="c_name" name="c_name" required>
        </div>
        <div class="input-group">
            <label for="c_email">Email</label>
            <input type="email" id="c_email" name="c_email" required>
        </div>
        <div class="input-group">
            <label for="c_pass">Mật khẩu</label>
            <input type="password" id="c_pass" name="c_pass" required>
        </div>
        <div class="input-group">
            <label for="c_image">Ảnh đại diện</label>
            <input type="file" id="c_image" name="c_image" required>
        </div>
        <div class="input-group">
            <label for="c_country">Quốc gia</label>
            <select id="c_country" name="c_country" required>
                <option value="">--Chọn quốc gia--</option>
                <option value="Vietnam">Việt Nam</option>
                <option value="US">Mỹ</option>
                <option value="UK">Anh</option>
            </select>
        </div>
        <div class="input-group">
            <label for="c_city">Thành phố</label>
            <input type="text" id="c_city" name="c_city" required>
        </div>
        <div class="input-group">
            <label for="c_contact">Số điện thoại</label>
            <input type="text" id="c_contact" name="c_contact" required>
        </div>
        <div class="input-group">
            <label for="c_address">Địa chỉ</label>
            <textarea id="c_address" name="c_address" rows="4" required></textarea>
        </div>
        <div class="button-group">
            <input type="submit" name="register" value="Đăng ký">
        </div>
    </form>
    <p class="login-link"><a href="index.php?xem=taikhoan">Quay lại đăng nhập</a></p>
</div>


<style>
    .register-container {
    width: 400px;
    margin: 50px auto;
    padding: 20px;
    background: #f0f8ff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.register-container h2 {
    margin-bottom: 20px;
    color: #333;
}

.input-group {
    margin-bottom: 15px;
    text-align: left;
}

.input-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

.input-group input, 
.input-group select, 
.input-group textarea {
    width: -webkit-fill-available;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
}

.button-group input {
    width: 100%;
    padding: 10px;
    background: #87CEFA;
    border: none;
    color: white;
    font-size: 16px;
    font-weight: bold;
    border-radius: 5px;
    cursor: pointer;
}

.button-group input:hover {
    background: #4682B4;
}

.login-link {
    margin-top: 10px;
}

.login-link a {
    text-decoration: none;
    color: #007BFF;
    font-weight: bold;
}

.login-link a:hover {
    text-decoration: underline;
}

</style>