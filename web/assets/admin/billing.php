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
    $active = 'hd'; 
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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Hóa đơn</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Hóa đơn</h6>
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
		<div class="container-fluid py-4">
      <div class="row">
        <div class="col-lg-8">
          <div class="row">
            
						<!-- 2 thẻ thong ke  -->
            <div class="col-xl-6">
              <div class="row">
                <div class="col-md-6 col-6">
                  <div class="card">
                    <div class="card-header mx-4 p-3 text-center">
                      <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                        <i class="material-icons opacity-10">credit_score</i>
                      </div>
                    </div>
                    <div class="card-body pt-0 p-3 text-center">
										<?php
											$sql = "SELECT SUM(chitiethoadon.TONG_THANH_TOAN) AS tongtien
                      FROM giaodich
                      INNER JOIN chitiethoadon ON giaodich.Ma_GD = chitiethoadon.Ma_GD
                      WHERE giaodich.TT_MA = 1
                        AND giaodich.PTTT_MA = 3";
                      
											$result = $conn->query($sql);
											$row = mysqli_fetch_assoc($result);
											$tong_vm = number_format($row["tongtien"], 0);
										?>
                      <h6 class="text-center mb-0">Thẻ Visa/Mastercard</h6>
                      <!-- <span class="text-xs">Belong Interactive</span> -->
                      <hr class="horizontal dark my-3">
                      <h5 class="mb-0">+ <?php echo $tong_vm; ?>đ</h5>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-6">
                  <div class="card">
                    <div class="card-header mx-4 p-3 text-center">
                      <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                        <i class="material-icons opacity-10">money</i>
                      </div>
                    </div>
                    <div class="card-body pt-0 p-3 text-center">
										<?php
										$sql = "SELECT SUM(chitiethoadon.TONG_THANH_TOAN) AS tongtien
                    FROM giaodich
                    INNER JOIN chitiethoadon ON giaodich.Ma_GD = chitiethoadon.Ma_GD
                    WHERE giaodich.TT_MA = 1
                      AND giaodich.PTTT_MA = 1";
											$result = $conn->query($sql);
											$row = mysqli_fetch_assoc($result);
											$tong_tm = number_format($row["tongtien"], 0);
                  	?>
                      <h6 class="text-center mb-0">Tiền mặt</h6>
                      <!-- <span class="text-xs">Freelance Payment</span> -->
                      <hr class="horizontal dark my-3">
                      <h5 class="mb-0">+ <?php echo $tong_tm ?>đ</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
						<!-- 2 thẻ thong ke  -->
						<div class="col-xl-6">
              <div class="row">
                <div class="col-md-6 col-6">
                  <div class="card">
                    <div class="card-header mx-4 p-3 text-center">
                      <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                        <i class="material-icons opacity-10">account_balance</i>
                      </div>
                    </div>
                    <div class="card-body pt-0 p-3 text-center">
										<?php
											$sql = "SELECT SUM(chitiethoadon.TONG_THANH_TOAN) AS tongtien
                      FROM giaodich
                      INNER JOIN chitiethoadon ON giaodich.Ma_GD = chitiethoadon.Ma_GD
                      WHERE giaodich.TT_MA = 1
                        AND giaodich.PTTT_MA = 3";
                      
											$result = $conn->query($sql);
											$row = mysqli_fetch_assoc($result);
											$tong_ck = number_format($row["tongtien"], 0);
										?>
                      <h6 class="text-center mb-0">Chuyển khoản ngân hàng</h6>
                      <!-- <span class="text-xs">Belong Interactive</span> -->
                      <hr class="horizontal dark my-3">
                      <h5 class="mb-0">+ <?php echo $tong_ck; ?>đ</h5>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-6">
                  <div class="card">
                    <div class="card-header mx-4 p-3 text-center">
                      <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                        <i class="material-icons opacity-10">account_balance_wallet</i>
                      </div>
                    </div>
                    <div class="card-body pt-0 p-3 text-center">
										<?php
										$sql = "SELECT SUM(chitiethoadon.TONG_THANH_TOAN) AS tongtien
                    FROM giaodich
                    INNER JOIN chitiethoadon ON giaodich.Ma_GD = chitiethoadon.Ma_GD
                    WHERE giaodich.TT_MA = 1
                      AND giaodich.PTTT_MA = 3";
											$result = $conn->query($sql);
											$row = mysqli_fetch_assoc($result);
											$tong_mm = number_format($row["tongtien"], 0);
										?>
                      <h6 class="text-center mb-0">Ví Momo</h6>
                      <!-- <span class="text-xs">Freelance Payment</span> -->
                      <hr class="horizontal dark my-3">
                      <h5 class="mb-0">+ <?php echo $tong_mm; ?>đ</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12 mb-lg-0 mb-2">
              <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                <div class="row">
                <div class="col-6 d-flex align-items-center">
    <h6 class="mb-0">Danh sách hóa đơn</h6>
