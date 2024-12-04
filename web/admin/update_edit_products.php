<?php
session_start();

require 'connect.php'; // Nạp file kết nối CSDL

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy thông tin từ biểu mẫu POST
    $idsp = $_POST["idsp"];
    $stt_pn = $_POST["stt_pn"];
    $tensp = $_POST["tensp"];
    $giasp = $_POST["giasp"];
    $manh = $_POST["manh"];
    $slsp = $_POST["slsp"];
    $madm = $_POST["madm"];
    $tendm = $_POST["tendm"];
    $anhsp = $_FILES["productImg"]["name"];
    $mota = $_POST["mota"];

    $target_dir = "../upload/"; // Đường dẫn đầy đủ đến thư mục upload
    $target_file = $target_dir . basename($anhsp);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Kiểm tra xem có tệp ảnh đã được tải lên hay không
    if (!empty($_FILES["productImg"]["tmp_name"]) && is_uploaded_file($_FILES["productImg"]["tmp_name"])) {
        // Kiểm tra tính hợp lệ của tệp ảnh
        $check = getimagesize($_FILES["productImg"]["tmp_name"]);
        if ($check === false) {
            echo "File không phải là ảnh.";
            $uploadOk = 0;
        }

        // Kiểm tra kích thước file
        if ($_FILES["productImg"]["size"] > 500000) {
            echo "Dung lượng file quá lớn.";
            $uploadOk = 0;
        }

        // Kiểm tra định dạng file ảnh cho phép
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            echo "Chỉ chấp nhận file JPG, JPEG & PNG.";
            $uploadOk = 0;
        }
    } else {
        echo "Không có tệp ảnh được tải lên.";
        $uploadOk = 0;
    }

    if ($uploadOk == 1) {
        // Di chuyển file vào thư mục upload
        if (move_uploaded_file($_FILES["productImg"]["tmp_name"], $target_file)) {
            // Thêm đường dẫn "upload/..." vào tên file
            $filename = "upload/" . $anhsp;

            // Kiểm tra xem Ma_DM có tồn tại trong bảng danhmuc không
            $checkMaDM = "SELECT * FROM danhmuc WHERE Ma_DM = '{$madm}'";
            $result = $conn->query($checkMaDM);

            if ($result->num_rows > 0) {
                // Cập nhật dữ liệu vào CSDL
                $sql1 = "UPDATE chitiet_pn AS cp
                    JOIN don_gia AS dg ON cp.id_gia = dg.id_gia
                    SET cp.Ma_NCC = '{$manh}',
                        cp.Ma_PN = '{$stt_pn}',
                        cp.SoLuong_PN = '{$slsp}',
                        dg.gia = '{$giasp}'
                    WHERE cp.Ma_SP = '{$idsp}'";

$sql2 = "UPDATE sanpham AS sp
JOIN don_gia AS dg ON sp.Ma_SP = dg.Ma_SP
SET sp.Ma_DM = '{$madm}',
    sp.Ten_SP = '{$tensp}',
    soluong_sp = '{$slsp}',
    sp.HinhAnh_SP = '{$filename}', 
    sp.MoTa_SP = '{$mota}',
    dg.gia = '{$giasp}'
WHERE sp.Ma_SP = '{$idsp}'";


               

                // Thực thi các câu lệnh UPDATE
                if ($conn->query($sql1) === true && $conn->query($sql2) === true) {
                    echo "<script type='text/javascript'>alert('Cập nhật sản phẩm thành công');</script>";
                    header('Refresh: 0; url=products.php');
                } else {
                    echo "Lỗi: " . $conn->error;
                }
            } else {
                echo "Lỗi: Ma_DM không tồn tại trong bảng danhmuc";
            }
        } else {
            echo "Có lỗi xảy ra khi upload file.";
        }
    } else {
        echo "Upload không thành công.";
    }
} else {
    echo "Phương thức không hợp lệ.";
}

$conn->close();
?>
