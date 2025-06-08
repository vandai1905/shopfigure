<?php 
include('../config.php');

// Kiểm tra `id` có tồn tại và hợp lệ
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    $sql = "SELECT * FROM tintuc WHERE id_baiviet = '$id'";
    $run_tintuc = mysqli_query($conn, $sql);

    if ($run_tintuc && mysqli_num_rows($run_tintuc) > 0) {
        $sua_baiviet = mysqli_fetch_assoc($run_tintuc);
    } else {
        die("❌ Không tìm thấy bài viết.");
    }
} else {
    die("❌ ID bài viết không hợp lệ.");
}
?>

<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Tin Tức</title>
    <link rel="stylesheet" type="text/css" href="../css.css">
    <style>
        .form-group {
            display: grid;
            align-items: center;
        }
        .form-container {
            max-width: 570px;
        }
        form{
            text-align: justify;
        }
        .form-group label {
            font-weight: bold;
            margin: 10px 0 10px 0;
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
        <h2 class="text-primary">✏️ Sửa Tin Tức</h2>
        <form action="xuly.php?id=<?php echo $sua_baiviet['id_baiviet']; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="tenbaiviet">Tên bài viết</label>
                <input type="text" name="tenbaiviet" id="tenbaiviet" required value="<?php echo htmlspecialchars($sua_baiviet['tenbaiviet']); ?>">
            </div>
            <div class="form-group">
                <label for="anhminhhoa">Ảnh minh họa cũ</label> 
                <?php if (!empty($sua_baiviet['anhminhhoa'])) { ?>
                    <img src="../tintuc/uploads/<?php echo htmlspecialchars($sua_baiviet['anhminhhoa']); ?>" width="80" height="80">
                <?php } ?>
                <label for="anhminhhoa">Ảnh minh họa mới</label> 
                <input type="file" name="anhminhhoa" id="anhminhhoa">
               
            </div>
            <div class="form-group">
                <label for="tomtat">Tóm tắt</label>
                <textarea name="tomtat" id="tomtat" cols="45" rows="3"><?php echo htmlspecialchars($sua_baiviet['tomtat']); ?></textarea>
            </div>
            <div class="form-group">
                <label for="noidung">Nội dung</label>
                <textarea name="noidung" id="noidung" cols="45" rows="10"><?php echo htmlspecialchars($sua_baiviet['noidung']); ?></textarea>
            </div>
            <br>
            <div class="form-group">
                <button type="submit" name="sua" class="btn">✅ Cập Nhật</button>
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