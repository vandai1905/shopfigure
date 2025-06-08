<?php
include('../config.php');

// Lấy product_id từ URL
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Truy vấn thông tin sản phẩm
$productQuery = "SELECT * FROM products WHERE product_id = $product_id";
$productResult = mysqli_query($conn, $productQuery);
$product = mysqli_fetch_assoc($productResult);

// Truy vấn danh sách loại sản phẩm
$gameQuery = "SELECT * FROM game";
$gameResult = mysqli_query($conn, $gameQuery);

$nhanvatQuery = "SELECT * FROM nhanvat";
$nhanvatResult = mysqli_query($conn, $nhanvatQuery);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sản phẩm</title>
    <link rel="stylesheet" type="text/css" href="../css.css">
<style>
    .form-group {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 15px;
    }
    .form-group label {
        font-weight: bold;
        margin-right: 10px;
        width: 150px;
        text-align: left;
    }
    .form-group input,
    .form-group select,
    .form-group textarea {
        flex: 1;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    .form-group select {
        text-align: center;
    }
    .btn {
        background-color: #28a745;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-align: center;
        font-weight: bold;
        display: block;
        width: 100%;
    }
    .btn:hover {
        background-color: #218838;
    }
</style>
</head>
<body>
<div class="wrapper">
    <?php include('../header.php'); ?>

    <div class="form-container">
        <h2 class="text-primary">Sửa Sản phẩm</h2>
        <form action="xuly.php" method="post" enctype="multipart/form-data" class="form-content">
            <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
            <div class="form-group">
                <label for="product_title">Tên sản phẩm</label>
                <input type="text" name="product_title" id="product_title" required value="<?php echo htmlspecialchars($product['product_title']); ?>">
            </div>
            <div class="form-group">
                <label for="product_price">Giá</label>
                <input type="number" name="product_price" id="product_price" required value="<?php echo $product['product_price']; ?>">
            </div>
            <div class="form-group">
                <label for="product_cat">Tên game</label>
                <select name="product_cat" id="product_cat" required>
                    <option value="" disabled>Chọn</option>
                    <?php while ($dong = mysqli_fetch_array($gameResult, MYSQLI_ASSOC)) { ?>
                        <option value="<?php echo $dong['game_id']; ?>" <?php echo ($dong['game_id'] == $product['product_cat']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($dong['tengame']); ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="product_brand">Tên nhân vật</label>
                <select name="product_brand" id="product_brand" required>
                    <option value="" disabled>Chọn</option>
                    <?php while ($dong = mysqli_fetch_array($nhanvatResult, MYSQLI_ASSOC)) { ?>
                        <option value="<?php echo $dong['nhanvat_id']; ?>" <?php echo ($dong['nhanvat_id'] == $product['product_brand']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($dong['tennhanvat']); ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="product_desc">Mô tả sản phẩm</label>
                <textarea name="product_desc" id="product_desc" cols="45" rows="3"><?php echo htmlspecialchars($product['product_desc']); ?></textarea>
            </div>
            <div class="form-group">
                <label for="image">Hình ảnh hiện tại</label>
                <?php if (!empty($product['product_image'])) { ?>
                    <img src="../sanpham/uploads/<?php echo htmlspecialchars($product['product_image']); ?>" width="100">
                <?php } else { ?>
                    <p>Không có hình ảnh</p>
                <?php } ?>
            </div>
            <div class="form-group">
                <label for="new_image">Chọn hình mới</label>
                <input type="file" name="new_image" id="new_image">
            </div>
            <div class="form-group">
                <label for="product_keywords">Từ khóa</label>
                <input type="text" name="product_keywords" id="product_keywords" required value="<?php echo htmlspecialchars($product['product_keywords']); ?>">
            </div>
            <div class="form-group">
                <button type="submit" name="sua" class="btn">Cập nhật</button>
            </div>
        </form>
    </div>

    <?php include('../footer.php'); ?>
</div>
</body>
</html>

<?php
mysqli_close($conn);
?>