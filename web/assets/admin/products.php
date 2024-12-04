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
    $active = 'sp'; 
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
                  <div class="col-1 mt-2 font-weight-bold d-flex align-items-center">
                    Lọc: 
                  </div>
                  <div class="input-group input-group-outline my-2">
                    <br>
                    <select class="form-control form-control-md " name="source" id="source">
                      <option value="" selected disabled hidden>- Nguồn hàng -</option>
                      <?php
                        $sql = "SELECT * FROM nhacungcap";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                          $result = $conn->query($sql);
                          $result_all = $result -> fetch_all(MYSQLI_ASSOC);
                          foreach ($result_all as $row) {
                            echo "<option value=" .$row["Ma_NCC "]. ">".$row["Ten_NCC"]. "</option>";
                          }                          
                        } else {
                          echo "<option value=''>Không có dữ liệu</option>";
                        }
                      ?>
                    </select>
                  </div>
                  <div class="px-1 mt-1 col-1 font-weight-bold body">
                    <button type="submit" class="btn btn-primary text-white font-weight-bold text-md ms-0 mt-3">
                      Lọc
                    </button>
                  </div>
                  <div class="px-2 mt-n3 col-2"></div>
                  <div class="px-2 mt-n3 col-1 font-weight-bold"></div>
                  <div class="col-5 mt-2 d-flex align-items-center justify-content-end">
                    <div class="input-group input-group-outline w-70 me-3">
                      <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                      <input  type="text" name="timkiem" class="form-control" placeholder="Nhập tên sản phẩm cần tìm..">
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
        <a href="add_products.php" class="btn btn-link text-red text-uppercase mt-n3">+ Thêm sản phẩm mới</a>
      </div>
        
        <?php
          $sql = "SELECT * FROM danhmuc";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            $result = $conn->query($sql);
            $result_all = $result -> fetch_all(MYSQLI_ASSOC);
            foreach ($result_all as $rowdm) {
              $dmid = $rowdm["Ma_DM"];
              $sql = "SELECT * FROM sanpham where Ma_DM = {$dmid}";
                if(isset($_GET["timkiem"])){
                  $search = $_GET["timkiem"];
                  if ($search != null) {
                    $sql = "SELECT * FROM sanpham WHERE Ma_DM = {$dmid} and Ten_SP LIKE '%".$search."%';";
                  }
                }
        ?>
              <div class="row">
                <div class="col-12">
                  <div class="card mb-4">
                    <div class="card-header pb-2">
                      <?php
                        echo  "<h6>".$rowdm["Ten_DM"]."</h6>";
                      ?>
                    </div>
                    <div class="card-body px-4 pt-0 pb-2">
                      <div class="table-responsive p-0">
                        
                        <table class="table align-items-center mb-0">
                          <thead>
                            <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">Mã</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sản phẩm</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Số lượng</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Giá</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mô tả</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ngày nhập</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hành động</th>
                            </tr>
                          </thead>
                          <tbody>
                            
                            <?php
                              $result = $conn->query($sql);
                              if ($result->num_rows > 0) {
                                $result = $conn->query($sql);
                                $result_all = $result -> fetch_all(MYSQLI_ASSOC);
                                foreach ($result_all as $row) {
                                  $pdid = $row["Ma_SP"];
                                  $soluong = $row["soluong"];
                                  $dmsp = $rowdm["Ten_DM"];
                                  $mdmsp = $rowdm["Ma_DM"];
                                  $query = "SELECT pn.NgayLap_PN AS ngaynhap, pn.Ma_PN AS stt_pn, nh.Ma_NCC AS manh, nh.Ten_NCC AS tennh, dg.gia AS don_gia
                                  FROM chitiet_pn ct
                                  JOIN don_gia dg ON ct.id_gia = dg.id_gia 
                                  JOIN phieunhap pn ON ct.Ma_PN = pn.Ma_PN
                                  JOIN sanpham sp ON ct.Ma_SP = sp.Ma_SP 
                                  JOIN nhacungcap nh ON ct.Ma_NCC = nh.Ma_NCC 
                                  WHERE sp.Ma_SP = {$pdid};";
                        
                                  $rs = $conn->query($query);
                                  $row1 = $rs->fetch_assoc();
                                  $stt_pn = $row1["stt_pn"];
                                  $tennh = $row1["tennh"];
                                  $manh = $row1["manh"];
                                  ?>
                                  <tr class="height-100">
                                     <!-- ma sp -->
                                     <td>
                                      <p class="text-xs font-weight-bold mb-0"><?php echo $row["Ma_SP"]; ?></p>
                                    </td>
                                  
                                    <td class="w-30" >
                                      <div class="d-flex px-2 py-1">
                                          <!-- hinh anh san pham -->
                                        <div>
                                          <?php
                                            if($row["HinhAnh_SP"]==null){
                                              $file = "default.jpg";
                                            } else {
                                              $file = $row["HinhAnh_SP"];
                                            } 
                                            $avatar_url = "../". $file;
                                            echo "<img src='{$avatar_url}' class='avatar avatar-xl me-3' alt='user1'>";
                                          ?> 
                                          
                                        </div>
                                        <!-- ten san pham -->
                                        <div class="d-flex flex-column justify-content-center">
                                          <h6 class="mb-0 text-md"><?php echo $row["Ten_SP"]; ?></h6>
                                          <p class='text-xs text-secondary mb-0'><?php echo "Nguồn hàng: " . $tennh; ?></p>
                                        </div>
                                      </div>
                                    </td>
                                    <!-- soluong sp -->
                                    <td>
                                      <p class="text-xs font-weight-bold mb-0"><?php echo $row["soluong"]; ?></p>
                                    </td>
                                    <!-- gia sp -->
                                    <td>
                                      <p class="text-s font-weight-bold mb-0"><?php echo number_format($row1["don_gia"], 0) ; ?> VNĐ</p>
                                    </td>
                                    
                                    <!-- mo ta -->
                                    <td>
                                      <p class="text-xs font-weight-bold mb-0"><?php echo $row["MoTa_SP"]; ?></p>
                                    </td>

                                    <!-- <td>
                                      <p class="text-xs font-weight-bold mb-0"><?php echo $tennh; echo $stt_pn;?></p>
                                    </td> -->
                                    
                                    <!-- ngay them -->
                                    <td>
                                    <p class="text-xs font-weight-bold mb-0"><?php echo date('d/m/Y', strtotime($row1["ngaynhap"])); ?></p>
                                    </td>
                                    <td class="align-middle text-center">
                                      <div class="mt-3 d-flex col-sm-12">
                                        <div class="me-n1 align-middle col-4">
                                          <!-- <form method="get" action=""> -->
                                            <!-- <input type="hidden" name="pdid_add" value="<?php echo $row["Ma_SP "]; ?>"> -->
                                            <button data-id="<?php echo $row['Ma_SP']; ?>" 
        data-name="<?php echo $row['Ten_SP']; ?>" 
        data-img="<?php echo $avatar_url; ?>" 
        class="addmore-button btn btn-link text-success text-secondary font-weight-bold text-sm">
    Nhập thêm
</button>

                                          <!-- </form> -->
                                        </div>
                                        <div class="me-n0 align-middle col-4">
                                          <form method="post" action="edit_products.php">
                                              <input type="hidden" name="pdid" value="<?php echo $row["Ma_SP"]; ?>">
																							<input type="hidden" name="tensp"value="<?php echo $row["Ten_SP"]; ?>">
                                              <input type="hidden" name="tennh" value="<?php echo $tennh; ?>">
                                              <input type="hidden" name="manh" value="<?php echo $manh; ?>">
                                              <input type="hidden" name="dmsp" value="<?php echo $rowdm["Ten_DM"];; ?>">
                                              <input type="hidden" name="mdmsp" value="<?php echo $mdmsp; ?>">

                                              <input type="hidden" name="stt_pn" value="<?php echo $stt_pn; ?>">
                                              <input type="hidden" name="mota" value="<?php echo $row["MoTa_SP"]; ?>">
                                              <input type="hidden" name="anhsp" value="<?php echo   $avatar_url; ?>">
                                              <input type="hidden" name="slsp" value="<?php echo $row["soluong"]; ?>">
                                              <input type="hidden" name="giasp" value="<?php echo $row1["don_gia"]; ?>">

                                              <button onclick="this.form.submit()" class="btn btn-link text-primary font-weight-bold text-sm">
                                                Sửa
                                              </button>
                                            </form>
                                        </div>
                                        <div class=" align-middle col-1">
                                          <form method="post" action="del_products.php">
                                              <input type="hidden" name="pdid" value="<?php echo $row["Ma_SP"]; ?>">
                                              <button onclick="this.form.submit()" class="addmore-button btn btn-link text-warning text-secondary font-weight-bold text-sm">
                                                Xóa
                                              </button>
                                            </form>
                                        </div>

                                      </div>
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
              <?php
            }                          
          } else {
            echo "<option value=''>Không có dữ liệu</option>";
          }
        ?>

      </div>
      
      <div class="overlay" id="overlay">
        <div class="my-box">
          <h5 class="ms-3 mt-3 text-primary">Nhập thêm sản phẩm</h5>
          <div class="row">
            <div class="col-12">
              <div class="row">
                <div class="col-6 d-flex justify-content-center align-items-center">
                  <div class="row">
                    <div class="col-12">
                      <div class="product-image">
                        
                      </div>  
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="ms-2 product-name">
    
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-6">
                  <form action="update_quantity.php" method="post">
                    <div class="mb-3 mt-4 px-3">
                      Số lượng nhập thêm
                      <input type="hidden" name="temp_id" id="temp_id">
                      <input min="1" max="10000" step="1" type="number" name="quantity" class="form-control form-control-lg mt-3" placeholder="Nhập số lượng sản phẩm nhập thêm">
                      <div class="row">
                        <div class="col-12 d-flex justify-content-center align-items-center" >
                            <button type="submit" class="btn btn-primary text-white font-weight-bold text-md ms-0 mt-4">
                              Cập nhật
                            </button>
                          </div>
                        </div>
                      </div>
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
