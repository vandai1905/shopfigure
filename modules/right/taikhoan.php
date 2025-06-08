<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include('admin/modules/config.php');

if (isset($_POST['login'])) {
    $c_name = trim($_POST['name']);
    $c_pass = trim($_POST['password']);

    // Kết nối MySQLi
    $con = mysqli_connect("localhost", "root", "", "shopfigure");
    if (!$con) {
        die("Lỗi kết nối MySQL: " . mysqli_connect_error());
    }

    mysqli_set_charset($con, "utf8");

    // Kiểm tra đăng nhập từ bảng customers
    $sel_c = "SELECT * FROM customers WHERE customer_name=? AND customer_pass=?";
    $stmt = mysqli_prepare($con, $sel_c);
    mysqli_stmt_bind_param($stmt, "ss", $c_name, $c_pass);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    if ($row) { // Nếu đăng nhập là khách hàng
        $_SESSION['customer_name'] = $row['customer_name']; 
        $_SESSION['customer_id'] = $row['customer_id']; 
    
        echo '<script>window.location.href="index.php";</script>';
        exit;
    }
    

    // Kiểm tra đăng nhập từ bảng users
    $sel_u = "SELECT * FROM users WHERE username=? AND password=?";
    $stmt = mysqli_prepare($con, $sel_u);
    mysqli_stmt_bind_param($stmt, "ss", $c_name, $c_pass);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    if ($row) { // Nếu đăng nhập là admin
        $_SESSION['admin_name'] = $row['username']; 
        $_SESSION['admin_id'] = $row['id'];
    
        echo '<script>window.location.href="admin/modules/game/list_game.php";</script>';
        exit;
    }
    

    // Nếu không tìm thấy tài khoản hợp lệ
    echo '<script>alert("Tên hoặc mật khẩu không đúng!");</script>';
    
    // Đóng kết nối
    mysqli_stmt_close($stmt);
    mysqli_close($con);
}
?>


<div class="login-container">
    <h2>Đăng nhập</h2>
    <form action="" method="post">
        <div class="input-group">
            <label for="name">Tên đăng nhập</label>
            <input type="text" id="name" name="name" placeholder="Nhập tên đăng nhập..." required />
        </div>
        <div class="input-group">
            <label for="password">Mật khẩu</label>
            <input type="password" id="password" name="password" placeholder="Nhập mật khẩu..." required />
        </div>
        <div class="button-group">
            <input type="submit" name="login" value="Đăng Nhập" />
        </div>
        <p class="register-link"><a href="index.php?xem=dangky">Đăng ký tài khoản mới</a></p>
    </form>
</div>
<style>
    .login-container {
    width: 350px;
    margin: 50px auto;
    padding: 20px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.login-container h2 {
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

.input-group input {
    width: -webkit-fill-available;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
}

.button-group input {
    width: 100%;
    padding: 10px;
    background: #ffd5b6;
    border: none;
    color: black;
    font-size: 16px;
    font-weight: bold;
    border-radius: 5px;
    cursor: pointer;
}

.button-group input:hover {
    background: #e6a88d;
}

.register-link {
    margin-top: 10px;
}

.register-link a {
    text-decoration: none;
    color: #ff6600;
    font-weight: bold;
}

.register-link a:hover {
    text-decoration: underline;
}

</style>