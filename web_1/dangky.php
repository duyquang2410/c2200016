<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Đăng ký</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="ketnoi/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
</head>
<?php
require_once "conn.php"; 

if (isset($_POST["dangky"])) {
    // Lấy thông tin từ các form bằng phương thức POST
    $username = $_POST["name"];
    $password = $_POST["password"];
    $kh_sdt = $_POST["Sdt_KH"];
    $kh_email = $_POST["email"];
    $kh_ngaysinh = $_POST["birth"];
    
    // Kiểm tra dữ liệu nhập đầy đủ
    if (empty($username) || empty($password) || empty($kh_sdt) || empty($kh_email) || empty($kh_ngaysinh)) {
        echo "Bạn vui lòng nhập đầy đủ thông tin";
    } else {
        // Kiểm tra tài khoản đã tồn tại chưa
        $sql_check = "SELECT * FROM khachhang WHERE HoTen_KH = '$username'";
        $result_check = mysqli_query($conn, $sql_check);
        if (mysqli_num_rows($result_check) > 0) {
            echo "Tài khoản đã tồn tại";
        } else {
            // Thực hiện việc lưu trữ dữ liệu vào db
            $sql_insert = "INSERT INTO khachhang(HoTen_KH, Sdt_KH, MatKhau_KH, Email_KH, NgaySinh_KH) 
                           VALUES ('$username', '$kh_sdt', '$password', '$kh_email', '$kh_ngaysinh')";
            if (mysqli_query($conn, $sql_insert)) {
                echo '<script>alert("Chúc mừng bạn đăng ký thành công"); location="index.php";</script>';
                exit();
            } else {
                echo "Lỗi: " . $sql_insert . "<br>" . mysqli_error($conn);
            }
        }
    }
}
?>

<body class="bg-white">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row justify-content-center">
                    <div class="col-lg-8">

                        <div class="card-body p-0">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Tạo Tài Khoản</h1>
                                </div>
                                <form action="dangky.php" method="post" class="user">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Họ và tên">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <input type="date" class="form-control form-control-user" id="birth" name="birth" placeholder="Ngày sinh">
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Mật khẩu">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Địa chỉ Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="number" class="form-control form-control-user" id="Sdt_KH" name="Sdt_KH" placeholder="số điện thoại">
                                    </div>
                                    
                                    <button type="submit"  id="dangky" name="dangky" class="btn btn-primary btn-user btn-block">
                                        Đăng Ký Tài Khoản
                                    </button>
                                </form>
                                <hr>
                               
                                <div class="text-center">
                                    <a class="small" href="login.php">Đã có tài khoản? Đăng nhập!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="ketnoi/vendor/jquery/jquery.min.js"></script>
    <script src="ketnoi/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="ketnoi/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="ketnoi/js/sb-admin-2.min.js"></script>

</body>

</html>
