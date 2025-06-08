<?php 
include('../config.php');
?>

<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Tin Tức</title>
    <link rel="stylesheet" type="text/css" href="../css.css">
    <style>
        .form-group {
            display: grid;
            align-items: center;
        }
        .form-container {
            max-width: 570px;
        }
        form {
            text-align: justify;
        }
        .form-group label {
            font-weight: bold;
            margin: 10px 0;
            width: 150px;
            text-align: left;
        }
        .form-group input,
        .form-group textarea {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn {
            background-color: #007bff;
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
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <?php include('../header.php'); ?>

    <div class="form-container">
        <h2 class="text-primary">Thêm Tin Tức</h2>
        <form action="xuly.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="tenbaiviet">Tên bài viết</label>
                <input type="text" name="tenbaiviet" id="tenbaiviet" required>
            </div>
            <div class="form-group">
                <label for="anhminhhoa">Ảnh minh họa</label>
                <input type="file" name="anhminhhoa" id="anhminhhoa" required>
            </div>
            <div class="form-group">
                <label for="tomtat">Tóm tắt</label>
                <textarea name="tomtat" id="tomtat" cols="45" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="noidung">Nội dung</label>
                <textarea name="noidung" id="noidung" cols="45" rows="10"></textarea>
            </div>
            <br>
            <div class="form-group">
                <button type="submit" name="them" class="btn">Thêm Bài Viết</button>
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