</div>
<div class="col-6 text-end">
    <!-- Nút thêm mới hóa đơn -->
    <!-- <a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New Card</a> -->
</div>
</div>

<div class="card-body p-3">
    <div class="row">
        <div class="table-responsive p-0">
            <table id="myTable" class="display table align-items-center mb-0">
                <thead>
                    <tr class="col-lg-12">
                        <th class="col-1 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mã HD</th>
                        <th class="col-2 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Ngày lặp</th>
                        <th class="col-1 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Số lượng SP</th>
                        <th class="col-3 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">PT Thanh toán</th>
                        <th class="col-2 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tổng tiền</th>
                        <th class="col-2 text-secondary opacity-7"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Truy vấn SQL mới để tính tổng tiền từ các chi tiết hóa đơn
                    $sql = "SELECT giaodich.Ma_GD, giaodich.NGAY_LAP, giaodich.PTTT_MA,
                                   SUM(chitiethoadon.TONG_THANH_TOAN) AS tongtien
                            FROM giaodich
                            INNER JOIN chitiethoadon ON giaodich.Ma_GD = chitiethoadon.Ma_GD
                            WHERE giaodich.TT_MA = 1
                            GROUP BY giaodich.Ma_GD";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr class="h-50">';
                            echo '<td class="align-middle text-xs text-center">' . $row["Ma_GD"] . '</td>';
                            echo '<td class="align-middle text-xs text-center">' . date('d/m/Y', strtotime($row["NGAY_LAP"])) . '</td>';

                            // Truy vấn số lượng sản phẩm của mỗi hóa đơn
                            $sql_sl = "SELECT COUNT(*) AS soluong FROM chitiethoadon WHERE Ma_GD = " . $row["Ma_GD"];
                            $rssl = $conn->query($sql_sl);
                            $rowsl = mysqli_fetch_assoc($rssl);

                            echo '<td class="align-middle text-xs text-center">' . $rowsl["soluong"] . '</td>'; // Số lượng sản phẩm

                            // Truy vấn tên phương thức thanh toán
                            $idpttt = $row["PTTT_MA"];
                            $sqlpt = "SELECT PTTT_TEN FROM pt_thanhtoan WHERE PTTT_MA = {$idpttt}";
                            $rspt = $conn->query($sqlpt);
                            $rowpt = mysqli_fetch_assoc($rspt);

                            echo '<td class="align-middle text-xs text-center">' . $rowpt["PTTT_TEN"] . '</td>'; // Phương thức thanh toán

                            // Hiển thị tổng tiền định dạng
                            echo '<td class="align-middle font-weight-bold text-success text-center">' . number_format($row["tongtien"], 0) . 'đ</td>';

                            // Form để xem chi tiết hóa đơn
                            echo '<td class="align-middle text-center">';
                            echo '<form action="" method="get">';
                            echo '<input type="hidden" name="hd_id" value="' . $row["Ma_GD"] . '">';
                            echo '<button data-id="' . $row["Ma_GD"] . '" class="edit-btn btn btn-link btn btn-outline-primary text-primary font-weight-bold text-xs mt-3 p-0">Xem chi tiết ></button>';
                            echo '</form>';
                            echo '</td>';

                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="6" class="text-center">Không có hóa đơn nào.</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


			<!-- chi tiet hoa don -->
