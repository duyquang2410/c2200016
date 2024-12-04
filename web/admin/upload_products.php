<?php
session_start();
require 'connect.php';

// Lấy tên file và đường dẫn tạm thời của tệp đã tải lên
$file_name = basename($_FILES["productImg"]["name"]);
$target_dir = "../upload/";
$target_file = $target_dir . $file_name;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$uploadOk = 1;

// Kiểm tra nếu form đã được gửi (submit)
if(isset($_POST["submit"])) {
  // Kiểm tra xem file có phải là hình ảnh
  $check = getimagesize($_FILES["productImg"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Nếu tên file đã tồn tại, đổi tên cho phù hợp
if (file_exists($target_file)) {
  $count = 1;
  $name = pathinfo($file_name, PATHINFO_FILENAME);
  $extension = pathinfo($file_name, PATHINFO_EXTENSION);
  
  // Đổi tên file cho đến khi không trùng
  while(file_exists($target_file)) {
    $new_name = $name . "-" . $count . "." . $extension;
    $target_file = $target_dir . $new_name; 
    $count++;
  }
  $file_name = basename($target_file);
}

// Kiểm tra kích thước của tệp
if ($_FILES["productImg"]["size"] > 30000000) {
  echo "Dung lượng file quá lớn";
  $uploadOk = 0;
}

// Kiểm tra định dạng file
if (!in_array($imageFileType, array("jpg", "jpeg", "png"))) {
  echo "Chỉ chấp nhận file JPG, JPEG & PNG";
  $uploadOk = 0;
}

// Nếu không có lỗi khi upload
if ($uploadOk == 1) {
  // Di chuyển file vào thư mục upload
  if (move_uploaded_file($_FILES["productImg"]["tmp_name"], $target_file)) {
    // Thêm đường dẫn "upload/..." vào tên file
    $filename = "upload/" . $file_name;
  } else {
    $filename = "default.png";
  }

  // Lấy id sản phẩm lớn nhất
  $sql_max_id = "SELECT MAX(Ma_SP) AS max_id FROM SANPHAM";
  $result_max_id = $conn->query($sql_max_id);
  $max_id = ($result_max_id->num_rows > 0) ? intval($result_max_id->fetch_assoc()["max_id"]) + 1 : 1;

  // Lấy id phiếu nhập lớn nhất
  $sql_max_pn = "SELECT MAX(Ma_PN) AS max_pn FROM phieunhap";
  $result_max_pn = $conn->query($sql_max_pn);
  $max_pn = ($result_max_pn->num_rows > 0) ? intval($result_max_pn->fetch_assoc()["max_pn"]) + 1 : 1;
  // Lấy id đơn giá lớn nhất
  $sql_max_gia = "SELECT MAX(id_gia) AS max_id_gia FROM don_gia";
  $result_max_gia = $conn->query($sql_max_gia);
  $max_gia = ($result_max_gia->num_rows > 0) ? intval($result_max_gia->fetch_assoc()["max_id_gia"]) + 1 : 1;

  $sql_max_ctpn = "SELECT MAX(Ma_PN) AS max_pn FROM chitiet_pn";
  $result_max_ctpn = $conn->query($sql_max_ctpn);
  $max_ctpn = ($result_max_ctpn->num_rows > 0) ? intval($result_max_ctpn->fetch_assoc()["max_pn"]) + 1 : 1;

  $sql_max_gia = "SELECT MAX(id_gia) AS max_id_gia FROM don_gia";
  $result_max_gia = $conn->query($sql_max_gia);
  $max_gia = ($result_max_gia->num_rows > 0) ? intval($result_max_gia->fetch_assoc()["max_id_gia"]) + 1 : 1;

  
  // Thu thập dữ liệu từ session và form
  $nvid = $_SESSION["nvid"];
  $trongluong = $_POST["pd_tl"];
  $chatlieu = $_POST["pd_cl"];
  $nhid = $_POST["source"];
  $dmid = $_POST["types"];
  $pdname = $_POST["pd_name"];
  $pddes = $_POST["mota"];
  $pdprice = $_POST["pd_price"];
  $pdsl = $_POST["pd_quantity"];
  $pnid = $max_pn+1;
  $pn_id = $max_pn;


  // Thực hiện truy vấn chèn sản phẩm vào bảng SANPHAM
  $sql_sanpham = "INSERT INTO SANPHAM (Ma_SP , Ma_DM , HinhAnh_SP, Ten_SP, TrongLuong_Sp, MoTa_SP, soluong_sp) 
                  VALUES ('$max_id', '$dmid', '$filename', '$pdname', '$trongluong', '$pddes', '$pdsl')";

  // Thực hiện truy vấn chèn đơn giá vào bảng don_gia
  $sql_don_gia = "INSERT INTO don_gia (id_gia , ngay, gia, Ma_SP ) 
                  VALUES ('$max_gia', NOW(), '$pdprice', '$max_id')";

  // Thực hiện truy vấn chèn phiếu nhập vào bảng phieunhap
  $sql_phieunhap = "INSERT INTO phieunhap (Ma_PN , Ma_NV ,Ma_NCC , NgayLap_PN) 
                    VALUES ('$pn_id', '$nvid',$nhid,NOW())";

$sql_ctphieunhap = "INSERT INTO chitiet_pn (Ma_PN ,Ma_SP ,SoLuong_PN,Ma_NCC,id_gia) 
VALUES ('$pn_id','$max_id','$pdsl',$nhid, '$max_gia')";                  

  // Thực hiện các truy vấn và kiểm tra kết quả
  if ($conn->query($sql_sanpham) === true && $conn->query($sql_don_gia) === true && $conn->query($sql_phieunhap) === true&& $conn->query($sql_ctphieunhap) === true) {
    $message = "Thêm sản phẩm thành công";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header('Refresh: 0;url=products.php');
  } else {
    echo "Error: " . $conn->error;
  }

  // Đóng kết nối
  $conn->close();
} else {
  echo "Sorry, your file was not uploaded.";
}
?>
