<?php

require 'connect.php';

$pdid = $_POST["pdid"];

$sql = "SELECT Ten_SP FROM sanpham WHERE Ma_SP = {$pdid}";
$result = $conn->query($sql);

if ($result->num_rows > 0) { // Kiểm tra số hàng trả về từ truy vấn
    $row = mysqli_fetch_assoc($result); 
    $spten = $row["Ten_SP"];
    
    $sql1 = "DELETE FROM chitietgiaodich WHERE Ma_SP = {$pdid}";
    $sql2 = "DELETE FROM chitiet_pn WHERE Ma_SP = {$pdid}"; 
    $sql3 = "DELETE FROM don_gia WHERE Ma_SP = {$pdid}";
    $sql4 = "DELETE FROM chitiethoadon WHERE Ma_SP = {$pdid}";
    $sql5 = "DELETE FROM sanpham WHERE Ma_SP = {$pdid}";

    if ($conn->query($sql1) === TRUE) {
        if ($conn->query($sql2) === TRUE) {
            if ($conn->query($sql3) === TRUE) {
                if ($conn->query($sql4) === TRUE) {
                    if ($conn->query($sql5) === TRUE) {
                        $message = "Xoá sản phẩm ".$spten." thành công";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                        header('Refresh: 0;url=products.php');
                    } else {
                        echo "Error: " . $sql5 . "<br>" . $conn->error;
                    }
                } else {
                    echo "Error: " . $sql4 . "<br>" . $conn->error;
                }
            } else {
                echo "Error: " . $sql3 . "<br>" . $conn->error;
            }
        } else {
            echo "Error: " . $sql2 . "<br>" . $conn->error;
        }
    } else {
        echo "Error: " . $sql1 . "<br>" . $conn->error;
    }
} else {
    echo "Không tìm thấy sản phẩm với mã SP là $pdid";
}

$conn->close();

?>
