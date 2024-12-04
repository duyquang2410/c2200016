<?php
// Gắn kết nối tới cơ sở dữ liệu
require_once "conn.php"; // Đường dẫn tới file kết nối
require_once "cay_menu.php";

// Tiếp tục viết mã để hiển thị danh sách sản phẩm, sử dụng biến $conn đã kết nối
?>

<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Lodge</title>

    <!-- slider stylesheet -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/sina-nav.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan|Poppins:400,600,700&display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
    <script src="navbar.js"></script>
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
                            <i> <label for="">Xin chào: </label><?php echo $_SESSION["user"]; ?></i>
                            <a href='logout.php'><i class="fa-solid fa-right-from-bracket"></i></a>
                            <?php
                            }
                            ?>
                            <a href="cart.php"><i class="fa-solid fa-cart-shopping"></i><span
                                    style="height: 13px;width: 13px;background: #ffc800;font-size: 10px;color: #ffffff;line-height: 13px;text-align: center;font-weight: 700;display: inline-block;border-radius: 50%;position: absolute;">
                                    <?php require 'slsp.php'; ?>

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
    <section class="shoping-cart spad">
        <div class="container">
            <h1
                style="text-align: center; font-weight: bold; font-family: 'Dancing Script', cursive; border-bottom: 2px solid #ffc800; text-shadow: 1px 1px 1px black; margin-bottom:20px;">
                Giỏ hàng</h1>
            <form name="form5" id="ff5" method="POST" action="removecart.php">
                <div class="row">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Trang Sức</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng</th>
                                        
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_SESSION["khid"])) {
                                    $khid = $_SESSION["khid"];
                                    $sql = "SELECT chitietgiaodich.Ma_SP, chitietgiaodich.SoLuong_GD 
                                            FROM chitietgiaodich
                                            JOIN giaodich ON chitietgiaodich.Ma_GD = giaodich.Ma_GD
                                            WHERE giaodich.Ma_KH = {$khid}";
                                    $rs = $conn->query($sql);
                                    if ($rs === false) {
                                        echo "Error: " . $sql . "<br>" . $conn->error;
                                    } else {
                                        $total = 0;
                                        if ($rs->num_rows > 0) {
                                            while ($sp = $rs->fetch_assoc()) {
                                                $spid = $sp["Ma_SP"];
                                                $query = "SELECT sanpham.*, don_gia.gia
                                                          FROM sanpham
                                                          JOIN don_gia ON sanpham.Ma_SP = don_gia.Ma_SP
                                                          WHERE sanpham.Ma_SP = $spid";
                                                $result = $conn->query($query);
                                                if ($result === false) {
                                                    echo "Error: " . $query . "<br>" . $conn->error;
                                                } else {
                                                    if ($result->num_rows > 0) {
                                                        $s = $result->fetch_assoc();
                                                        $total += $sp["SoLuong_GD"] * $s["gia"];
                                                        ?>
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="<?php echo $s["HinhAnh_SP"]; ?>"
                                            style="width: 20%; height: 20%; object-fit: cover;" alt="">
                                        <h5 style="font-weight: bold;"><?php echo $s["Ten_SP"]; ?></h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        <?php echo number_format($s["gia"]); ?> VNĐ
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <input type="number" min="1" max="99" name="qty"
                                                value="<?php echo $sp["SoLuong_GD"]; ?>">
                                            <br>
                                            <input type="submit" name="update" value="Cập nhật" class="btn btn-2"
                                                style="color:#ffc800">
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        <?php echo number_format($sp["SoLuong_GD"] * $s["gia"], 0); ?> VNĐ
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <input type="submit" name="remove" value="Delete"
                                            class="btn btn-default pull-right" style="color: #ffc800 !important;">
                                        <input type="hidden" name="idsprm" value="<?php echo $s["Ma_SP"]; ?>" />
                                    </td>
                                </tr>
                                <?php
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="jewellery.php" class="primary-btn cart-btn">Đặt Thêm</a>
                    </div>
                </div>
                <div class="col-lg-6 ml-auto">
    <div class="shoping__checkout">
        <h5>TỔNG</h5>
        <ul>
            <li>Tổng tiền <span><?php echo number_format($total, 0); ?> VNĐ</span></li>
        </ul>
        <a href="dathang.php" class="primary-btn">ĐẶT HÀNG</a>
    </div>
</div>
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