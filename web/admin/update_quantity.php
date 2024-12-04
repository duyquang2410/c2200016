<?php

    session_start();

    require 'connect.php';

    $pdid = $_POST["temp_id"];
    $quant = $_POST["quantity"];

    $sql = "UPDATE sanpham SET soluong_sp = soluong_sp + CAST('".$quant."' AS int) WHERE Ma_SP  = {$pdid};";
    
    // $sql1 = "INSERT INTO chitiet_pn
    //          SELECT {$pdid}, '".$_SESSION["id"]."', CAST('".$quant."' AS int)
    //          FROM chitiet_pn
    //          where SP_MA = {$pdid}";

    $sql1 = "update chitiet_pn set
    SoLuong_PN = SoLuong_PN + + CAST('".$quant."' AS int)
                where Ma_SP = {$pdid}";

    if(($conn->query($sql) == true) && ($conn->query($sql1) == true)){
        $message = "Nhập thêm sản phẩm thành công!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header('Refresh: 0;url=products.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        echo "Error: " . $sql1 . "<br>" . $conn->error;
    }

?>