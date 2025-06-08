<?php
include('../config.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Lấy thông tin đơn hàng
    $sql = "SELECT cart_detail.quantity FROM cart_detail WHERE cart_detail.cart_id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        echo "Không tìm thấy đơn hàng!";
        exit;
    }

    // Xử lý khi nhấn nút lưu
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $quantity = intval($_POST['quantity']);

        // Cập nhật số lượng
        $update_sql = "UPDATE cart_detail SET quantity = $quantity WHERE cart_id = $id";
        if (mysqli_query($conn, $update_sql)) {
            echo "<script>alert('Cập nhật thành công!'); window.location.href = '../donhang/list_donhang.php';</script>";
            exit;
        } else {
            echo "Lỗi khi cập nhật: " . mysqli_error($conn);
        }
    }
} else {
    echo "Thiếu ID đơn hàng!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Đơn hàng</title>
    <link rel="stylesheet" type="text/css" href="../css.css">
    <style>
        body {
            margin: 0;
            padding: 0;
        }
        .form-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        h2.text-primary {
            text-align: center;
            color: #007bff;
        }

        .form-container {
            margin: 20px auto;
            padding: 20px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            white-space: nowrap;
        }

        input[type="number"] {
            flex: 1;
            padding: 8px;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            margin-bottom: 5px;
        }

        button.btn-save, a.btn-cancel {
            display: inline-block;
            padding: 10px 15px;
            border-radius: 5px;
            text-align: center;
            font-weight: bold;
            text-decoration: none;
            cursor: pointer;
        }

        button.btn-save {
            background-color: #28a745;
            color: white;
            border: none;
            transition: background 0.3s;
        }

        button.btn-save:hover {
            background-color: #218838;
        }

        a.btn-cancel {
            background-color: #dc3545;
            color: white;
            margin-left: 10px;
        }

        a.btn-cancel:hover {
            background-color: #c82333;
        }

        button.btn-save, button.btn-cancel {
            display: inline-block;
            padding: 10px 15px;
            border-radius: 5px;
            text-align: center;
            font-weight: bold;
            text-decoration: none;
            cursor: pointer;
            border: none;
        }

        button.btn-cancel {
            background-color: #dc3545;
            color: white;
            margin-left: 10px;
        }

        button.btn-cancel:hover {
            background-color: #c82333;
        }


    </style>
</head>
<body>
<div class="wrapper">
    <?php include('../header.php'); ?>

    <div class="form-container">
        <h2 class="text-primary">Sửa Đơn hàng</h2>
        <form method="POST">
    <div class="form-group">
        <label for="quantity">Số lượng:</label>
        <input type="number" id="quantity" name="quantity" value="<?php echo $row['quantity']; ?>" required>
    </div>
    <button type="submit" class="btn-save">Lưu</button>
    <button type="button" class="btn-cancel" onclick="window.location.href='../donhang/list_donhang.php'">Hủy</button>
</form>

    </div>

    <?php include('../footer.php'); ?>
</div>
</body>
</html>

<?php
mysqli_close($conn);
?>
