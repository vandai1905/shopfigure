<?php
include('../config.php');

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
    <title>Thêm sản phẩm</title>
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
        <h2 class="text-primary">Thêm Sản phẩm</h2>
        <form action="xuly.php" method="post" enctype="multipart/form-data" class="form-content">
            <div class="form-group">
                <label for="product_title">Tên sản phẩm</label>
                <input type="text" name="product_title" id="product_title" required>
            </div>
            <div class="form-group">
                <label for="product_price">Giá</label>
                <input type="number" name="product_price" id="product_price" required>
            </div>
            <div class="form-group">
                <label for="product_cat">Tên game</label>
                <select name="product_cat" id="product_cat" required>
                    <option value="" disabled selected>Chọn</option>
                    <?php while ($dong = mysqli_fetch_array($gameResult, MYSQLI_ASSOC)) { ?>
                        <option value="<?php echo $dong['game_id']; ?>">
                            <?php echo htmlspecialchars($dong['tengame']); ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="product_brand">Tên nhân vật</label>
                <select name="product_brand" id="product_brand" required>
                    <option value="" disabled selected>Chọn</option>
                    <?php while ($dong = mysqli_fetch_array($nhanvatResult, MYSQLI_ASSOC)) { ?>
                        <option value="<?php echo $dong['nhanvat_id']; ?>">
                            <?php echo htmlspecialchars($dong['tennhanvat']); ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="product_desc">Mô tả sản phẩm</label>
                <textarea name="product_desc" id="product_desc" cols="45" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="image">Hình ảnh</label>
                <input type="file" name="image" id="image" required>
            </div>
            <div class="form-group">
                <label for="product_keyword">Từ khóa</label>
                <input type="text" name="product_keyword" id="product_keyword" required>
            </div>
            <div class="form-group">
                <button type="submit" name="them" class="btn">+ Thêm sản phẩm</button>
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