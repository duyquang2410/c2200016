
<!DOCTYPE html>
<html lang="en">

<?php
  session_start();
	require 'connect.php';
?>

<?php include "head.php"; ?>

<body class="g-sidenav-show  bg-gray-200">

<?php
    $active = 'dh'; 
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
    <!-- End Navbar -->
		
		<div class="container-fluid py-4">
      <div class="row">
        <div class="col-lg-9">
          <div class="row ">
            <div class="col-lg-12">
              <div class="card h-100">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-6 d-flex align-items-center">
											<?php $madh = $_POST["mahd"]; ?>
                      <h6 class="mb-0">Chi tiết đơn hàng số <?php echo $madh; ?></h6>
                    </div>
                    <div class="col-6 text-end">
                    </div>
                  </div>
                </div>
                <div class="card-body p-3 pb-0">
                  <div class="row px-4 mt-3">
                    <div class="col-8	">
                            <?php
                                $mahd = $_POST["mahd"];
																$tenkh = $_POST["tenkh"];
																$emailkh = $_POST["emailkh"];
																$sdtkh = $_POST["sdtkh"];
																$tongtien = $_POST["tongtien"];
																$ngaydat = $_POST["ngaydat"];
																$trangthai = $_POST["trangthai"];
																$tentrangthai = $_POST["tentrangthai"];
																$ngaysinh = $_POST["ngaysinh"];
																$phuongthuc = $_POST["phuongthuc"];

																// echo "Mã đơn hàng: ".$mahd."</br>";
																echo "Khách hàng: " .$tenkh. "</br>";
																echo "Số điện thoại: " .$sdtkh. "</br>";
																echo "Phương thức thanh toán: " .$phuongthuc. "</br>";
																echo "Tổng tiền: " . number_format($tongtien, 0) . "đ"."</br>";
                            ?>
                    </div>
                    <div class="col-3 text-end">
                            <?php
                                $style="";
                                $stt="";
                                
                                if ($trangthai==1) $style = "btn-warning";
                                elseif ($trangthai==2) $style = "btn-success";
                                elseif ($trangthai==0) $style = "btn-danger";
                                else $style = "btn-success";
                            ?>
                            <button class="btn text-md font-weight-bold mb-0 <?php echo $style; ?>"><?php echo $tentrangthai; ?></button>
                    </div>
             			</div>
								</div>

								<!-- Hiển thị ds san pham trong hoa don -->
								<div class="card-header pb-2 d-flex align-items-center">
                  <div class="col-3">
                    <h6 class="">Danh sách sản phẩm</h6>
                	</div>
									<div class="col-5 d-flex align-items-center  justify-content-end"></div>
									<div class="col-4 d-flex align-items-center justify-content-end">
    Ngày đặt hàng: <span class="ms-2 text-secondary text-s text-center font-weight-bold"><?php echo $ngaydat ?></span>
</div>


                </div>
 								<div class="table-responsive p-0 mt-3">
                  <table class="table align-items-center mb-0">
									<!-- <thead>
                    <tr class="col-12">
                      <th class="col-1 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mã đơn</th>
                      <th class="col-4 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Sản phẩm</th>                              
                      <th class="col-4 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Đơn giá</th> 
											<th class="col-4 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Số lượng SP</th> 
                      <th class="col-3 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Giá trị đơn hàng</th> 

                    </tr>
                  </thead> -->
                  <?php
$sql = "SELECT * FROM chitiethoadon WHERE Ma_GD = {$mahd}";
$rs = $conn->query($sql);

