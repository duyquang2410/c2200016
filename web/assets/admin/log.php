<?php

require 'connect.php';
session_start();

$username = mysqli_real_escape_string($conn, $_POST['usname']);
$password = mysqli_real_escape_string($conn, $_POST['pass']);

$sql = "select Ma_NV , Ten_NV, MatKhau_NV, Ma_BP , Email_NV from nhanvien where Ten_NV = '".strtolower($username)."' and MatKhau_NV = '".$password."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
 
  
  $row = $result->fetch_assoc();
  $_SESSION["name"] = $row['Ten_NV'];
  $_SESSION["id"] = $row['Ma_NV'];
  $_SESSION["pw"] = $row['MatKhau_NV'];
  $_SESSION["cv"] = $row['Ma_BP'];
  $_SESSION["nvid"] = $row['Ma_NV'];
  $_SESSION["email"] = $row['Email_NV'];
  $pwss = $_SESSION["pw"];



  header('Location: custommer.php');
} else {
  $message = "Tài khoản hoặc mật khẩu không đúng. Vui lòng thử lại!.";
  echo "<script type='text/javascript'>alert('$message');</script>";
  header('Refresh: 0;url=sign_in.php');
}

$conn->close();
?>