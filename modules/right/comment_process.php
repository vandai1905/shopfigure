<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "shopfigure");
if (!$con) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
mysqli_set_charset($con, "utf8mb4");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['customer_name'])) {
        echo "Vui lòng đăng nhập để bình luận!";
        exit;
    }

    $id_sanpham = intval($_POST['id_sanpham']);
    $name = $_SESSION['customer_name'];
    $comment = mysqli_real_escape_string($con, $_POST['comment']);

    $sql_insert = "INSERT INTO comment (id_sanpham, name, comment) VALUES ('$id_sanpham', '$name', '$comment')";
    mysqli_query($con, $sql_insert);

    // Lấy lại danh sách bình luận mới nhất
    $sql_comments = "SELECT * FROM comment WHERE id_sanpham=$id_sanpham ORDER BY date DESC";
    $result_comments = mysqli_query($con, $sql_comments);

    while ($row = mysqli_fetch_array($result_comments)) {
        echo "<p><strong>" . htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') . "</strong>: " . nl2br(htmlspecialchars($row['comment'], ENT_QUOTES, 'UTF-8')) . "</p><small>" . $row['date'] . "</small><hr>";
    }
}
?>
