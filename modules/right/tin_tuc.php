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

        // Truy vấn tin tức
        $sql3 = "SELECT * FROM tintuc";
        $run_tintuc = mysqli_query($con, $sql3);
    ?>
    
    <p class="loai">Tin tức</p>
    <ul>
        <?php while ($dong_tintuc = mysqli_fetch_array($run_tintuc)) { ?>
            <li>
                <?php
                    echo '<img src="admin/modules/tintuc/uploads/' . htmlspecialchars($dong_tintuc['anhminhhoa']) . '" width="150" height="150" />';
                ?>
                <div class="clear"></div>
                <p style="font-weight:bold">
                    <a href="index.php?xem=chitiettintuc&id=<?php echo intval($dong_tintuc['id_baiviet']); ?>">
                        <?php echo htmlspecialchars($dong_tintuc['tenbaiviet']); ?>
                    </a>
                </p>
            </li>
        <?php } ?>
    </ul>
</div>
