<?php
include('../config.php');
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Video</title>
    <link rel="stylesheet" type="text/css" href="../css.css">
<style>
    .form-group {
        display: grid;
        align-items: center;
        margin-bottom: 15px;
    }
    .form-group label {
        font-weight: bold;
        margin-right: 10px;
        width: 150px;
        text-align: left;
    }
    .form-group input {
        flex: 1;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
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
        <h2 class="text-primary">Thêm Video</h2>
        <form action="xuly.php" method="post" enctype="multipart/form-data" class="form-content">
            <div class="form-group">
                <label for="tenvideo">Tên Video</label>
                <input type="text" name="tenvideo" id="tenvideo" required>
            </div>
            <div class="form-group">
                <label for="linkvideo">Link Video</label>
                <input type="url" name="linkvideo" id="linkvideo" required>
            </div>
            <div class="form-group">
                <label for="anhvideo">Chọn ảnh</label>
                <input type="file" name="anhvideo" id="anhvideo" accept="image/*">
            </div>
            <div class="form-group">
                <button type="submit" name="them" class="btn">Thêm Video</button>
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