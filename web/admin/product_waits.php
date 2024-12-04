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

<body class="g-sidenav-show  bg-gray-200">

<?php
    $active = 'dh'; 
    require 'aside.php';
  ?>

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
		
		<!-- <div class="position-absolute w-100 min-height-400 top-0" style="background-image: url('https://media-cdn-v2.laodong.vn/storage/newsportal/2022/9/21/1095693/Screen-Shot-2022-09-.jpg?w=660'); background-position-y: 100%;">
    	<span class="mask bg-primary opacity-5"></span>
  	</div> -->


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
    <!-- End Navbar -->
		
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
                  <div class="col-6	 mt-2 font-weight-bold d-flex align-items-center">
                    Danh sách đơn hàng
                  </div>

                  <div class="px-2 mt-n3 pt-0 col-2 font-weight-bold body">
                    <br>
										<div class="input-group input-group-outline">
											<select class="form-control form-control-md" name="source" id="source">
                      <option value="" selected disabled hidden>- Nguồn hàng -</option>
                      <?php
                        $sql = "SELECT * FROM nhacungcap";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                          $result = $conn->query($sql);
                          $result_all = $result -> fetch_all(MYSQLI_ASSOC);
                          foreach ($result_all as $row) {
                            echo "<option value=" .$row["Ma_NCC"]. ">".$row["Ten_NCC"]. "</option>";
                          }                          
                        } else {
                          echo "<option value=''>Không có dữ liệu</option>";
                        }
                      ?>
                    </select>
										</div>
                  </div>
									<div class="px-2 mt-n3 pt-0 col-3 font-weight-bold body">
                    <br>
										<div class="input-group input-group-outline">
											<select class="form-control form-control-md" name="source" id="source">
                      <option value="" selected disabled hidden>- Trạng thái đơn -</option>
                      <?php
                        $sql = "SELECT * FROM trangthai";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                          $result = $conn->query($sql);
                          $result_all = $result -> fetch_all(MYSQLI_ASSOC);
                          foreach ($result_all as $row) {
                            echo "<option value=" .$row["TT_MA"]. ">".$row["TT_TEN"]. "</option>";
                          }                          
                        } else {
                          echo "<option value=''>Không có dữ liệu</option>";
                        }
                      ?>
                    </select>
										</div>
                  </div>
                  <div class="px-0 mt-1 col-0 mt-1 ms-0">
										<button type="submit" class="btn btn btn-primary pt-2 mt-3">
                      Lọc
                    </button>
                  </div>
                </div>
              </form>
							
							<?php
                  $sql = "select * from giaodich where TT_MA BETWEEN 0 AND 2";
                  if(isset($_GET["status"]) && isset($_GET["method"])){
                    $sql = "select * from giaodich where TT_MA = {$_GET["status"]} and PTTT_MA = {$_GET["method"]}";
                  } elseif (isset($_GET["status"]) && !isset($_GET["method"])){
                    $sql = "select * from giaodich where TT_MA = {$_GET["status"]}";
                  } elseif (!isset($_GET["status"]) && isset($_GET["method"])){
                    $sql = "select * from giaodich where TT_MA BETWEEN 0 AND 2 and PTTT_MA = {$_GET["method"]}";
                  } else {
                    $sql = "select * from giaodich where TT_MA BETWEEN 0 AND 2";
                  }
                  $sql .= " order by Ma_GD  desc";
                ?>            

<div class="card-body px-4 pt-0 pb-2">
    <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">Mã đơn</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Khách hàng</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nhân viên tiếp nhận</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tổng tiền</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phương thức</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ngày đặt</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Trạng thái</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hành động</th>
                </tr>
            </thead>
            <tbody>
            <?php