<div class="col-lg-4">
    <?php
    if (isset($_GET["hd_id"])) {
        $hdid = $_GET["hd_id"];

        $sql = "SELECT hd.Ma_GD AS mahd, hd.NGAY_LAP AS ngay, kh.Ma_KH AS makh, kh.HoTen_KH AS tenkh, kh.Sdt_KH AS sdtkh, nv.Ma_NV AS manv, nv.Ten_NV AS tennv
        FROM giaodich hd
        INNER JOIN khachhang kh ON kh.Ma_KH = hd.Ma_KH
        INNER JOIN nhanvien nv ON hd.Ma_NV = nv.Ma_NV
        WHERE hd.Ma_GD = {$hdid}";

        $rs = $conn->query($sql);
        $row = mysqli_fetch_assoc($rs);
        ?>
        <div class="card">
            <div class="card-header pb-0 p-3">
                <div class="row">
                    <div class="col-6 d-flex align-items-center">
                        <h6 class="mb-0">Chi tiết hoá đơn</h6>
                    </div>
                    <div class="col-6 text-end">
                        <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-5"><i class="fas fa-print text-sm me-1"></i> In</button>
                    </div>
                </div>
            </div>
            <div class="card-body p-3 pb-3">
              <div class="row">
                <div class="col-12"  id="printable-content">
                  <!-- title -->
                  <div class="row text-center fs-5 font-weight-bold">
                    <div class="col-12">
                      THÔNG TIN ĐƠN ĐẶT HÀNG
                    </div>
                  </div>
                        <!-- ngay -->
                        <div class="row text-center fs- font-weight-bold">
                            <div class="col-12">
                                Mã đơn: <?php echo $row["mahd"];
                                $mahd = $row["mahd"]; ?> - Ngày đặt: <?php echo date('d/m/Y', strtotime($row["ngay"])) ?>
                            </div>
                        </div>
                        <!-- thongtin khachhang -->
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <h6>Thông tin khách hàng</h6>
                                <!-- 1 hang -->
                                <div class="row px-2 mt-2">
                                    <div class="col-6">
                                        <h6>Mã khách hàng: </h6>
                                    </div>
                                    <div class="col-6">
                                        <p><?php echo $row["makh"] ?></p>
                                    </div>
                                </div>
                                <!-- 1 hang -->
                                <div class="row px-2 mt-n3">
                                    <div class="col-6">
                                        <h6>Tên khách hàng: </h6>
                                    </div>
                                    <div class="col-6">
                                        <p><?php echo $row["tenkh"] ?></p>
                                    </div>
                                </div>
                                <!-- 1 hang -->
                                <div class="row px-2 mt-n3">
                                    <div class="col-6">
                                        <h6>SĐT: </h6>
                                    </div>
                                    <div class="col-6">
                                        <p><?php echo $row["sdtkh"] ?></p>
                                    </div>
                                </div>
                                <!-- 1 hang -->
                                <div class="row px-2 mt-n3">
                        <div class="col-6">
                          <h6>Địa chỉ: </h6>
                        </div>
                        <div class="col-6">
                       
                        </div>
                      </div>
                    </div>
                  </div>
                        <!-- thongtin nhanvien -->
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <h6>Thông tin nhân viên</h6>
                                <!-- 1 hang -->
                                <div class="row px-2 mt-2">
                                    <div class="col-6">
                                        <h6>Mã nhân viên: </h6>
                                    </div>
                                    <div class="col-6">
                                        <p><?php echo $row["manv"] ?></p>
                                    </div>
                                </div>
                                <!-- 1 hang -->
                                <div class="row px-2 mt-n3">
                          <div class="col-6">
                            <h6>Tên nhân viên: </h6>
                          </div>
                          <div class="col-6">
                            <p><?php echo $row["tennv"] ?></p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
    <div class="col-md-12">
        <h6>Danh sách sản phẩm</h6>
        <table>
            <thead>
                <tr class="col-12">
                    <th class="col-7 text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tên SP</th>
                    <th class="col-2 text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">SL</th>
                    <th class="col-3 text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Đơn giá</th>
                    <th class="col-3 text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">T.Tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT sp.Ten_SP AS tensp, dg.gia AS giasp, ct.SO_LUONG_BAN AS slsp, (ct.SO_LUONG_BAN * dg.gia) AS tongtien 
                FROM chitiethoadon ct
                JOIN don_gia dg ON dg.Ma_SP = ct.Ma_SP
                JOIN giaodich hd ON hd.Ma_GD = ct.Ma_GD  
                JOIN sanpham sp ON sp.Ma_SP = ct.Ma_SP 
                WHERE hd.Ma_GD = {$row["mahd"]}";
                $rs = $conn->query($sql);

                // Kiểm tra xem có lỗi trong câu truy vấn không
                if (!$rs) {
                    // In ra thông báo lỗi hoặc ghi log
                    echo "Lỗi trong câu truy vấn SQL: " . $conn->error;
                } else {
                    // Kiểm tra xem có kết quả trả về không
                    if ($rs->num_rows > 0) {
                        // Lặp qua các hàng kết quả và hiển thị
                        $rs_all = $rs->fetch_all(MYSQLI_ASSOC);
                        foreach ($rs_all as $row) {
                            ?>
                            <tr>
                                <td colspan="4">
                                    <hr style="height:1px;border-width:0;color:gray;background-color:gray">
                                </td>
                            </tr>
                            <tr>
                                <td><?php echo $row["tensp"] ?></td>
                                <td><?php echo $row["slsp"] ?></td>
                                <td><?php echo number_format($row["giasp"], 0) ?></td>
                                <td><?php echo number_format($row["tongtien"], 0) ?></td>
                            </tr>
                            <?php
                        }
                    } else {
                        // Xử lý trường hợp không có kết quả trả về
                        echo "Không có thông tin sản phẩm nào.";
                    }
                }
                ?>
                <tr>
                    <td colspan="4">
                        <hr style="height:1px;border-width:0;color:gray;background-color:gray">
                    </td>
                </tr>
                <tr>
                    <td colspan="4" class="text-end">
                        <?php
                        $sql = "SELECT SUM(ct.SO_LUONG_BAN * dg.gia) AS tongtien 
                        FROM chitiethoadon ct 
                        JOIN giaodich hd ON hd.Ma_GD = ct.Ma_GD 
                        JOIN sanpham sp ON sp.Ma_SP = ct.Ma_SP 
                        JOIN don_gia dg ON dg.Ma_SP = sp.Ma_SP 
                        WHERE hd.Ma_GD = {$mahd}";
                        $rs = $conn->query($sql);

                        // Kiểm tra xem có lỗi trong câu truy vấn không
                        if (!$rs) {
                            // In ra thông báo lỗi hoặc ghi log
                            echo "Lỗi trong câu truy vấn SQL: " . $conn->error;
                        } else {
                            // Kiểm tra xem có kết quả trả về không
                            if ($rs->num_rows > 0) {
                                $row = $rs->fetch_assoc();
                                ?>
                                <h7 class="fs-5 text-dark">Tổng hóa đơn</h7>
                                <h6 class="fs-4 mt-n2 text-success"><?php echo number_format($row["tongtien"], 0) ?> đ</h6>
                                <?php
                            } else {
                                // Xử lý trường hợp không có kết quả trả về
                                echo "Không có thông tin tổng hóa đơn.";
                            }
                        }
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

                  </div>

                </div>
              </div>
            </div>
  <?php 
        } else {
          // Xử lý trường hợp không có kết quả trả về từ câu truy vấn SQL
  ?>
          <div class="card">
            <div class="card-header pb-0 p-3"></div>
            <div class="card-body p-3 pb-0">
              <div class="row">
                <div class="col-12 pt-4 pb-5 text-center">
                  <h5>                      
                    Thông tin chi tiết sẽ xuất hiện ở đây
                  </h5>
                </div>
              </div>
            </div>
  <?php
        
  }
  ?>
