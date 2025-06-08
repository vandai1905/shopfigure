<meta http-equiv="content-type" content="text/html; charset=UTF-8" />

<div class="content_right" style="width:100%;">
    <?php
    // Kết nối MySQLi
    $con = mysqli_connect("localhost", "root", "", "shopfigure");

    // Kiểm tra kết nối
    if (!$con) {
        die("Kết nối thất bại: " . mysqli_connect_error());
    }

    // Thiết lập bộ mã UTF-8
    mysqli_set_charset($con, "utf8");

    // Truy vấn video
    $sql3 = "SELECT * FROM video";
    $run_video = mysqli_query($con, $sql3);
    ?>

    <p class="loai">Video</p>

    <?php if (mysqli_num_rows($run_video) > 0) { ?>
        <ul>
            <?php while ($dong_video = mysqli_fetch_assoc($run_video)) { ?>
                <li>
                    <p class="hoverplay">
                        <img src="admin/modules/video/uploads/<?php echo htmlspecialchars($dong_video['anhvideo']); ?>" width="150" height="150" alt="Ảnh video">
                    </p>
                    <div class="clear"></div>
                    <p style="font-weight:bold">
                        <a href="<?php echo htmlspecialchars($dong_video['linkvideo']); ?>" target="_blank" rel="noopener noreferrer">
                            <?php echo htmlspecialchars($dong_video['tenvideo']); ?>
                        </a>
                    </p>
                </li>
            <?php } ?>
        </ul>
    <?php } else { ?>
        <p>Không có video nào.</p>
    <?php } ?>

</div>
