<?php
    // Kết nối CSDL
    $con = mysqli_connect("localhost", "root", "", "shopfigure");
    
    // Kiểm tra kết nối
    if (!$con) {
        die("Kết nối thất bại: " . mysqli_connect_error());
    }

    // Thiết lập bộ mã ký tự UTF-8
    mysqli_set_charset($con, "utf8");

    // Lấy danh sách loại
    $sgl1 = "SELECT * FROM game";
    $run_loai = mysqli_query($con, $sgl1);
?>	

<p class="loai">Game</p>
<ul>
    <?php 
        while ($dong = mysqli_fetch_array($run_loai)) {
    ?>
        <li><a href="index.php?xem=loai&id=<?php echo $dong['game_id'] ?>"><?php echo $dong['tengame'] ?></a></li>
    <?php
        }
    ?>                   
</ul>

<?php
    // Lấy danh sách hiệu
    $sgl2 = "SELECT * FROM nhanvat";
    $run_hieu = mysqli_query($con, $sgl2);
?>

<p class="loai">Nhân vật</p>
<ul>
    <?php
        while ($dong = mysqli_fetch_array($run_hieu)) {
    ?>
        <li><a href="index.php?xem=hieu&id=<?php echo $dong['nhanvat_id'] ?>"><?php echo $dong['tennhanvat'] ?></a></li>
    <?php
        }
    ?>
</ul>
