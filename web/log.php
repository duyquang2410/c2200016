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


$sql = "select HoTen_KH, Email_KH from khachhang where HoTen_KH = '".$_POST["name"]."' and MatKhau_MK = '".($_POST["password"])."'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "Dang nhap thanh cong <br>";
  $row = $result->fetch_assoc();
  echo "email:".$row['Email_KH']. ' Fullname: '.$row['HOTen_KH'];
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
