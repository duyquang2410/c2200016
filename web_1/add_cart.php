<?php
require 'conn.php';

if (!isset($_SESSION["khid"])) {
    $message = "Vui lòng đăng nhập để thêm vào giỏ hàng!";
    echo "<script type='text/javascript'>alert('$message');</script>";
    echo "<script>window.location='login.php';</script>";
} else {
    if (isset($_GET["id"])) {
        $spid = $_GET["id"];
        $slsp = $_GET["quantity"];
        $khid = $_SESSION["khid"];

        $check_exist = "SELECT COUNT(*) AS tontai FROM chitietgiaodich ct JOIN giaodich gd ON ct.Ma_GD = gd.Ma_GD WHERE gd.Ma_KH = {$khid} AND ct.Ma_SP = {$spid}";
        $rs_chk = $conn->query($check_exist);
        $r = mysqli_fetch_assoc($rs_chk);

        if ($r["tontai"] > 0) {
            // Đã tồn tại giỏ hàng của khách hàng, cập nhật số lượng sản phẩm
            $sql_update = "UPDATE chitietgiaodich SET SoLuong_GD = SoLuong_GD + {$slsp} WHERE Ma_GD = (SELECT gd.Ma_GD FROM giaodich gd JOIN chitietgiaodich ctgd ON ctgd.Ma_GD=gd.Ma_GD WHERE gd.Ma_KH={$khid} AND ctgd.Ma_SP={$spid}) AND Ma_SP = {$spid}";

            if ($conn->query($sql_update) === true) {
                $message = "Cập nhật giỏ hàng thành công";
            } else {
                echo "Error updating cart: " . $conn->error;
            }
        } else {
            // Chưa tồn tại giỏ hàng của khách hàng, tạo mới giỏ hàng và chi tiết giỏ hàng
            $sql_maxgh = "SELECT MAX(Ma_GD) AS maxgh FROM giaodich";
            $result_maxgh = $conn->query($sql_maxgh);
            $maxgh = $result_maxgh->fetch_assoc()["maxgh"];
            $idgh = $maxgh + 1;

            $sql_insert = "INSERT INTO giaodich (Ma_KH, Ma_LGD, Ma_NV, TT_MA, NGAY_LAP,PTTT_MA ) 
                           VALUES ($khid, 1, 1, 1, NOW(),1)";

            if ($conn->query($sql_insert) === true) {
                $sql_ctgh = "INSERT INTO chitietgiaodich (Ma_GD, Ma_SP, SoLuong_GD) VALUES ('$idgh', '$spid', '$slsp')";
                
                if ($conn->query($sql_ctgh) === true) {
                    $message = "Thêm vào giỏ hàng thành công";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                    header('Refresh: 0;url=cart.php');
                } else {
                    echo "Error inserting into cart: " . $conn->error;
                }
            } else {
                echo "Error inserting into orders: " . $conn->error;
            }
        }
    } else {
        // Xử lý logic khi không có ID sản phẩm được truyền vào
    }
}
?>
