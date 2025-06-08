<?php
include('admin/modules/config.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_baiviet = intval($_GET['id']);

    $sql = "SELECT noidung FROM tintuc WHERE id_baiviet = ? LIMIT 1";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id_baiviet);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row_tintuc = mysqli_fetch_assoc($result)) {
        echo '<div class="news-content">';
        echo nl2br(html_entity_decode($row_tintuc['noidung'])); // Hiển thị đúng định dạng HTML
        echo '</div>';
    } else {
        echo '<p>Bài viết không tồn tại.</p>';
    }

    mysqli_stmt_close($stmt);
} else {
    echo '<p>ID bài viết không hợp lệ.</p>';
}
?>
