
<?php 
// Gắn kết nối tới cơ sở dữ liệu
require_once "conn.php"; // Đường dẫn tới file kết nối

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

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan|Poppins:400,600,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

  <style>
   
</style>


</head>

<body class="sub_page">

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
                <li class="nav-item">
                  <a class="nav-link" href="about.php">Tin Tức</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="jewellery.php">Sản Phẩm</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.php">Liên Hệ</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="login.php">Đăng Nhập</a>
                </li>
              </ul>

            </div>
            <div class="quote_btn-container ">
              <a href="">
                <img src="images/cart.png" alt="">
                <div class="cart_number">
                  0
                </div>
              </a>
              <form class="form-inline">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
              </form>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>

  

  <!-- end item section -->


  <!-- price section -->
  <?php 
// Truy vấn để lấy thông tin sản phẩm cùng với giá từ bảng chitiethoadon và sanpham
$sql = "SELECT 
sanpham.HinhAnh_SP, 
sanpham.Ten_SP, 
chitietgiaodich.DonGia AS Gia_SP 
FROM 
sanpham 
INNER JOIN 
chitietgiaodich ON sanpham.Ma_SP = chitietgiaodich.Ma_SP 
;
";
$result = mysqli_query($conn, $sql);

// Bắt đầu phần HTML
?>

<section class="price_section layout_padding">
    <div class="container">
        <div class="heading_container">
            <h2>
                Sản Phẩm 
            </h2>
        </div>
        <div class="price_container">
            <?php
            // Kiểm tra xem có kết quả trả về không
            if (mysqli_num_rows($result) > 0) {
                // Hiển thị thông tin sản phẩm
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <div class="box">
                    <div class="name">
                            <h6>
                                <?php echo $row['Ten_SP']; ?>
                            </h6>
                        </div>
                        <div class="img-box">
                            <img src="<?php echo $row['HinhAnh_SP']; ?>" alt="">
                        </div>
                        <div class="detail-box">
                        
                            <h5>
                                <span><?php echo number_format($row['Gia_SP']); ?>đ</span> <!-- Hiển thị giá của sản phẩm -->
                            </h5>
                            <a href="chitiet.php">
                                Mua Ngay
                            </a>
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

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>
</body>

</html>