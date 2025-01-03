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
    $active = 'nv'; 
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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Chỉnh sửa thông tin nhân viên</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Chỉnh sửa thông tin nhân viên</h6>
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
    <img src="../assets/img/a.jpg" class="rounded-circle avatar avatar-xl">
</div>
            </li>
            <li class="nav-item d-flex align-items-center mt-sm-1 ms-3">
             <nav class=" mt-sm-1" aria-label="breadcrumb">   
                <h7 class="text-maroon text mb-0">Xin chào,</h7>
                <h6 class="font-weight-bolder text-maroon mt-n1"><?php echo $_SESSION["name"]; ?></h6>      
                <a href="log_out.php" class="btn btn-outline-light text-white font-weight-bold px-2 mt-n1 py-1">
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
					$nvid = $_POST["nvid"];

					require 'connect.php';

					$sql = "select Ma_NV, Ten_NV, DiaChi_NV, Sdt_NV, Email_NV, NgaySinh_NV, MatKhau_NV,  Ma_BP from nhanvien where Ma_NV = ".$nvid."";
					$result = $conn->query($sql);
					if($result->num_rows >0 ){
							$row = mysqli_fetch_assoc($result);
							$nvid = $row["Ma_NV"];
							$tkid = $row["Ma_NV"];
							$nvhoten = $row["Ten_NV"];
							$nvadress = $row["DiaChi_NV"];
							$nvsdt = $row["Sdt_NV"];
							$nvemail = $row["Email_NV"];
							
							$nvdate = date("Y-m-d", strtotime($row["NgaySinh_NV"]));
							
							$tkpw = $row["MatKhau_NV"];
							
							$tkvaitro = $row["Ma_BP"];
					}
				?>
        <div class="col-12">
          <div class="card mb-4 border-1">
            <div class="card-header pb-0">
              <h4>Chỉnh sửa thông tin nhân viên có mã <?php echo $nvid; ?> - <?php echo $nvhoten ; ?></h4>
            </div>
            <div class="card-body px-4 pt-0 pb-2">
              <form role="form" method="post" action="update_edit_staffs.php" enctype="multipart/form-data">
								<input type="hidden" name="staff_id" value="<?php echo $nvid; ?>">
                <input type="hidden" name="nv_id" value="<?php echo $tkid; ?>">
                <input type="hidden" name="nv_avt" value="<?php echo $tkavt; ?>">


                <div class="row">
                  <div class="col-md-6">
                    Họ và tên
                    <div class="input-group input-group-outline my-2">
                      <input type="text" name="staff_name" class="form-control" value="<?php echo $nvhoten; ?>">
                    </div>
                  </div>

                  <div class="col-md-4">
                    Chức vụ
                    <div class="input-group input-group-outline my-2">
                      <select  class="form-control" name="staff_vaitro" id="staff_vaitro" >
												<option value="<?php echo $tkvaitro; ?>" selected hidden>
												<?php
                          if($tkvaitro=='1'){
                            ?>Nhân viên bán hàng<?php
                          } else if($tkvaitro=='2'){
                            ?>Quản lý<?php
                          } else if($tkvaitro=='3'){
                            ?> Nhân viên kho <?php
                          } 
                          ?>
												</option>
                      	<?php
                          $sql = "SELECT * FROM bophan";
                          $result = $conn->query($sql);
                          if ($result->num_rows > 0) {
                            $result = $conn->query($sql);
                            $result_all = $result -> fetch_all(MYSQLI_ASSOC);
                            foreach ($result_all as $row) {
                              echo "<option value=" .$row["Ma_BP"]. ">".$row["Ten_BP"]. "</option>";
                            }                          
                          } else {
                            echo "<option value=''>Không có dữ liệu</option>";
                          }
                        ?>
                      </select>
                    </div>
                  </div>

                   
                </div>

                <div class="row">
                  <div class="col-md-4">
                    Email
                    <div class="input-group input-group-outline my-2">
                    <input  type="email" name="staff_email" id="staff_email" class="form-control" value="<?php echo $nvemail; ?>">
                    </div>
                  </div>
                  <div class="col-md-4">
                    Số điện thoại
                    <div class="input-group input-group-outline my-2">
                    <input  type="text" name="staff_phone" id="staff_phone" class="form-control" value="<?php echo $nvsdt; ?>">
                    </div>
                  </div>
                  <div class="col-md-4">
                    Ngày sinh
                    <div class="input-group input-group-outline my-2">
                    <input  type="date" name="staff_birth" id="staff_birth" class="form-control" value="<?php echo $nvdate; ?>">
                    </div>
                  </div>
                </div>

                <div class="row">
                  
                  <div class="col-md-4">
                    Mật khẩu
                    <div class="input-group input-group-outline my-2">
                      <input  type="password" name="staff_pass" id="pw" class="form-control form-control-lg" value="<?php echo $tkpw; ?>">
                    </div>
                  </div>
                  <div class="col-md-4">
                    Nhập lại mật khẩu
                    <div class="input-group input-group-outline my-2">
                      <input  type="password" name="staff_repass" id="rpw" class="form-control form-control-lg" value="<?php echo $tkpw; ?>">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    Địa chỉ
                    <div class="input-group input-group-outline my-2">
                      <input required type="text" name="staff_address" class="form-control" value="<?php echo $nvadress ?>">
                    </div>
                  </div>
                </div>             
                    
								<div class="col-12 card-header pb-2 d-flex align-items-center">
                      <div class="mb-3 px-3 col-3"></div>
                      
                      <div class="mb-3 px-3 col-3">
                          
                          <script>
                            var input = document.getElementById("staffImg");
                            var preview = document.getElementById("preview");
                            var old_img = document.getElementById("old_img");

                            input.addEventListener("change", function() {
                              preview.innerHTML = ""; // clear previous preview
                              old_img.innerHTML = "";
                              var files = this.files;
                              for (var i = 0; i < files.length; i++) {
                                var file = files[i];
                                if (!file.type.startsWith("image/")){ continue } // skip non-image files
                                var reader = new FileReader();
                                reader.onload = function(e) {
                                  var img = document.createElement("img");
                                  img.src = e.target.result;
                                  img.width = 200; // set width for preview images
                                  img.className = "rounded-circle avatar avatar-xxl ms-4";
                                  preview.appendChild(img); // append image to preview div
                                };
                                reader.readAsDataURL(file); // read file as data url
                              }
                            });
                          </script>
                      </div>
                      <div class="mb-3 px-3 col-3"></div>
                    </div>

                    <!-- <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="rememberMe">
                      <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div> -->
                    <div class="col-12 mt-n4 card-header pb-2 d-flex align-items-center">                                                            
                      <div class="col-12 text-center px-3">
                        <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Cập nhật</button>
                      </div>
                    </div>
                </form>
            </div>
          </div>
        </div> 
      </div>

    <!-- End Navbar -->
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
