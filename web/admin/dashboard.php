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
  require 'connect.php';
?>

<?php include "head.php"; ?>

<body class="g-sidenav-show  bg-gray-200">

<?php
    $active = 'db'; 
    require 'aside.php';
  ?>

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
		
		<!-- <div class="position-absolute w-100 min-height-400 top-0" style="background-image: url('https://media-cdn-v2.laodong.vn/storage/newsportal/2022/9/21/1095693/Screen-Shot-2022-09-.jpg?w=660'); background-position-y: 100%;">
    	<span class="mask bg-primary opacity-5"></span>
  	</div> -->


		<div class="container-fluid py-1 px-3">
				<!-- Ten page -->
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Dashboard</h6>
        </nav>
				<!-- search -->
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
              <label class="form-label">Type here...</label>
              <input type="text" class="form-control">
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
					<li class="nav-item d-flex align-items-center mb-4 me-4">
              <div class="icon icon-shape text-center rounded-circle">
              <img src="../assets/img/staff_img/<?php echo $_SESSION["avt"]; ?>" class="rounded-circle avatar avatar-xl">
              </div>
            </li>
            <li class="nav-item d-flex align-items-center mt-sm-1 ms-3">
             <nav class=" mt-sm-1" aria-label="breadcrumb">   
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
    <!-- End Navbar -->


    <div class="container-fluid py-4">
      <div class="row">
        <!-- Tong doanh thu trong thang -->
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <?php
              $thang = date('m');
              $nam = date('Y');
              // blackbox ai
              $sql = "SELECT 
                          SUM(HD_TONGTIEN) AS TONG,
                          SUM(CASE WHEN MONTH(HD_NGAYLAP) = MONTH(CURRENT_DATE) THEN HD_TONGTIEN ELSE 0 END) AS doanh_thu_thang_hien_tai,
                          SUM(CASE WHEN MONTH(HD_NGAYLAP) = MONTH(DATE_SUB(CURRENT_DATE, INTERVAL 1 MONTH)) THEN HD_TONGTIEN ELSE 0 END) AS doanh_thu_thang_truoc
                      FROM hoa_don
                      WHERE 
                          MONTH(HD_NGAYLAP) IN (MONTH(CURRENT_DATE), MONTH(DATE_SUB(CURRENT_DATE, INTERVAL 1 MONTH))) AND 
                          YEAR(HD_NGAYLAP) = YEAR(CURRENT_DATE) AND 
                          TT_MA = 4;";
              $result = $conn->query($sql);
              $row = mysqli_fetch_assoc($result);
              $tong = $row["TONG"];
              if($row["doanh_thu_thang_hien_tai"] != null){
                $tongdoanhthu = $row["doanh_thu_thang_hien_tai"];
                $dt_thangtruoc = $row["doanh_thu_thang_truoc"];
              } else{
                $tongdoanhthu = 0;
                $dt_thangtruoc = 0;
              }
            ?>
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-light text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">price_change</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-success text-uppercase fw-bold">Tổng doanh thu</p>
                <h4 class="mb-0"><?php echo number_format($tong); ?> VND</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0">
                <span class="text-success text-sm font-weight-bolder">+<?php echo number_format($tongdoanhthu);  ?> VND</span> 
                trong tháng
                <span class="text-success font-weight-bolder"><?php echo $thang;  ?></span> 
                
              </p>
            <?php
              $ty_le_tang_giam = round(($dt_thangtruoc / $tongdoanhthu) * 100, 2);
              if ($ty_le_tang_giam > 0) {
                echo "<p class=\"mb-0\">
                  <span class=\"text-success text-sm font-weight-bolder\">+{$ty_le_tang_giam}% </span>so với tháng trước
                </p>";
              } else {
                echo "<p class=\"mb-0\">
                  <span class=\"text-danger text-sm font-weight-bolder\">{$ty_le_tang_giam}% </span>so với tháng trước
                </p>";
              }
              ?>
              <!-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than last week</p> -->
            </div>
          </div>
        </div>

        <!-- Tổng số đơn hàng trong tháng -->
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
          <?php
            $sql = "select count(*) as sohd, count(case when month(HD_NGAYLAP) = month(sysdate()) then 1 end) as trongthang from hoa_don";
            $rs = $conn->query($sql);
            $row = mysqli_fetch_assoc($rs);
            if ($row["sohd"] != null){
                $message = "1";
                $tongsohd = $row["sohd"];
                $dat_trong_thang = $row["trongthang"];
            }else {
                $tongsohd = 0;
                $dat_trong_thang = 0;

            }
            $sql_truoc = "select count(*) as sohd_truoc from hoa_don where month(HD_NGAYLAP) = month(sysdate()) - 1";
            $rs_truoc = $conn->query($sql_truoc);
            $row_truoc = mysqli_fetch_assoc($rs_truoc);
            if ($row_truoc["sohd_truoc"] != null){
                $sohd_truoc = $row_truoc["sohd_truoc"];
            }else {
                $sohd_truoc = 0;
            }

            ?>
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-danger shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">receipt_long</i>
              </div>
              <div class="text-end pt-1">
              <p class="text-sm mb-0 text-success text-uppercase fw-bold">Tổng đơn hàng</p>
                <h4 class="mb-0"><?php echo $tongsohd ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0">
                <span class="text-success text-sm font-weight-bolder">+<?php echo $dat_trong_thang  ?></span> trong tháng
              </p>
              <?php
                $ty_le_tang_giam = round(($dat_trong_thang / $sohd_truoc) * 100, 2);
                if ($ty_le_tang_giam > 0) {
                  echo "<p class=\"mb-0\">
                    <span class=\"text-success text-sm font-weight-bolder\">+{$ty_le_tang_giam}% </span>so với tháng trước
                  </p>";
                } else {
                  echo "<p class=\"mb-0\">
                    <span class=\"text-danger text-sm font-weight-bolder\">{$ty_le_tang_giam}% </span>so với tháng trước
                  </p>";
                }
              ?>
            </div>
          </div>
        </div>

        <!-- Tổng nhân viên -->
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <?php
              $sql_nv = "select count(NV_MA) as countnv, count(case when month(NV_NGAYTUYEN) = month(sysdate()) then 1 end) as trongthang from nhan_vien";
              $rs_nv = $conn->query($sql_nv);
              if ($rs_nv->num_rows > 0){
                $row_nv = mysqli_fetch_assoc($rs_nv);
                $countnv = $row_nv["countnv"];
                $tuyen_trong_thang = $row_nv["trongthang"];
              } else {
                $countnv = 0;
                $tuyen_trong_thang = 0;
              }

              $sql_truoc = "select count(*) as tnv_truoc from nhan_vien where month(NV_NGAYTUYEN) = month(sysdate()) - 1";
              $rs_truoc = $conn->query($sql_truoc);
              $row_truoc = mysqli_fetch_assoc($rs_truoc);
              if ($row_truoc["tnv_truoc"] != null){
                  $tongnv_truoc = $row_truoc["tnv_truoc"];
              }else {
                  $tongnv_truoc = 0;
              }

            ?>
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">group</i>
              </div>
              <div class="text-end pt-1">
              <p class="text-sm mb-0 text-success text-uppercase fw-bold">Tổng nhân viên</p>
                <h4 class="mb-0"><?php echo $countnv ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">+<?php echo $tuyen_trong_thang ?></span> trong tháng</p>
              <?php
                $ty_le_tang_giam = round(($countnv / $tongnv_truoc-1) * 100, 2);
                if ($ty_le_tang_giam > 0) {
                  echo "<p class=\"mb-0\">
                    <span class=\"text-success text-sm font-weight-bolder\">+{$ty_le_tang_giam}% </span>so với tháng trước
                  </p>";
                } else {
                  echo "<p class=\"mb-0\">
                    <span class=\"text-danger text-sm font-weight-bolder\">{$ty_le_tang_giam}% </span>so với tháng trước
                  </p>";
                }
              ?>
            
            </div>
          </div>
        </div>

        <!-- tổng khách hàng -->
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <?php
              $sql_kh = "select count(KH_MA) as countkh, count(case when month(KH_NGAYDK) = month(sysdate()) then 1 end) as trongthang from khach_hang";
              $rs_kh = $conn->query($sql_kh);
              if ($rs_kh->num_rows > 0){
                $row_kh = mysqli_fetch_assoc($rs_kh);
                $countkh = $row_kh["countkh"];
                $dk_trong_thang = $row_kh["trongthang"];
              } else {
                $countkh = 0;
                $dk_trong_thang = 0;
              }

              $sql_truoc = "select count(*) as tkh_truoc from khach_hang where month(KH_NGAYDK) = month(sysdate()) - 1";
              $rs_truoc = $conn->query($sql_truoc);
              $row_truoc = mysqli_fetch_assoc($rs_truoc);
              if ($row_truoc["tkh_truoc"] != null){
                  $tongkh_truoc = $row_truoc["tkh_truoc"];
              }else {
                  $tongkh_truoc = 0;
              }            
            ?>
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">groups</i>
              </div>
              <div class="text-end pt-1">
              <p class="text-sm mb-0 text-success text-uppercase fw-bold">Tổng khách hàng</p>
                <h4 class="mb-0"><?php echo $countkh ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+<?php echo $dk_trong_thang ?></span> trong tháng</p>
              <?php
                $ty_le_tang_giam = round(($countkh / $tongkh_truoc-1) * 100, 2);
                if ($ty_le_tang_giam > 0) {
                  echo "<p class=\"mb-0\">
                    <span class=\"text-success text-sm font-weight-bolder\">+{$ty_le_tang_giam}% </span>so với tháng trước
                  </p>";
                } else {
                  echo "<p class=\"mb-0\">
                    <span class=\"text-danger text-sm font-weight-bolder\">{$ty_le_tang_giam}% </span>so với tháng trước
                  </p>";
                }
              ?>
            </div>
          </div>
        </div>
      </div>

      <!-- biểu đồ thống kê chung --> 
      <div class="row mt-4">
        <div class="col-lg-4 col-md-6 mt-4 mb-4">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                <div class="chart">
                  <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h6 class="mb-0 ">Website Views</h6>
              <p class="text-sm ">Last Campaign Performance</p>
              <hr class="dark horizontal">
              <div class="d-flex ">
                <i class="material-icons text-sm my-auto me-1">schedule</i>
                <p class="mb-0 text-sm"> campaign sent 2 days ago </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 mt-4 mb-4">
          <div class="card z-index-2  ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
                <div class="chart">
                  <canvas id="chart-line" class="chart-canvas" height="170"></canvas>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h6 class="mb-0 "> Daily Sales </h6>
              <p class="text-sm "> (<span class="font-weight-bolder">+15%</span>) increase in today sales. </p>
              <hr class="dark horizontal">
              <div class="d-flex ">
                <i class="material-icons text-sm my-auto me-1">schedule</i>
                <p class="mb-0 text-sm"> updated 4 min ago </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mt-4 mb-3">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                <div class="chart">
                  <canvas id="chart-line-tasks" class="chart-canvas" height="170"></canvas>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h6 class="mb-0 ">Completed Tasks</h6>
              <p class="text-sm ">Last Campaign Performance</p>
              <hr class="dark horizontal">
              <div class="d-flex ">
                <i class="material-icons text-sm my-auto me-1">schedule</i>
                <p class="mb-0 text-sm">just updated</p>
              </div>
            </div>
          </div>
        </div>
      </div>


      
      <div class="row mb-4">
        <!-- Thống kê đơn hàng theo loại -->
        <div class="col-lg-6 col-md-6 mb-md-0 mb-4">
          <div class="card">
          <?php
              $sql = "select sp.sp_ma as id, sp.sp_ten as ten, sp.SP_HINHANH as anh, sum(ct.cthd_slb) as so_ban, count(distinct ct.hd_stt) as so_hd, sp.SP_DONGIA as dongia
                      from san_pham sp
                      join chi_tiet_hd ct on sp.sp_ma = ct.sp_ma
                      group by sp.sp_ma, sp.sp_ten
                      order by so_ban desc
                      limit 4";

              $result = $conn->query($sql);
              $row1 = $result->fetch_assoc();
              $row2 = $result->fetch_assoc();
              $row3 = $result->fetch_assoc();
              $row4 = $result->fetch_assoc();


              $top1_id = $row1["id"];
              $top1_ten = $row1["ten"];
              $top1_soban = $row1["so_ban"];
              $top1_anh = $row1["anh"];
              $top1_hd = $row1["so_hd"];
              $top1_gia = $row1["dongia"];

              $top2_id = $row2["id"];
              $top2_ten = $row2["ten"];
              $top2_soban = $row2["so_ban"];
              $top2_anh = $row2["anh"];
              $top2_hd = $row2["so_hd"];
              $top2_gia = $row2["dongia"];

              // $top3_id = $row3["id"];
              // $top3_ten = $row3["ten"];
              // $top3_soban = $row3["so_ban"];
              // $top3_anh = $row3["anh"];
              // $top3_hd = $row3["so_hd"];
              // $top3_gia = $row3["dongia"];

              // $top4_id = $row4["id"];
              // $top4_ten = $row4["ten"];
              // $top4_soban = $row4["so_ban"];
              // $top4_anh = $row4["anh"];
              // $top4_hd = $row4["so_hd"];
              // $top4_gia = $row4["dongia"];
            ?>
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-lg-5 col-6">
                  <h6>Sản phẩm bán chạy</h6>
                </div>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7">Sản phẩm</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Đã bán</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Đơn giá</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- top 1 -->
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1 ">
                          <div>
                            <img src="../assets/img/product_img/<?php echo $top1_anh; ?>" class="avatar avatar-xl me-2" alt="productImg">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?php echo $top1_ten; ?></h6>
                            <p class='text-xs text-secondary mb-0'>Số hóa đơn: <?php echo $top2_hd; ?></p>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle my-4">
                        <span class="text-xs font-weight-bold"> <?php echo $top1_soban; ?></span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-xs font-weight-bold"> <?php echo number_format($top1_gia); ?> VND</span>
                      </td>
                      <td class="align-middle">
                        <div class="d-flex">
                          <img src="../assets/img/top1.jpg" style="height:40px; margin-right: 5px;" alt="">
                          <a href="../product.php?id=<?php echo $top1_id; ?>"><button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button></a>
                        </div>
                      </td>
                    </tr>
                    <!-- top 2 -->
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1 ">
                          <div>
                            <img src="../assets/img/product_img/<?php echo $top2_anh; ?>" class="avatar avatar-xl me-2" alt="productImg">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?php echo $top2_ten; ?></h6>
                            <p class='text-xs text-secondary mb-0'>Số hóa đơn: <?php echo $top2_hd; ?></p>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle my-4">
                        <span class="text-xs font-weight-bold"> <?php echo $top2_soban; ?></span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-xs font-weight-bold"> <?php echo number_format($top2_gia); ?> VND</span>
                      </td>
                      <td class="align-middle">
                        <div class="d-flex">
                          <img src="../assets/img/top2.jpg" style="height:40px; margin-right: 5px;" alt="">
                          <a href="../product.php?id=<?php echo $top2_id; ?>"><button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button></a>
                        </div>
                      </td>
                    </tr>
                    <!-- top 3 -->
                    <!-- <tr>
                      <td>
                        <div class="d-flex px-2 py-1 ">
                          <div>
                            <img src="../assets/img/product_img/<?php echo $top3_anh; ?>" class="avatar avatar-xl me-2" alt="productImg">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?php echo $top3_ten; ?></h6>
                            <p class='text-xs text-secondary mb-0'>Số hóa đơn: <?php echo $top3_hd; ?></p>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle my-4">
                        <span class="text-xs font-weight-bold"> <?php echo $top3_soban; ?></span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-xs font-weight-bold"> <?php echo number_format($top3_gia); ?> VND</span>
                      </td>
                      <td class="align-middle">
                        <div class="d-flex">
                          <img src="../assets/img/top3.jpg" style="height:40px; margin-right: 5px;" alt="">
                          <a href="../product.php?id=<?php echo $top3_id; ?>"><button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button></a>
                        </div>
                      </td>
                    </tr> -->

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>


        <!-- Top sản phẩm bán chạy -->
        <div class="col-lg-6 col-md-6">
          <div class="card h-100">
            <div class="card-header pb-0">
              <h6>Đơn hàng theo danh mục</h6>
            </div>
            
            <div class="card-body p-3">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                <?php
                  $sql = "SELECT l.DM_TEN, SUM(ct.CTHD_SLB * sp.SP_DONGIA) as tongdoanhthu, COUNT(ct.CTHD_SLB) as soluongban, l.DM_AVATAR as anhdm
                            FROM chi_tiet_hd ct
                            INNER JOIN san_pham sp ON sp.SP_MA = ct.SP_MA
                            INNER JOIN danh_muc l ON l.DM_MA = sp.DM_MA
                            GROUP BY l.DM_TEN;";
                  $result = $conn->query($sql);
                  if($result->num_rows >0){
                    $result_all = $result->fetch_all(MYSQLI_ASSOC);
                    foreach($result_all as $row){
                ?>
                  <tbody>
                    <tr>
                      <td class="col-3">
                        <div class="d-flex px-2 py-1 align-items-center">
                          <div>
                          <?php
                            if($row["anhdm"]==null){
                              $file = "default.jpg";
                            } else {
                              $file = $row["anhdm"];
                            } 
                            $avatar_url = "../assets/img/cate_img/" . $file;
                            echo "<img src='{$avatar_url}' class='avatar avatar-xl me-3' alt='category'>";
                          ?>                     
                          </div>
                          <div class="ms-4">
                            <p class="text-xs font-weight-bold mb-0">Loại:</p>
                            <h6 class="text-sm mb-0 text-uppercase"><?php echo $row["DM_TEN"]; ?></h6>
                          </div>
                        </div>
                      </td>
                      <td class="col-1">
                        <div class="text-center">
                          <p class="text-xs font-weight-bold mb-0">Đã bán:</p>
                          <h6 class="text-sm mb-0"><?php echo $row["soluongban"] . " đơn" ;?></h6>
                        </div>
                      </td>
                      <td class="col-2">
                        <div class="text-center">
                          <p class="text-xs font-weight-bold mb-0">Tổng thu:</p>
                          <h6 class="text-sm mb-0"><?php echo number_format($row["tongdoanhthu"]); ?>đ</h6>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                  <?php 
                    }
                  }
                  ?>
                </table>
            </div>
          </div>
          
        </div>
      </div>
			
      <footer class="footer py-4  ">
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
    </div>
  </main>

  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["M", "T", "W", "T", "F", "S", "S"],
        datasets: [{
          label: "Sales",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "rgba(255, 255, 255, .8)",
          data: [50, 20, 10, 22, 50, 10, 40],
          maxBarThickness: 6
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
              color: "#fff"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(255, 255, 255, .8)",
          borderColor: "rgba(255, 255, 255, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: [50, 40, 300, 320, 500, 350, 200, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });

    var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

    new Chart(ctx3, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(255, 255, 255, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#f8f9fa',
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
  <?php 
    $conn->close();
  ?>
</body>

</html>