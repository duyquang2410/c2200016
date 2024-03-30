<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$date = date_create($_POST["birth"]);

$sql = "INSERT INTO khachhang (HoTen_KH, NgaySinh_KH, MatKhau_KH, Email_KH) 
	VALUES ('".$_POST["name"] ."', '".$date ->format('Y-m-d') ."','".($_POST["password"])."','".$_POST["email"] ."' )";

if ($conn->query($sql) === TRUE) {
  // Chuyển hướng đến trang đăng nhập
  header("Location: login.php");
  exit(); // Đảm bảo không có mã HTML hoặc mã PHP khác được thực thi sau khi chuyển hướng
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