</div>

      <!-- <div class="row">
        <div class="col-md-7 mt-4">
          <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0">Billing Information</h6>
            </div>
            <div class="card-body pt-4 p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="mb-3 text-sm">Oliver Liam</h6>
                    <span class="mb-2 text-xs">Company Name: <span class="text-dark font-weight-bold ms-sm-2">Viking Burrito</span></span>
                    <span class="mb-2 text-xs">Email Address: <span class="text-dark ms-sm-2 font-weight-bold">oliver@burrito.com</span></span>
                    <span class="text-xs">VAT Number: <span class="text-dark ms-sm-2 font-weight-bold">FRB1235476</span></span>
                  </div>
                  <div class="ms-auto text-end">
                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i class="material-icons text-sm me-2">delete</i>Delete</a>
                    <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="material-icons text-sm me-2">edit</i>Edit</a>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex p-4 mb-2 mt-3 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="mb-3 text-sm">Lucas Harper</h6>
                    <span class="mb-2 text-xs">Company Name: <span class="text-dark font-weight-bold ms-sm-2">Stone Tech Zone</span></span>
                    <span class="mb-2 text-xs">Email Address: <span class="text-dark ms-sm-2 font-weight-bold">lucas@stone-tech.com</span></span>
                    <span class="text-xs">VAT Number: <span class="text-dark ms-sm-2 font-weight-bold">FRB1235476</span></span>
                  </div>
                  <div class="ms-auto text-end">
                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i class="material-icons text-sm me-2">delete</i>Delete</a>
                    <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="material-icons text-sm me-2">edit</i>Edit</a>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex p-4 mb-2 mt-3 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="mb-3 text-sm">Ethan James</h6>
                    <span class="mb-2 text-xs">Company Name: <span class="text-dark font-weight-bold ms-sm-2">Fiber Notion</span></span>
                    <span class="mb-2 text-xs">Email Address: <span class="text-dark ms-sm-2 font-weight-bold">ethan@fiber.com</span></span>
                    <span class="text-xs">VAT Number: <span class="text-dark ms-sm-2 font-weight-bold">FRB1235476</span></span>
                  </div>
                  <div class="ms-auto text-end">
                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i class="material-icons text-sm me-2">delete</i>Delete</a>
                    <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="material-icons text-sm me-2">edit</i>Edit</a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-5 mt-4">
          <div class="card h-100 mb-4">
            <div class="card-header pb-0 px-3">
              <div class="row">
                <div class="col-md-6">
                  <h6 class="mb-0">Your Transaction's</h6>
                </div>
                <div class="col-md-6 d-flex justify-content-start justify-content-md-end align-items-center">
                  <i class="material-icons me-2 text-lg">date_range</i>
                  <small>23 - 30 March 2020</small>
                </div>
              </div>
            </div>
            <div class="card-body pt-4 p-3">
              <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Newest</h6>
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">expand_more</i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Netflix</h6>
                      <span class="text-xs">27 March 2020, at 12:30 PM</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                    - $ 2,500
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">expand_less</i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Apple</h6>
                      <span class="text-xs">27 March 2020, at 04:30 AM</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                    + $ 2,000
                  </div>
                </li>
              </ul>
              <h6 class="text-uppercase text-body text-xs font-weight-bolder my-3">Yesterday</h6>
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">expand_less</i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Stripe</h6>
                      <span class="text-xs">26 March 2020, at 13:45 PM</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                    + $ 750
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">expand_less</i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">HubSpot</h6>
                      <span class="text-xs">26 March 2020, at 12:30 PM</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                    + $ 1,000
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">expand_less</i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Creative Tim</h6>
                      <span class="text-xs">26 March 2020, at 08:30 AM</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                    + $ 2,500
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-dark mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">priority_high</i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Webflow</h6>
                      <span class="text-xs">26 March 2020, at 05:00 AM</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-dark text-sm font-weight-bold">
                    Pending
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div> -->
      <footer class="footer py-4  ">
       
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