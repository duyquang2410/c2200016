<!--
=========================================================
* Material Dashboard 2 - v3.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<?php
  session_start();
?>

<?php include "head.php"; ?>

<body class="bg-gray-200">

<?php
    $active = 'kh'; 
    require 'aside.php';
?>

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
        <div class="container-fluid py-1 px-3">
            <!-- Ten page -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Khách hàng</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">Khách hàng</h6>
            </nav>
            <!-- search -->
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <div class="input-group input-group-outline">
                        <label class="form-label">Type here...</label>
                        <input type="text" class="form-control">
                    </div>
                </div>

                <ul class="navbar-nav justify-content-end">
                    <li class="nav-item d-flex align-items-center mb-4 me-4">
                    </li>
                    <li class="nav-item d-flex align-items-center mt-sm-1 ms-3">
                        <nav class="mt-sm-1" aria-label="breadcrumb">
                            <h7 class="text-maroon text mb-0">Xin chào,</h7>
                            <h6 class="font-weight-bolder text-maroon mt-n1"><?php echo $_SESSION["name"]; ?></h6>
                            <a href="log_out.php" class="btn btn-outline-light text-red bg-gradient-light font-weight-bold px-2 mt-n1 py-1">
                  Đăng xuất
                  <i class="fas fa-sign-out-alt "></i>
                </a>

                        </nav>
                    </li>
                    <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line bg-white"></i>
                                <i class="sidenav-toggler-line bg-white"></i>
                                <i class="sidenav-toggler-line bg-white"></i>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid py-4">
        <div class="row">
            <?php
                require 'connect.php';
            ?>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="row px-2 bg-dark-light bg-gray">
                        <form action="#" method="get">
                            <div class="px-3 col-12 pb-2 d-flex align-items-center">
                                <div class="col-4 mt-2 font-weight-bold d-flex align-items-center text-uppercase">
                                    Danh sách khách hàng
                                </div>
                                <div class="px-2 mt-n3 col-2 font-weight-bold">
                                    <br>

                                </div>
                                <div class="px-2 mt-n3 col-1 font-weight-bold"></div>
                                <div class="col-5 mt-2 d-flex align-items-center justify-content-end">
                                    <div class="input-group input-group-outline w-70 me-3">
                                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                                        <input type="text" name="timkiem" class="form-control" placeholder="Nhập tên nhân viên cần tìm..">
                                    </div>
                                    <button type="submit" class="btn btn-primary text-white font-weight-bold text-md ms-0 mt-3">
                                        Tìm
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php
            $sql = "SELECT * FROM khachhang";
            if(isset($_GET["timkiem"])){
                $search = $_GET["timkiem"];
                if ($search != null) {
                    $sql = "SELECT * FROM khachhang WHERE HoTen_KH LIKE '%".$search."%';";
                }
            }
        ?>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body px-4 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">Mã</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Họ và tên</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Số điện thoại</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            $result_all = $result->fetch_all(MYSQLI_ASSOC);
                                            foreach ($result_all as $row) {
                                                ?>
                                                <tr class="height-100">
                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0"><?php echo $row["Ma_KH"]; ?></p>
                                                    </td>
                                                    <td class="w-30">
                                                        <div class="d-flex px-2 py-1">
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <h6 class="mb-0 text-md"><?php echo $row["HoTen_KH"]; ?></h6>
                                                                <p class='text-xs text-secondary mb-0'>Ngày sinh: <?php echo date('d/m/Y', strtotime($row["NgaySinh_KH"])); ?></p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-sm font-weight-bold mb-0"><?php echo $row["Sdt_KH"]; ?></p>
                                                    </td>
                                                    <td>
                                                        <p class="text-sm font-weight-bold mb-0"><?php echo $row["Email_KH"]; ?></p>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer py-4">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6 mb-lg-0 mb-4">
                    <div class="copyright text-center text-sm text-muted text-lg-start">
                        © <script>
                            document.write(new Date().getFullYear())
                        </script>,
                        made with <i class="fa fa-heart"></i> by
                        <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                        for a better web.
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</main>

<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
<script src="../assets/js/plugins/chartjs.min.js"></script>
<script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>

<?php 
    $conn->close();
?>
</body>

</html>
