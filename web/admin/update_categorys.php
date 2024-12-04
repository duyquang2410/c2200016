<?php

session_start();

require 'connect.php';

// Kiểm tra xem dữ liệu đã được gửi đi chưa
if(isset($_POST["temp_id"]) && isset($_POST["name"])) {
    $id = $_POST["temp_id"];
    $name = $_POST["name"];
    $imagePath = ""; // Đường dẫn mới của hình ảnh

    if(isset($_FILES["newProductImg"]) && $_FILES["newProductImg"]["error"] == 0) {
        // Xử lý upload ảnh mới nếu có
        $file_name = basename($_FILES["newProductImg"]["name"]);
        $target_dir = "upload/";
        $target_file = $target_dir . $file_name;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $uploadOk = 1;

        // Kiểm tra xem thư mục đích có tồn tại không
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        // Kiểm tra xem tệp có phải là hình ảnh thực sự hay không
        $check = getimagesize($_FILES["newProductImg"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            die("File không phải là hình ảnh.");
        }

        // Kiểm tra kích thước tệp
        if ($_FILES["newProductImg"]["size"] > 30000000) {
            die("Dung lượng tệp quá lớn");
        }

        // Kiểm tra định dạng tệp
        if(!in_array($imageFileType, array("jpg", "png", "jpeg"))) {
            die("Chỉ chấp nhận các định dạng JPG, JPEG & PNG <br>" . $file_name);
        }

        if($uploadOk == 1) {
            if(move_uploaded_file($_FILES["newProductImg"]["tmp_name"], $target_file)) {
                $imagePath = ", HinhAnh_DM = '{$target_file}'"; // Cập nhật đường dẫn mới của ảnh
            } else {
                die("Có lỗi khi tải lên tệp.");
            }
        }
    }

    // Xây dựng câu truy vấn SQL dựa vào có hay không có ảnh mới được tải lên
    $sql = "UPDATE danhmuc SET Ten_DM = '{$name}'";

    if(empty($imagePath)) {
        // Nếu không có ảnh mới được tải lên, sử dụng đường dẫn cũ
        $sql .= ", HinhAnh_DM = HinhAnh_DM";
    } else {
        // Nếu có ảnh mới được tải lên, sử dụng đường dẫn mới
        $sql .= $imagePath;
    }

    $sql .= " WHERE Ma_DM = {$id}";

    // Thực thi câu truy vấn SQL
    if($conn->query($sql) == true){
        $message = "Cập nhật thành công!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header('Refresh: 0;url=categorys.php');
    } else {
        die("Error: " . $sql . "<br>" . $conn->error);
    }
} else {
    // In thông báo lỗi nếu dữ liệu không được gửi đi đúng cách
    die("Dữ liệu gửi đi không hợp lệ.");
}

// Đóng kết nối
$conn->close();

?>