if ($rs->num_rows > 0) {
    $stt = 1;
    $tongThanhTien = 0; // Khởi tạo biến tổng thành tiền
    while ($row = $rs->fetch_assoc()) {
        $idsp = $row["Ma_SP"];

        // Lấy thông tin sản phẩm từ bảng sanpham
        $sql_sp = "SELECT * FROM sanpham WHERE Ma_SP = '{$idsp}'";
        $rs_sp = $conn->query($sql_sp);
        if ($rs_sp->num_rows > 0) {
            $row_sp = $rs_sp->fetch_assoc();
            $anhsp = $row_sp["HinhAnh_SP"];
            $tensp = $row_sp["Ten_SP"];
        }

        // Lấy thông tin đơn giá từ bảng don_gia
        $sql_dg = "SELECT gia FROM don_gia WHERE Ma_SP = '{$idsp}'";
        $rs_dg = $conn->query($sql_dg);
        if ($rs_dg->num_rows > 0) {
            $row_dg = $rs_dg->fetch_assoc();
            $giasp = $row_dg["gia"];
        }

        // Số lượng và tổng thành tiền của sản phẩm trong chi tiết hóa đơn
        $slsp = $row["SO_LUONG_BAN"];
        $dongia = $giasp ;
        $thanhtien = $dongia* $slsp;
        
        // Cộng vào tổng thành tiền
        $tongThanhTien += $thanhtien;

        // Hiển thị thông tin sản phẩm trong bảng
        ?>
        <tr class="height-100">
            <td>
                <p class="text-s font-weight-bold mb-2 px-2"><?php echo $stt; ?></p>
            </td>
            <td class="w-30">
                <div class="d-flex px-2 py-1">
                    <div>
                        <img src="<?php echo "../" . $anhsp; ?>" class="avatar avatar-xl me-3" alt="user1">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-md"><?php echo $tensp; ?></h6>
                    </div>
                </div>
            </td>
            <td>
                <p class="text-s font-weight-bold mb-0"><?php echo number_format($dongia, 0, '.', ' ') ; ?> VNĐ</p>
            </td>
            <td>
                <p class="text-s font-weight-bold mb-0"><?php echo "Số lượng: " . $slsp; ?></p>
            </td>
            <td>
                <p class="text-s text-success font-weight-bold mb-0"><?php echo number_format($thanhtien, 0, '.', ' ') ; ?> VNĐ</p>
            </td>
        </tr>
        <?php
        $stt++;
    }

    // Hiển thị tổng thành tiền cuối cùng ngoài vòng lặp
    ?>
    <tr>
        <td colspan="4" class="text-end font-weight-bold">Tổng thành tiền:</td>
        <td class="text-s text-success font-weight-bold"><?php echo number_format($tongThanhTien, 0, '.', ' ') ; ?> VNĐ</td>
    </tr>
    <?php
}
?>

                  </table>
                </div>
							</div>
            </div>
        	</div>
        </div>
				<div class="col-3">
            <div class="row">
              <div class="col-12 ">
                <div class="card mb-4">
                  <div class="card-header pb-2 d-flex align-items-center">
                    <div class="col-12">
                      <h6 class="">Thao tác đơn hàng</h6>
                    </div>
                  </div>
                  <div class="card-body px-0 pt-1 pb-2 px-4 py-4">
                    <form action="update_status_bill.php" method="post">
                      <div class="col-12 d-flex align-items-center justify-content-end input-group input-group-outline">
                        <select id="mySelect" onchange="showTextarea()" class="form-control form-control-md" name="status" id="status">
                          <option value="<?php echo $trangthai; ?>" selected hidden><?php echo $tentrangthai; ?></option>
                          <?php
                              $sqltt = "SELECT * FROM trangthai";
                              $resulttt = $conn->query($sqltt);
                              if ($resulttt->num_rows > 0) {
                                $resulttt = $conn->query($sqltt);
                                $resulttt_all = $resulttt -> fetch_all(MYSQLI_ASSOC);
                                foreach ($resulttt_all as $rowtt) {
                                  echo "<option value=" .$rowtt["TT_MA"]. ">".$rowtt["TT_TEN"]."</option>";
                                }                          
                              } else {
                                echo "<option value=''>Không có dữ liệu</option>";
                              }
                              ?>
                              
                          </select>
                        
                      </div>
                    
                     
                      <div class="col-12 d-flex align-items-center justify-content-center">
                        <input type="hidden" name="mahd" value="<?php echo $mahd; ?>">
                        <button class="btn btn-primary text-white mt-3 ms-3" type="submit">Cập nhật đơn hàng</button>
                      </div>
                      
                    </form>

                  </div>
                </div>
              </div>
            </div>        
        </div>
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
      width: 30%;
      height: auto;
      background-color: #fff;
      border-radius: 10px;
      position: absolute;
      padding: 15px;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

  </style>
  <div class="overlay" id="overlay">
    <div class="my-box">
      <h5 class="ms-3 mt-3 text-primary">Cập nhật thông tin đơn vận chuyển</h5>
      <div class="row">
        <div class="col-12">
          <form action="update_transbill.php" method="post" enctype=multipart/form-data>
            <div class="row">
              <div class="col-12">
                <input type="hidden" name="temp_id" id="temp_id">
                <div class="mb-3 mt-4 px-3 nvc">
                  
                </div>
              </div>
              <div class="col-12">
                <?php require 'datalist_provine.php' ?>
                  <div class="mb-3 mt-4 px-3 des">
                    
                  </div>
              </div>
              <div class="col-12">
                  <div class="mb-3 mt-4 px-3 start">
                    
                  </div>
              </div>
              <div class="col-12">
                  <div class="mb-3 mt-4 px-3 finish">
                    
                  </div>
              </div>
              <div class="row">
                <div class="col-12 d-flex justify-content-center align-items-center" >
                  <button onclick="this.submit()" class="btn btn-primary text-white font-weight-bold text-md ms-0 mt-4">
                    Cập nhật
                  </button>
                </div>
              </div>
            </div>
          </form>
      </div>
    </div>
  </div>

	
	<!--   Core JS Files   -->
	<script>

    const productButtons = document.querySelectorAll('.edit-btn');

    productButtons.forEach(button => {
      button.addEventListener('click', showProductDetails);
    });

    function showProductDetails(event) {
      // Lấy ID của sản phẩm được click
      const id = event.target.getAttribute('data-id');
      const nvcid = event.target.getAttribute('data-nvcid');
      const nvc = event.target.getAttribute('data-nvc');
      const des = event.target.getAttribute('data-des');
      const start = event.target.getAttribute('data-start');
      const finish = event.target.getAttribute('data-finish');
      
      
      document.getElementById("temp_id").value = id;

      // Hiển thị overlay
      const overlay = document.querySelector('.overlay');
      overlay.style.display = 'block';

      // Hiển thị thông tin chi tiết của sản phẩm
      const nvct = document.querySelector('.nvc');
      nvct.innerHTML = 'Tên nhà vận chuyển <input class="form-control form-control-lg mt-1" disabled value = "'+nvc+'" />'
      const dest = document.querySelector('.des');
      dest.innerHTML = 'Vận chuyển đến <input required name="giaoden" class="form form-control form-control-lg" list="browsers" value="'+des+'" >'                    
      const startt = document.querySelector('.start');
      startt.innerHTML = 'Ngày đi <input required class="form form-control form-control-lg" type="date" name="start_date" id="" value="'+start+'">'
      const finisht = document.querySelector('.finish');
      finisht.innerHTML = 'Ngày đến <input required class="form form-control form-control-lg" type="date" name="finish_date" id="" value="'+finish+'">'
      
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
