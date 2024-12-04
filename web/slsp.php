<?php 
require_once "conn.php"; // Đường dẫn tới file kết nối
if (isset($_SESSION["khid"])) {
    $khid = $_SESSION["khid"];
    $sql = "select count(ct.Ma_GD) as soluong 
                from chitietgiaodich ct
                join giaodich gd on ct.Ma_GD=gd.Ma_GD
                where gd.Ma_KH={$khid}";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);
    $slsp_gh = $row["soluong"];
    echo "$slsp_gh";
} else{
    echo "0";
}                                   
?>