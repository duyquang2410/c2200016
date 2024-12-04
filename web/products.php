
<?php 
// Gắn kết nối tới cơ sở dữ liệu
require_once "conn.php";
require_once "cay_menu.php"; // Đường dẫn tới file kết nối

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
    <link href="css/sanpham1.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
    <script src="navbar.js"></script>

  <style>
   .price_section .price_container .box .img-box img {
    width: 280px;
  }
  a {
    color: black;
   
    
}
.fa, .fa-brands, .fa-classic, .fa-regular, .fa-sharp, .fa-solid, .fab, .far, .fas {
    -moz-osx-font-smoothing: grayscale;
    -webkit-font-smoothing: antialiased;
    display: var(--fa-display, inline-block);
    font-style: normal;
    font-variant: normal;
    line-height: 2.5;
    text-rendering: auto;
}
.header_section .container-fluid {
    padding-right: 30px;
    padding-left: 25px;
}

.icons a {
    margin-right: 18px; /* Khoảng cách giữa các phần tử */
}


</style>


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

  <!-- end header section -->
                          </div>
  
 <!-- <div class="mt-4">
    <div id="bannerCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="upload/anh1.jpg" class="d-block w-90" alt="Banner 1">
            </div>
            <div class="carousel-item">
                <img src="upload/anh1.jpg" class="d-block w-100" alt="Banner 2">
            </div>
            <div class="carousel-item">
                <img src="upload/banner3.jpg" class="d-block w-100" alt="Banner 3">
            </div>
        </div>
        <a class="carousel-control-prev" href="#bannerCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#bannerCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>-->

  <!-- end item section -->


  <?php 


// Kiểm tra nếu đã được chọn một danh mục cụ thể
if(isset($_GET['id'])) {
    $category_id = $_GET['id'];

    // Thực hiện truy vấn để lấy thông tin về danh mục sản phẩm được chọn
    $sql_category = "SELECT * FROM danhmuc WHERE Ma_DM = $category_id";
    $result_category = mysqli_query($conn, $sql_category);
    $category = mysqli_fetch_assoc($result_category);

    // Lọc và hiển thị các sản phẩm thuộc danh mục đã chọn, cùng với giá từ bảng đơn giá
    $sql_products = "SELECT 
    sanpham.HinhAnh_SP, 
    sanpham.Ten_SP,
    sanpham.Ma_SP, 
    don_gia.gia AS Gia_SP,
    danhmuc.Ten_DM,
    danhmuc.Ma_DM
FROM 
    sanpham 
INNER JOIN 
    don_gia ON sanpham.Ma_SP = don_gia.Ma_SP 
INNER JOIN 
    danhmuc ON sanpham.Ma_DM = danhmuc.Ma_DM 
                     WHERE sanpham.Ma_DM = $category_id";
    $result_products = mysqli_query($conn, $sql_products);
?>

<section class="price_section layout_padding">
    <div class="container">
        <div class="heading_container">
            <h2>
             <?php echo $category['Ten_DM']; ?> <!-- Hiển thị tên danh mục -->
            </h2>
        </div>
        <div class="price_container">
            <?php
            // Kiểm tra xem có kết quả trả về không
            if (mysqli_num_rows($result_products) > 0) {
                // Hiển thị thông tin sản phẩm
                while ($row = mysqli_fetch_assoc($result_products)) {
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
                                <span><?php echo number_format($row['Gia_SP']); ?>đ</span> <!-- Hiển thị giá của sản phẩm từ bảng đơn giá -->
                            </h5>
                            <a href="add_cart.php?id=<?php echo $row['Ma_SP']; ?>"> <!-- Điều hướng đến trang chi tiết sản phẩm với mã sản phẩm -->
                                Mua Ngay
                            </a>
                        </div>
                    </div>
            <?php 
                }
            } else {
                // Nếu không có sản phẩm nào phù hợp, hiển thị thông báo
                echo "Không có sản phẩm phù hợp.";
            }}
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