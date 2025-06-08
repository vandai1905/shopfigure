<div class="content_right" style="width:100%;">
    <?php
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id_video = intval($_GET['id']);

        $sql = "SELECT tenvideo, linkvideo FROM video WHERE id_video = ? LIMIT 1";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id_video);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($dong_video = mysqli_fetch_assoc($result)) {
            $video_id = htmlspecialchars($dong_video['linkvideo']);
            $video_url = "https://www.youtube.com/watch?v=" . $video_id;
            $thumbnail_url = "https://img.youtube.com/vi/" . $video_id . "/hqdefault.jpg"; 

            echo '<h1 align="center">
                    <a href="' . $video_url . '" target="_blank" style="text-decoration: none; color: black;">
                        ' . htmlspecialchars($dong_video['tenvideo']) . '
                    </a>
                  </h1>';
            
            echo '<div align="center">
                    <a href="' . $video_url . '" target="_blank">
                        <img src="' . $thumbnail_url . '" alt="Thumbnail" style="width:80%; max-width: 600px; cursor: pointer; border-radius: 10px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);">
                    </a>
                  </div>';
        } else {
            echo '<p align="center">Video không tồn tại.</p>';
        }

        mysqli_stmt_close($stmt);
    } else {
        echo '<p align="center">ID video không hợp lệ.</p>';
    }
    ?>
</div>
