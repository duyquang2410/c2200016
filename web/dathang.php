<?php
// Gắn kết nối tới cơ sở dữ liệu
require_once "conn.php"; // Đường dẫn tới file kết nối
require_once "cay_menu.php";

// Tiếp tục viết mã để hiển thị danh sách sản phẩm, sử dụng biến $conn đã kết nối
?>

<!DOCTYPE html>
<html>

<head>
    <!-- Meta tags -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Lodge</title>

    <!-- CSS styles -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan|Poppins:400,600,700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <link href="css/style.css" rel="stylesheet" />
</head>

<body class="sub_page">
    <div class="hero_area">
        <!-- Header section -->
        <header class="header_section">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg custom_nav-container ">
                    <a class="navbar-brand" href="index.html">
                        <img src="images/logo.png" alt="">
                        <span>Lodge</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Trang Chủ</a>
                            </li>
                            
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="category.php" id="navbarDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Danh mục
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown"
                                    style="background-color: #ffc800;">
                                    <?php echo createMenu(0, $menus); ?>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="jewellery.php">Sản Phẩm</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.php">Liên Hệ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="tygia.php">Bảng tỷ giá</a>
                            </li>
                            <form class="d-flex">
                                <div class="icons">
                                    <?php
                            if (!isset($_SESSION["user"])){
                          ?>
                                    <a href="login.php"><i class="fa-regular fa-user"></i></a>
                                    <?php
                            }
                            else 
                            {
                                ?>
                                    <i> <label class="user" for="">Xin chào:
                                        </label><?php echo $_SESSION["user"]; ?></i>
                                    <a href='logout.php'><i class="fa-solid fa-right-from-bracket"></i></a>
                                    <?php
                            }
                            ?>
                                    <a href="cart.php"><i class="fa-solid fa-cart-shopping"></i><span
                                            style="height: 13px;width: 13px;background: #ffc800;font-size: 10px;color: #ffffff;line-height: 13px;text-align: center;font-weight: 700;display: inline-block;border-radius: 50%;position: absolute;">
                                            <?php    $khid = $_SESSION["khid"];
                                                $sql = "select count(ct.Ma_GD) as soluong 
                                                            from chitietgiaodich ct
                                                            join giaodich gd on ct.Ma_GD=gd.Ma_GD
                                                            where gd.Ma_KH={$khid}";
                                                $result = $conn->query($sql);
                                                $row = mysqli_fetch_assoc($result);
                                                $slsp_gh = $row["soluong"];
                                                echo "$slsp_gh"; ?>

                                        </span></a>

                                </div>
                            </form>
                        </ul>
                    </div>

                </nav>
            </div>
        </header>
        <!-- End header section -->
    </div>

    <!-- Cart section -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h1
                    style="text-align: center; font-weight: bold; font-family: 'Dancing Script', cursive; border-bottom: 2px solid #ffc800; text-shadow: 1px 1px 1px black; margin-bottom:20px;">
                    Xác nhận đơn hàng</h1>
                <form name="form6" id="ff6" method="POST" action="luudonhang.php">
                    <div class="row">
                        <div class="col-lg-6 col-md-7">
                            <h3>Thông tin khách hàng</h3>
                            <div class="row">
                                <div class="col-md-8">

                                    <label>Tên khách hàng :<?php echo $_SESSION['name']?> </label><br />
                                    <label>Số điện thoại :<?php echo $_SESSION['sdt']?> </label><br />
                                    <label>Email: <?php echo $_SESSION['email']?><br />
                                        <label>Ngày đặt hàng: <input type="text" readonly class="form-control"
                                                value="<?php echo date('Y-m-d'); ?>" name="date" id="datechoose"
                                                required></label><br />
                                        <label>Hình thức thanh toán: </label> <br />
                                        <select class="form-control select2" name="hinhthuctt">
                                            <option value="">Đến cửa hàng thanh toán </option>
                                        </select>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-5">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <h3>Thông tin đơn hàng</h3>
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Tên sản phẩm</th>
                                                            <th>Số lượng</th>
                                                            <th>Giá</th>
                                                            <th>Thành tiền</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php	
                                                        $sp_array = array();
                                                        $slsp_array = array();
                                                        $khid = $_SESSION["khid"];
                                                        $sl = 0;
                                                        $sql = "select ct.Ma_SP, ct.SoLuong_GD, gd.Ma_GD
                                                                    from chitietgiaodich ct 
                                                                    join giaodich gd on ct.Ma_GD=gd.Ma_GD
                                                                    WHERE gd.Ma_KH={$khid}";
                                                        $rs = $conn->query($sql);
                                                        $total = 0;
                                                        foreach ($rs as $sp) {
                                                            $sl += 1;
                                                            $spid = $sp["Ma_SP"];
                                                            $sp_array[] = $spid;
                                                            $query = "SELECT sanpham.*, don_gia.gia
                                                            FROM sanpham
                                                            JOIN don_gia ON sanpham.Ma_SP = don_gia.Ma_SP
                                                            WHERE sanpham.Ma_SP = $spid";
                                                            $result = $conn->query($query);
                                                            foreach ($result as $s) {
                                                        ?>
                                                        <tr>
                                                            <td><?php  echo $s["Ten_SP"]?></td>
                                                            <td><?php echo $sp["SoLuong_GD"]?></td>
                                                            <td><?php  echo number_format($s["gia"])?> </td>
                                                            <td><?php echo number_format($sp["SoLuong_GD"]*$s["gia"])?>
                                                            </td>
                                                            <?php $slsp_array[] = $sp["SoLuong_GD"] ?>
                                                        </tr>
                                                        <?php
                                                        $total += $sp["SoLuong_GD"]*$s["gia"];
                                                            }
                                                        }
                                                        $queryString = http_build_query($sp_array);
                                                        $queryString1 = http_build_query($slsp_array);
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h4>TỔNG <?php echo number_format($total,0);  ?> VNĐ</h4>
                            <input type="hidden" name="total" value="<?php echo $total ?>">
                            <input type="hidden" name="dongia" value="<?php echo $s["gia"] ?>">
                            <input type="hidden" name="ghma" value="<?php echo $sp["Ma_GD"] ?>">
                            <input type="hidden" name="sparray" value="<?php echo $queryString; ?>">
                            <input type="hidden" name="slarray" value="<?php echo $queryString1; ?>">
                            <input style="margin-left:250px; background-color:#ffc800;" type="submit" name="Dat"
                                value="Đặt hàng" class="btn btn-1" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- info section -->
 <section class="info_section ">
    <div class="container">
      <div class="info_container">
        <div class="row">
          <div class="col-md-3">
            <div class="info_logo">
              <a href="">
                <img src="images/logo.png" alt="">
                <span>
                  Lodge
                </span>
              </a>
            </div>
          </div>
          <div class="col-md-3">
            <div class="info_contact">
              <a href="">
                <img src="images/location.png" alt="">
                <span>
                  Cần Thơ
                </span>
              </a>
            </div>
          </div>
          <div class="col-md-3">
            <div class="info_contact">
              <a href="">
                <img src="images/phone.png" alt="">
                <span>
                  +01 1234567890
                </span>
              </a>
            </div>
          </div>
          <div class="col-md-3">
            <div class="info_contact">
              <a href="">
                <img src="images/mail.png" alt="">
                <span>
                  jewelley@gmail.com
                </span>
              </a>
            </div>
          </div>
        </div>
        <div class="info_form">
          <div class="d-flex justify-content-center">
            <h5 class="info_heading">
             Thông tin
            </h5>
          </div>
          <form action="">
  <div class="email_box">
   
    <input type="email" id="email2" name="email2" placeholder="Nhập email của bạn">
  </div>
  <div>
    <button type="submit">Đăng ký</button>
  </div>
</form>

        </div>
        <div class="info_social">
          <div class="d-flex justify-content-center">
            <h5 class="info_heading">
              Kết nối với chúng tôi
            </h5>
          </div>
          <div class="social_box">
            <a href="">
              <img src="images/fb.png" alt="">
            </a>
            <a href="">
              <img src="images/twitter.png" alt="">
            </a>
            <a href="">
              <img src="images/linkedin.png" alt="">
            </a>
            <a href="">
              <img src="images/insta.png" alt="">
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end info_section -->

  <!-- footer section -->
  <section class="container-fluid footer_section">
    <p>
      &copy; <span id="displayYear"></span> By
      <a href="https://html.design/"> Jewellery Store</a>
    </p>
  </section>
  <!-- footer section -->

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>
</body>

</html>