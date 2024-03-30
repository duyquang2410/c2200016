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


$sql = "select Ma_KH, HoTen_KH, Email_KH from khachhang where HoTen_KH = '".$_POST["name"]."' and MatKhau_KH = '".($_POST["password"])."'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
 
  $row = $result->fetch_assoc();
  
  $cookie_name = "user";
  $cookie_value = $row['HoTen_KH'] ;
  setcookie($cookie_name, $cookie_value, time() + (86400 / 24), "/");
  setcookie("fullname", $row['HoTen_KH'], time() + (86400 / 24), "/");
  setcookie("id", $row['Ma_KH'], time() + (86400 / 24), "/");
  
  header('Location: index.php');
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
  //Tro ve trang dang nhap sau 3 giay
  header('Refresh: 3;url=login.php');

}

$conn->close();
?>

