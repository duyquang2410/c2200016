<?php
require 'conn.php';

$spid = $_POST["idsprm"];
$khid = $_SESSION["khid"];

$sql = "SELECT gd.Ma_GD	 
        FROM giaodich gd
        JOIN chitietgiaodich ctgd ON ctgd.Ma_GD = gd.Ma_GD 
        WHERE gd.Ma_KH = {$khid} AND ctgd.Ma_SP = {$spid}";

$result_magh = $conn->query($sql);

if ($result_magh === false) {
    echo "Error in query: " . $conn->error;
} else {
    $row = $result_magh->fetch_assoc();
    if ($row) {
        $ghma = $row["Ma_GD"];

        if (isset($_POST['remove'])) {
            $delete_sql = "DELETE FROM chitietgiaodich WHERE Ma_SP = $spid AND Ma_GD = $ghma";
            if ($conn->query($delete_sql) === true) {
                $message = "Đã xoá sản phẩm ra khỏi giỏ hàng";
                echo "<script type='text/javascript'>alert('$message');</script>";
                header('Refresh: 0;url=cart.php');
            } else {
                echo "Error deleting record: " . $conn->error;
            }
        }

        if (isset($_POST['update'])) {
            $sl = intval($_POST["qty"]);
            $update_sql = "UPDATE chitietgiaodich SET SoLuong_GD = $sl WHERE Ma_SP = $spid AND Ma_GD = $ghma";
            if ($conn->query($update_sql) === true) {
                $message = "Đã cập nhật số lượng sản phẩm";
                echo "<script type='text/javascript'>alert('$message');</script>";
                header('Refresh: 0;url=cart.php');
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
    } else {
        echo "Không tìm thấy mã giao dịch cho khách hàng này.";
    }
}
?>
