<?php
// Include file connect.php để kết nối với cơ sở dữ liệu
require 'connect.php';

// Kiểm tra xem có dữ liệu được gửi từ form không
if(isset($_POST["supplier_id"])) {
    // Lấy ID của nhà cung cấp từ form
    $supplier_id = $_POST["supplier_id"];
    
    // Xóa nhà cung cấp từ cơ sở dữ liệu
    $sql = "DELETE FROM nhacungcap WHERE Ma_NCC = '$supplier_id'";
    if ($conn->query($sql) === TRUE) {
        // Nếu xóa thành công, chuyển hướng người dùng đến trang chính hoặc hiển thị thông báo
        header('Location: source.php'); // Chuyển hướng đến trang chính của nhà cung cấp
        exit;
    } else {
        // Nếu có lỗi xảy ra trong quá trình xóa, bạn có thể hiển thị thông báo lỗi
        echo "Lỗi: " . $conn->error;
    }
} else {
    // Nếu không có dữ liệu được gửi từ form, bạn có thể chuyển hướng người dùng đến trang chính hoặc hiển thị thông báo lỗi
    echo "Không có dữ liệu được gửi từ form";
}
// Đóng kết nối đến cơ sở dữ liệu
$conn->close();
?>
