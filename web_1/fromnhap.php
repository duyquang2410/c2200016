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
                                <form action="luu.php" method="post" class="user">
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
                                    
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Đăng Ký Tài Khoản
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.php">Quên mật khẩu?</a>
                                </div>
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
