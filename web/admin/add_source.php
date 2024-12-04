<?php
  require 'connect.php';
?>

<?php

    $sql = "select max(Ma_NCC) as maxid from nhacungcap;";
    if ($conn->query($sql)==true){
        $rs = $conn->query($sql);
        $row = mysqli_fetch_assoc($rs);
        $id = $row["maxid"] + 1;
    } else {
        echo "<br>Error: " . $sql . "<br>" . $conn->error;
    }


    $ten = $_POST["ten"];
    $mota = $_POST["mota"];
    $sdt = $_POST["sdt"];

    $sql = "insert into nhacungcap values ($id, '".$ten."', '".$sdt."','".$mota."');";

    if ($conn->query($sql)==true){
        $message = "Thêm nguồn hàng ".$ten." thành công!";
        echo "<br><script type='text/javascript'>alert('$message');</script>";
        header('Refresh: 0;url=source.php');
    } else {
        echo "<br>Error: " . $sql . "<br>" . $conn->error;
    }

?>
