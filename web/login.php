<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Đăng Nhập</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="ketnoi/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fc;
        }

        .container {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 40px;
        }

        .card-title {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            color: #333;
        }

        .form-control {
            border-radius: 20px;
        }

        .btn-primary {
            background-color: #4e73df;
            border-color: #4e73df;
            border-radius: 20px;
            padding: 12px 30px;
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #2e59d9;
            border-color: #2653d4;
        }

        .small {
            color: #6e707e;
        }

        .small:hover {
            color: #5a5c69;
        }

        .register-link {
            text-align: center;
        }

        .register-link a {
            color: #4e73df;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>

</head>



<body>

    <div class="container">

        <div class="col-lg-6">

            <div class="card o-hidden">
                <div class="card-body">
                    <div class="text-center">
                        <h1 class="h4 card-title">Đăng Nhập</h1>
                    </div>
                    <form action="log1.php" method="post" class="user">
                    <div class="form-group">
    <input type="text" class="form-control form-control-user" id="exampleInputUsername"
           aria-describedby="usernameHelp" placeholder="Nhập Tên" name="name">
</div>

    <div class="form-group">
        <input type="password" class="form-control form-control-user" id="exampleInputPassword"
               placeholder="Nhập Mật Khẩu" name="password">
    </div>
    <div class="form-group">
        <div class="custom-control custom-checkbox small">
            <input type="checkbox" class="custom-control-input" id="customCheck" name="remember">
            <label class="custom-control-label" for="customCheck">Nhớ Mật Khẩu</label>
        </div>
    </div>
    <button class="btn btn-primary btn-user btn-block" type="submit">Đăng Nhập</button>
</form>

                    <hr>
                    
                    <div class="text-center register-link">
                        <a href="fromnhap.php">Tạo Tài Khoản Mới!</a>
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
