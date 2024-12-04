<?php

session_start();

require 'connect.php';

$file_name = basename($_FILES["productImg"]["name"]);
$target_dir = "../upload/";
$target_file = basename($_FILES["productImg"]["name"]); // Chỉ lấy phần tên tệp
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$uploadOk = 1;

// Kiểm tra xem tệp có phải là hình ảnh thực sự hay không
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["productImg"]["tmp_name"]);
    if ($check !== false) {
        echo "File là hình ảnh - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File không phải là hình ảnh.";
        $uploadOk = 0;
    }
}

// Kiểm tra xem tệp đã tồn tại chưa, nếu có thì đổi tên
$new_name = basename($_FILES["productImg"]["name"]);
if (file_exists($target_dir . $target_file)) {
    $count = 1;
    $name = strtolower(pathinfo($new_name, PATHINFO_FILENAME));
    while (file_exists($target_dir . $target_file)) {
        $new_name = $name . "-" . $count . "." . $imageFileType;
        $target_file = $new_name; // Chỉ lấy phần tên tệp
        $count++;
    }
}

// Kiểm tra kích thước tệp
if ($_FILES["productImg"]["size"] > 30000000) {
    echo "Dung lượng tệp quá lớn";
    $uploadOk = 0;
}

// Kiểm tra định dạng tệp
if ($file_name != null) {
    if (!in_array($imageFileType, array("jpg", "png", "jpeg"))) {
        echo "Chỉ chấp nhận các định dạng JPG, JPEG & PNG <br>" . $file_name;
        $uploadOk = 0;
    }
} else {
    $target_file = "default.jpg"; // Sử dụng tên mặc định nếu không có tệp
    $file_name = "default.png";
}

// Kiểm tra xem $uploadOk có được đặt thành 0 do lỗi không
if ($uploadOk == 0) {
    echo "Xin lỗi, tệp của bạn không được tải lên.";
// Nếu mọi thứ đều ổn, thử tải tệp lên
} else {
    if (move_uploaded_file($_FILES["productImg"]["tmp_name"], $target_dir . $target_file)) {
        $filename = $file_name;
    } else {
        $filename = "default.png";
    }

    $sql = "SELECT MAX(Ma_DM) AS maxid FROM danhmuc;";
    $rs = $conn->query($sql);
    if ($rs) {
        $row = mysqli_fetch_assoc($rs);
        $id = $row["maxid"] + 1;
    } else {
        echo "<br>Error: " . $sql . "<br>" . $conn->error;
        exit; // Thoát khỏi chương trình nếu có lỗi
    }

    $ten = $_POST["ten"];
    $img = "upload/" . $target_file; // Sử dụng đường dẫn sau "upload/"

    $sql = "INSERT INTO danhmuc VALUES ($id, '$ten', '$img', NULL);";

    if ($conn->query($sql)) {
        $message = "Thêm danh mục $ten thành công!";
        echo "<br><script type='text/javascript'>alert('$message');</script>";
        header('Refresh: 0;url=categorys.php');
    } else {
        echo "<br>Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
