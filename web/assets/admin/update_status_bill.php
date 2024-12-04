<?php
  session_start();
  require 'connect.php';
	
	$reason = null ;

	$nvid = $_SESSION["nvid"];
	$mahd = $_POST["mahd"];
    $status = $_POST["status"];

	$sql = "update giaodich set TT_MA = {$status}";
	
	
	

	if ($status!=1){
		$sql .= ", Ma_NV  = {$nvid}";
	} else {
		$sql .= ", Ma_NV  = null";
	}
	
	
	$sql .= " where Ma_GD  = {$mahd}";

	$rs = $conn->query($sql);
	if($rs) {
		$message = "Cập nhật đơn hàng thành công!";
        echo "<script type='text/javascript'>alert('$message');</script>";
		header('Refresh: 0;url=product_waits.php');
	} else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
$conn->close();
?>