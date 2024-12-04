
<?php
session_start(); // Bắt đầu phiên làm việc

// Kiểm tra xem có dữ liệu POST được gửi đi không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem các trường dữ liệu đã được gửi đến chưa
    if (isset($_POST["staff_id"]) && isset($_POST["staff_name"]) && isset($_POST["staff_address"]) &&
        isset($_POST["staff_phone"]) && isset($_POST["staff_email"]) && isset($_POST["staff_pass"]) &&
        isset($_POST["staff_repass"]) && isset($_POST["staff_vaitro"]) && isset($_POST["staff_birth"])) {
        
        // Lấy dữ liệu từ biến POST
        $nvid = $_POST["staff_id"];
        $nvname = $_POST["staff_name"];
        $nvaddress = $_POST["staff_address"];
        $nvsdt = $_POST["staff_phone"];
        $nvemail = $_POST["staff_email"];
        $nvpass = $_POST["staff_pass"];
        $nvrepass = $_POST["staff_repass"];
        $nvvt = $_POST["staff_vaitro"];
        $nvbirth = $_POST["staff_birth"];

        // Kiểm tra xem mật khẩu và mật khẩu nhập lại có khớp nhau không
        if ($nvpass != $nvrepass) {
            $message = "Mật khẩu nhập lại không đúng!";
            echo "<script type='text/javascript'>alert('$message');</script>";
            header('Refresh: 0;url=add_staffs.php');
            exit(); // Thoát khỏi script để tránh tiếp tục xử lý
        } else {
            // Kết nối đến cơ sở dữ liệu (Bạn cần phải có phần kết nối này ở đây)
            require 'connect.php';

            // Kiểm tra kết nối
            if ($conn->connect_error) {
                die("Kết nối không thành công: " . $conn->connect_error);
            }

            // Chuẩn bị truy vấn SQL để cập nhật thông tin nhân viên
            $sql = "UPDATE nhanvien SET
                        Ten_NV = '".$nvname."',
                        DiaChi_NV = '".$nvaddress."',
                        Sdt_NV = '".$nvsdt."',
                        Email_NV = '".$nvemail."',
                        NgaySinh_NV = '".$nvbirth."',
                        MatKhau_NV = '".$nvpass."',
                        Ma_BP = '".$nvvt."'
                    WHERE Ma_NV = ".$nvid;

            // Thực thi truy vấn SQL
            if ($conn->query($sql) === TRUE) {
                // Cập nhật các giá trị session nếu cần
                $_SESSION["name"] = $nvname;
                
                // Hiển thị thông báo thành công và chuyển hướng về trang staffs.php
                $message = "Cập nhật nhân viên ".$nvname." thành công!";
                echo "<script type='text/javascript'>alert('$message');</script>";
                header('Refresh: 0;url=staffs.php');
            } else {
                // Hiển thị lỗi nếu có vấn đề khi thực thi truy vấn SQL
                echo "<br>Lỗi: " . $sql . "<br>" . $conn->error;
            }

            // Đóng kết nối đến cơ sở dữ liệu
            $conn->close();
        }
    } else {
        // Hiển thị thông báo nếu thiếu dữ liệu từ biến POST
        $message = "Thiếu dữ liệu POST!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header('Refresh: 0;url=add_staffs.php');
    }
} else {
    // Hiển thị thông báo nếu không có dữ liệu POST được gửi đi
    $message = "Không có dữ liệu POST!";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header('Refresh: 0;url=add_staffs.php');
}
?>
