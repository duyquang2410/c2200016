<?php

    session_start();

    require 'connect.php';

    $id = $_POST["temp_id"];
    $name = $_POST["name"];
    $des = $_POST["des"];

    $sql = "UPDATE nhacungcap SET Ten_NCC = '{$name}', DiaChi_NCC = '{$des}' WHERE Ma_NCC = {$id};";

    if($conn->query($sql) == true){
        $message = "Cập nhật thành công!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header('Refresh: 0;url=source.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

?>
