<?php 
require 'conn.php';

if(isset($_SESSION["khid"])) {
    $total = intval($_POST['total']);
    $khid = $_SESSION["khid"];
    $ghma = $_POST['ghma'];

    // Lấy mã hóa đơn mới
    $sql_max_id = "SELECT MAX(Ma_GD) + 1 AS maxid FROM giaodich";
    $rs = $conn->query($sql_max_id);
    $r = mysqli_fetch_assoc($rs);
    $new_id = $r["maxid"];

    $array = array();
    if(isset($_POST['sparray'])) {
        parse_str($_POST['sparray'], $array);
    }

    $array_sl = array();
    if(isset($_POST['slarray'])) {
        parse_str($_POST['slarray'], $array_sl);
    }

    // Thêm hóa đơn mới
    $sql_insert_hoadon = "INSERT INTO giaodich (Ma_KH, Ma_LGD, Ma_NV, TT_MA, NGAY_LAP,PTTT_MA ) 
    VALUES ($khid, 1, 1, 1, NOW(),1)";

    if ($conn->query($sql_insert_hoadon) === true) {
        $ok = true;

        // Thêm chi tiết hóa đơn
        foreach($array as $spid) {
            $i = 0; // Đặt giá trị $i = 0 ở đầu vòng lặp foreach
            $sql_ct = "INSERT INTO chitiethoadon (Ma_SP, Ma_GD, SO_LUONG_BAN, TONG_THANH_TOAN)
            VALUES ($spid, $new_id, 1, $total)
            ON DUPLICATE KEY UPDATE
            SO_LUONG_BAN = VALUES(SO_LUONG_BAN),
            TONG_THANH_TOAN = VALUES(TONG_THANH_TOAN)";
            $slsp = $array_sl[$i];
            $sql_update_ct = "UPDATE chitiethoadon SET 
            SO_LUONG_BAN = '".$slsp."',
            TONG_THANH_TOAN = '".$total."'
            WHERE Ma_SP = '".$spid."' AND Ma_GD ='".$new_id."'";

                                  
            $i+=1; // Cập nhật giá trị $i ở cuối vòng lặp foreach
            if($conn->query($sql_ct)==true && $conn->query($sql_update_ct)){
                $ok=1;
            } else {
                $ok=0;
                echo "Error: " . $sql_ct . "<br>" . $conn->error;
            }
        }
        
        if ($ok) {
            // Xóa các sản phẩm trong giỏ hàng sau khi đặt hàng thành công
            foreach($array as $spid) {
                $sql_delete = "DELETE FROM chitietgiaodich WHERE Ma_SP = $spid";
                if(!$conn->query($sql_delete)) {
                    echo "Error: " . $sql_delete . "<br>" . $conn->error;
                    $ok = false;
                    break;
                }
            }

            if($ok) {
                $message = "Đã đặt hàng thành công!";
                echo "<script type='text/javascript'>alert('$message');</script>";
                header('Refresh: 0;url=cart.php');
            }
        }
    } else {
        echo "Error: " . $sql_insert_hoadon . "<br>" . $conn->error;
    }
} else {
    $message = "Vui lòng thêm món ăn để đặt hàng!";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header('Refresh: 0;url=product.php');
}
?>
