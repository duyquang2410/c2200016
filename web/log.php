<?php
require_once "conn.php"; // Đường dẫn tới file kết nối



$sql = "select HoTen_KH, Email_KH from khachhang where HoTen_KH = '".$_POST["name"]."' and MatKhau_MK = '".($_POST["password"])."'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "Dang nhap thanh cong <br>";
  $row = $result->fetch_assoc();
  echo "email:".$row['Email_KH']. ' Fullname: '.$row['HoTen_KH'];
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
