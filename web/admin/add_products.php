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
    $active = 'tsp'; 
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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Thêm sản phẩm</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Thêm sản phẩm</h6>
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
     
        <div class="col-12">
          <div class="card mb-4 border-1">
            <div class="card-header pb-0 mb-2">
              <h4>Thêm sản phẩm mới</h4>
            </div>
            <div class="card-body px-4 pt-0 pb-2 mb-3">
              <form role="form" method="post" action="upload_products.php" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-4">
                    Danh mục sản phẩm
                    <div class="input-group input-group-outline my-2">
                      <select required class="form-control" name="types" id="types" >
                      <option value="" selected disabled hidden>-Chọn-</option>
                      <?php
                            $sql = "SELECT * FROM danhmuc";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                              $result = $conn->query($sql);
                              $result_all = $result -> fetch_all(MYSQLI_ASSOC);
                              foreach ($result_all as $row) {
                                echo "<option value=" .$row["Ma_DM"]. ">".$row["Ten_DM"]. "</option>";
                              }                          
                            } else {
                              echo "<option value=''>Không có dữ liệu</option>";
                            }
                          ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-4">
                    Nguồn hàng
                    <div class="input-group input-group-outline my-2">
                      <select required class="form-control" name="source" id="source" >
                      <option value="" selected disabled hidden>-Chọn-</option>
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
                  

                  <div class="col-md-4">
                    Số lượng
                    <div class="input-group input-group-outline my-2">
                    <input required min="0" max="10000" step="1" type="number" name="pd_quantity" class="form-control" placeholder="Nhập số lượng sản phẩm">
                    </div>
                  </div>
                </div>
                <div class="row">
    <div class="col-md-4">
        Tên sản phẩm
        <div class="input-group input-group-outline my-2">
            <input required type="text" name="pd_name" class="form-control" placeholder="Nhập tên sản phẩm">
        </div>
    </div>
    <div class="col-md-4">
        Giá bán (VNĐ)
        <div class="input-group input-group-outline my-2">
            <input required min="0" max="10000000000"  type="number" name="pd_price" class="form-control" placeholder="Nhập giá bán sản phẩm">
        </div>
    </div>
    <div class="col-md-4">
        Trọng Lượng
        <div class="input-group input-group-outline my-2">
            <input required type="text" name="pd_tl" class="form-control" placeholder="Nhập trọng lượng sản phẩm">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        Mô tả
        <div class="input-group input-group-outline my-2">
            <input required row="20" type="text" name="mota" style="height: 100px;" class="form-control" placeholder="Nhập mô tả sản phẩm">
        </div>
    </div>
    <div class="col-md-4">
        Chất liệu
        <div class="input-group input-group-outline my-2">
            <input required type="text" name="pd_cl" class="form-control" placeholder="Nhập chất liệu sản phẩm">
        </div>
    </div>
</div>

                <div class="col-12 mt-n4 card-header pb-2 d-flex align-items-center">                                        
                  <div class="mb-3 px-3 col-3"></div>
                    <div class="mb-3 px-3 col-3">
                      Tải ảnh sản phẩm:
                      <br>
                      <input class="mt-3" type="file" name="productImg" id="productImg" accept="image/*">
                    </div>
                    <div class="mb-3 px-3 col-3">
                        <div id="preview"></div>
                          <script>
                            var input = document.getElementById("productImg");
                            var preview = document.getElementById("preview");

                            input.addEventListener("change", function() {
                              preview.innerHTML = ""; // clear previous preview
                              var files = this.files;
                              for (var i = 0; i < files.length; i++) {
                                var file = files[i];
                                if (!file.type.startsWith("image/")){ continue } // skip non-image files
                                var reader = new FileReader();
                                reader.onload = function(e) {
                                  var img = document.createElement("img");
                                  img.src = e.target.result;
                                  img.width = 1000; // set width for preview images
                                  img.className = "avatar avatar-xxl me-3";
                                  preview.appendChild(img); // append image to preview div
                                };
                                reader.readAsDataURL(file); // read file as data url
                              }
                            });
                          </script>
                      </div>
                    </div>

                    <!-- <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="rememberMe">
                      <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div> -->
                    <div class="col-12 mt-n4 card-header pb-2 d-flex align-items-center">                                                            
                      <div class="col-12 text-center px-3">
                        <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Thêm</button>
                      </div>
                    </div>
                </form>
            </div>
          </div>
        </div> 
      </div>

    <!-- End Navbar -->
		<footer class="footer py-4">Ma_DM 
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
