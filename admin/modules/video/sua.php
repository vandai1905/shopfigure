<?php
include('../config.php');

// Lấy id_video từ URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Truy vấn thông tin video
$videoQuery = "SELECT * FROM video WHERE id_video = $id";
$videoResult = mysqli_query($conn, $videoQuery);
$video = mysqli_fetch_assoc($videoResult);

if (!$video) {
    echo "<p class='text-danger'>Video không tồn tại!</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Video</title>
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
        <h2 class="text-primary">Sửa Video</h2>
        <form action="xuly.php" method="post" enctype="multipart/form-data" class="form-content">
            <input type="hidden" name="id_video" value="<?php echo $video['id_video']; ?>">
            <div class="form-group">
                <label for="tenvideo">Tên Video</label>
                <input type="text" name="tenvideo" id="tenvideo" required value="<?php echo htmlspecialchars($video['tenvideo']); ?>">
            </div>
            <div class="form-group">
                <label for="linkvideo">Link Video</label>
                <input type="url" name="linkvideo" id="linkvideo" required value="<?php echo htmlspecialchars($video['linkvideo']); ?>">
            </div>
            <div class="form-group">
                <label for="image">Ảnh hiện tại</label>
                <?php if (!empty($video['anhvideo'])) { ?>
                    <img src="uploads/<?php echo htmlspecialchars($video['anhvideo']); ?>" width="100">
                <?php } else { ?>
                    <p>Không có hình ảnh</p>
                <?php } ?>
            </div>
            <div class="form-group">
                <label for="anhvideo">Chọn ảnh mới</label>
                <input type="file" name="anhvideo" id="anhvideo" accept="image/*">
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