$sql = "SELECT gd.Ma_GD, kh.HoTen_KH, kh.NgaySinh_KH, gd.Ma_NV, ct.TONG_THANH_TOAN, pt.PTTT_TEN, gd.NGAY_LAP, tt.TT_TEN, tt.TT_MA,kh.Sdt_KH
FROM giaodich gd
JOIN khachhang kh ON gd.Ma_KH = kh.Ma_KH
JOIN (
    SELECT Ma_GD, (TONG_THANH_TOAN) AS TONG_THANH_TOAN
    FROM chitiethoadon
    GROUP BY Ma_GD
) ct ON ct.Ma_GD = gd.Ma_GD
JOIN pt_thanhtoan pt ON pt.PTTT_MA = gd.PTTT_MA
JOIN trangthai tt ON tt.TT_MA = gd.TT_MA
WHERE gd.TT_MA BETWEEN 0 AND 2
ORDER BY gd.Ma_GD DESC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ?>
        <tr class="height-100">
            <td>
                <p class="text-xs font-weight-bold mb-0"><?php echo $row["Ma_GD"]; ?></p>
            </td>
            <td class="w-30">
                <div class="d-flex flex-column justify-content-center">
                    <h6 class="mb-0 text-md"><?php echo $row["HoTen_KH"]; ?></h6>
                    <p class='text-xs text-secondary mb-0'><?php echo "Ngày sinh: " . date('d/m/Y', strtotime($row["NgaySinh_KH"])); ?></p>
                </div>
            </td>
            <td>
                <?php
                // Kiểm tra sự tồn tại của Ma_NV trước khi truy vấn
                if (isset($row["Ma_NV"])) {
                    $nvid = $row["Ma_NV"];
                    $sql_nv = "SELECT Ten_NV FROM nhanvien WHERE Ma_NV = " . $nvid;
                    $result_nv = $conn->query($sql_nv);
                    if ($result_nv->num_rows > 0) {
                        $row_nv = $result_nv->fetch_assoc();
                        $tennv = $row_nv["Ten_NV"];
                    } else {
                        $tennv = "Chưa được duyệt!";
                    }
                } else {
                    $tennv = "Chưa được duyệt!";
                }
                ?>
                <p class="text-xs font-weight-bold mb-0"><?php echo $tennv; ?></p>
            </td>
            <td>
                <p class="text-s font-weight-bold mb-0"><?php echo number_format($row["TONG_THANH_TOAN"], 0) . " VNĐ"; ?></p>
            </td>
            <td>
                <p class="text-xs font-weight-bold mb-0"><?php echo $row["PTTT_TEN"]; ?></p>
            </td>
            <td>
                <p class="text-xs font-weight-bold mb-0"><?php echo date('d/m/Y', strtotime($row["NGAY_LAP"])); ?></p>
            </td>
            <td class="align-middle text-center">
                <?php
                // Kiểm tra sự tồn tại của TT_MA trước khi truy vấn
                if (isset($row["TT_MA"])) {
                    ?>
                    <button class="btn text-xs font-weight-bold mb-0 <?php
                        echo ($row["TT_MA"] == 1) ? "btn-warning" : (
                            ($row["TT_MA"] == 2) ? "btn-success" : (
                                ($row["TT_MA"] == 0) ? "btn-danger" : "text-success"
                            )
                        ); ?>">
                        <?php echo $row["TT_TEN"]; ?>
                    </button>
                <?php } else { ?>
                    <span class="text-danger">Không có đủ dữ liệu trạng thái mã</span>
                <?php } ?>
            </td>
            <td class="align-middle">
                <form action="detail_pdwait.php" method="post">
                    <input type="hidden" name="mahd" value="<?php echo $row["Ma_GD"]; ?>">
                    <input type="hidden" name="tenkh" value="<?php echo $row["HoTen_KH"]; ?>">
                    <input type="hidden" name="ngaysinh" value="<?php echo isset($row["NgaySinh_KH"]) ? $row["NgaySinh_KH"] : ''; ?>">
                    <input type="hidden" name="sdtkh" value="<?php echo isset($row["Sdt_KH"]) ? $row["Sdt_KH"] : ''; ?>">
                    <input type="hidden" name="emailkh" value="<?php echo isset($row["Email_KH"]) ? $row["Email_KH"] : ''; ?>">
                    <input type="hidden" name="tongtien" value="<?php echo isset($row["TONG_THANH_TOAN"]) ? $row["TONG_THANH_TOAN"] : ''; ?>">
                    <input type="hidden" name="ngaydat" value="<?php echo date('d/m/Y', strtotime($row["NGAY_LAP"])); ?>">
                    <input type="hidden" name="trangthai" value="<?php echo isset($row["TT_MA"]) ? $row["TT_MA"] : ''; ?>">
                    <input type="hidden" name="phuongthuc" value="<?php echo isset($row["PTTT_TEN"]) ? $row["PTTT_TEN"] : ''; ?>">
                    <input type="hidden" name="tentrangthai" value="<?php echo isset($row["TT_TEN"]) ? $row["TT_TEN"] : ''; ?>">
                    <button type="submit" class="mt-4 btn btn-link text-primary font-weight-bold text-xs">
                        Xem chi tiết ->
                    </button>
                </form>
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



      
    <hr class="horizontal dark my-1">
  	<div class="card-body pt-sm-3 pt-0 overflow-auto">
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
		<style>
    .overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 99999;
      background: rgba(0, 0, 0, 0.5);
      display: none;
    }

    .my-box {
      width: 50%;
      height: 50%;
      background-color: #fff;
      border-radius: 10px;
      position: absolute;
      padding: 15px;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

  </style>
		<script>

    const productButtons = document.querySelectorAll('.addmore-button');

    productButtons.forEach(button => {
      button.addEventListener('click', showProductDetails);
    });

    function showProductDetails(event) {
      // Lấy ID của sản phẩm được click
      const productId = event.target.getAttribute('data-id');
      const product_img = event.target.getAttribute('data-img');
      const product_name = event.target.getAttribute('data-name');
      
      
      document.getElementById("temp_id").value = productId;

      // Hiển thị overlay
      const overlay = document.querySelector('.overlay');
      overlay.style.display = 'block';

      // Hiển thị thông tin chi tiết của sản phẩm
      const productName = document.querySelector('.product-name');
      productName.innerHTML = '<h6>' + product_name + '</h6>';
      const productImg = document.querySelector('.product-image');
      productImg.innerHTML = '<img src="' + product_img + '" class="avatar avatar-xxl" alt="product">';
      
    }


    //Tắt overlay
    const overlay = document.getElementById("overlay");
    overlay.addEventListener("click", function(event) {
      if (event.target === overlay) {
        overlay.style.display = "none";
      }
    });

  </script>
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
