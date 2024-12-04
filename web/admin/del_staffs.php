<?php
require 'connect.php';

$nvid = $_POST["nvid"];
$sql = "SELECT Ten_NV FROM nhanvien WHERE Ma_NV = {$nvid}";

$result = mysqli_query($conn, $sql);
if ($result) {
    $row = mysqli_fetch_assoc($result); 
    $nvten = $row["Ten_NV"];
    $sql1 = "DELETE FROM nhanvien WHERE Ma_NV = {$nvid}";

    if (mysqli_query($conn, $sql1)) {
        $message = "Xoá nhân viên ".$nvten." thành công";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header('Refresh: 0;url=staffs.php');
    } else {
        echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>
