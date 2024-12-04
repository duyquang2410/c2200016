<!DOCTYPE html>
<html>
<?php
require_once "cay_menu.php"; 
require_once "conn.php"; 
?>
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
    <div class="hero_area">
        <!-- header section strats -->
        <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html">
            <img src="images/logo.png" alt="">
            <span>
              Lodge
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="index.php">Trang Chủ <span class="sr-only">(current)</span></a>
                </li>
                
                <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="products.php" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
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
            
          </div>
        </nav>
      </div>
    </header>

    <!-- item section -->





    <!-- end item section -->


    <!-- price section -->
    <?php 
    // Truy vấn để lấy thông tin sản phẩm cùng với giá từ bảng chitiethoadon và sanpham
    if(isset($_GET['Ma_DM'])) {
        $ma_dm = $_GET['Ma_DM'];
        // Truy vấn để lấy thông tin danh mục từ bảng danhmuc
        $sql_dm = "SELECT Ten_DM FROM danhmuc WHERE Ma_DM = '$ma_dm'";
        $result_dm = mysqli_query($conn, $sql_dm);
        $row_dm = mysqli_fetch_assoc($result_dm);
        $ten_danh_muc = $row_dm['Ten_DM'];

        // Truy vấn để lấy thông tin sản phẩm từ bảng sanpham dựa trên Ma_DM
        $sql = "SELECT sanpham.Ma_SP, sanpham.HinhAnh_SP, sanpham.Ten_SP, don_gia.gia
        FROM sanpham
        INNER JOIN don_gia ON sanpham.Ma_SP = don_gia.Ma_SP WHERE 
    sanpham.Ma_DM = '$ma_dm'";
        $result = mysqli_query($conn, $sql);
    ?>

    <section class="price_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1><?php echo $ten_danh_muc; ?></h1>
                </div>
            </div>
            <div class="row">
                <?php
                    // Kiểm tra xem có kết quả trả về không
                    if (mysqli_num_rows($result) > 0) {
                        // Hiển thị thông tin sản phẩm
                        while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="col-md-3">
                    <div class="box">
                        <div class="img-box">
                            <img src="<?php echo $row['HinhAnh_SP']; ?>" alt="" style="max-width: 100%; max-height: 100%;">
                        </div>
                        <div class="detail-box">
                            <h5><span><?php echo number_format($row['gia']); ?>đ</span></h5>
                            <a href="chitiet.php"><?php echo $row['Ten_SP']; ?></a>
                        </div>
                    </div>
                </div>
                <?php
                        }
                    } else {
                        // Nếu không có sản phẩm nào phù hợp, hiển thị thông báo
                        echo "Không có sản phẩm phù hợp.";
                        
                    }
                ?>
            </div>
        </div>
    </section>
    <?php } ?>

    <!-- end price section -->

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
                                    Address
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
                                    demo@gmail.com
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="info_form">
                    <div class="d-flex justify-content-center">
                        <h5 class="info_heading">
                            Newsletter
                        </h5>
                    </div>
                    <form action="">
                        <div class="email_box">
                            <label for="email2">Enter Your Email</label>
                            <input type="text" id="email2">
                        </div>
                        <div>
                            <button>
                                subscribe
                            </button>
                        </div>
                    </form>
                </div>
                <div class="info_social">
                    <div class="d-flex justify-content-center">
                        <h5 class="info_heading">
                            Follow Us
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
            &copy; <span id="displayYear"></span> All Rights Reserved By
            <a href="https://html.design/">Free Html Templates</a>
        </p>
    </section>
    <!-- footer section -->

    
</body>

</html>
