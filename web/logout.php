<?php
// Xóa cookie
$cookie_name = "user";
if(isset($_COOKIE[$cookie_name])) {
    unset($_COOKIE[$cookie_name]);
    setcookie($cookie_name, '', time() - 3600, '/'); // Hủy cookie bằng cách đặt thời gian hết hạn trước đó
}

// Chuyển hướng đến trang khác hoặc trang chính
header("Location: index.php"); // Thay thế index.php bằng trang bạn muốn chuyển hướng đến
exit();
?>
