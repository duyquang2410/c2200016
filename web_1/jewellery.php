
<?php 
// Gắn kết nối tới cơ sở dữ liệu
require_once "conn.php"; 
require_once "cay_menu.php";


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
    <link href="css/sanpham.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
    <script src="navbar.js"></script>

  <style>
    .price_container .box {
  width: 300px; 
}


.img-box img {
  max-width: 100%;
  height: auto;
}
/* Màu vàng cho gạch chân */
.golden-underline {
    text-decoration: underline;
    text-decoration-color: #fbb534;
}
.price_section .price_container .box .detail-box a {
    display: inline-block;
    padding: 5px 15px;
    border: 1px solid #000000;
    font-weight: bold;
    color: #000000;
    margin-top: 1px;
  }
  .price_section .price_container .box .img-box img {
    width: 280px;
  }
  h1, h2, h3, h4, h5, h6,
.h1, .h2, .h3, .h4, .h5, .h6 {
  margin-bottom: 0.5rem;
  font-weight: 300;
  line-height: 1;
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
    padding-left: 20px;
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
                                <a class="nav-link" href="contact1.php">Liên Hệ</a>
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

<!-- Banner section -->
<div class="banner_section layout_padding">
    <div class="container-fluid">
        <div class="row">
            <div style="text-align: center; width: 100%;">
                <img src="upload/banner2.jpg" alt="Banner" style="height: auto; max-width: 100%; display: block; margin: 0 auto;">
            </div>
        </div>
    </div>
</div>




<?php



// Truy vấn cơ sở dữ liệu để lấy danh sách các danh mục sản phẩm
$sql_str = "SELECT * FROM danhmuc ORDER BY Ma_DM";
$result = mysqli_query($conn, $sql_str);

// Kiểm tra xem có lỗi trong truy vấn không
if (!$result) {
    die('Có lỗi trong truy vấn SQL: ' . mysqli_error($conn));
}


?>
<?php


// Truy vấn cơ sở dữ liệu để lấy danh sách các danh mục sản phẩm
$sql_str = "SELECT * FROM danhmuc WHERE Ten_DM LIKE '%Trang%' OR Ten_DM LIKE '%Quà%' ORDER BY Ma_DM
 ";
$result = mysqli_query($conn, $sql_str);

// Kiểm tra xem có lỗi trong truy vấn không
if (!$result) {
    die('Có lỗi trong truy vấn SQL: ' . mysqli_error($conn));
}
?>

<div class="item_section layout_padding2">
    <div class="container">
        <h2 class="text-center">Xu hướng tìm kiếm</h2>
        <div class="item_container_wrapper">
            <!-- Container chứa sản phẩm và nút điều khiển -->
            <div class="item_container_wrapper_inner d-flex">
                <!-- Button điều khiển bên trái -->
               
                <!-- Container chứa sản phẩm -->
                <div class="item_container d-flex justify-content-center">
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <div class="box">
                            <div class="price"></div>
                            <!-- Bao quanh ảnh bằng thẻ <a> để tạo liên kết -->
                            <a href="products.php?id=<?php echo $row['Ma_DM']; ?>">
                                <div class="img-box">
                                    <!-- Sử dụng đường dẫn của ảnh danh mục -->
                                    <img src="<?php echo $row['HinhAnh_DM']; ?>" alt="">
                                </div>
                            </a>
                            <!-- Phần tên danh mục -->
                            <div class="name">
                                <h5 class="text-center"><?php echo $row['Ten_DM']; ?></h5>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!-- Button điều khiển bên phải -->
               
            </div>
        </div>
    </div>
</div>





  <!-- end item section -->


  <!-- price section -->
  <?php
// Kết nối CSDL

// Truy vấn để lấy thông tin sản phẩm theo từng danh mục từ bảng chitiethoadon và sanpham
$sql = "SELECT 
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
       ";

$result = mysqli_query($conn, $sql);

// Số lượng sản phẩm tối đa bạn muốn hiển thị cho mỗi danh mục
$max_products_per_category = 3;


?>

<section class="price_section layout_padding">
    <div class="container" >
        <?php
        // Kiểm tra xem có kết quả trả về không
        if (mysqli_num_rows($result) > 0) {
            // Khởi tạo mảng để lưu trữ thông tin sản phẩm theo từng danh mục
            $products_by_category = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $category = $row['Ten_DM'];
                // Nếu danh mục chưa tồn tại trong mảng, tạo một mục mới
                if (!isset($products_by_category[$category])) {
                    $products_by_category[$category] = array();
                }
                // Thêm thông tin sản phẩm vào mảng theo danh mục
                $products_by_category[$category][] = $row;
            }
            // Hiển thị sản phẩm theo từng danh mục
            foreach ($products_by_category as $category => $products) {
                echo '<div class="heading_container">';
                echo '<h2>'.$category.'</h2>';
                echo '</div>';
                echo '<div class="price_container">';
                // Biến đếm để giới hạn số lượng sản phẩm được hiển thị
                $product_count = 0;
                foreach ($products as $product) {
                    // Chỉ hiển thị tối đa số lượng sản phẩm được chỉ định
                    if ($product_count < $max_products_per_category) {
                        ?>
                        <div class="box">
                            <div class="name">
                                <h6><?php echo $product['Ten_SP']; ?></h6>
                            </div>
                            <div class="img-box">
                                <img src="<?php echo $product['HinhAnh_SP']; ?>" alt="">
                            </div>
                            <div class="detail-box">
                                <h5><span><?php echo number_format($product['Gia_SP']); ?>đ</span></h5>
                                <a href="chitiet.php?id=<?php echo $product['Ma_SP']; ?>">Mua Ngay</a>
                            </div>
                        </div>
                        <?php
                        // Tăng biến đếm sau mỗi sản phẩm được hiển thị
                        $product_count++;
                    } else {
                        // Nếu đã hiển thị đủ số lượng sản phẩm, thoát vòng lặp
                        break;
                    }
                }
                // Hiển thị nút "Xem thêm sản phẩm" dưới mỗi danh mục
                echo '<div class="d-flex justify-content-center">';
                echo '<div class="category_name_container">';
                echo '<a href="products.php?id='.$product['Ma_DM'].'" class="price_btn">Xem thêm '.$product['Ten_DM'].'</a>';

                echo '</div>';
                echo '</div>';
                echo '</div>';
                
            }
        } else {
            // Nếu không có sản phẩm nào phù hợp, hiển thị thông báo
            echo "Không có sản phẩm phù hợp.";
        }
        ?>
    </div>
</section>


<?php

?>




<!-- item section -->
<div class="container">
<h2 class="centered-heading golden-underline">Bộ sưu tập mới</h2>

    <div class="row justify-content-center">
        <div class="col-md-4">
            <section class="about_section layout_padding2-top layout_padding-bottom">
                <div class="img-box">
                    <img src="upload/banner7.jpg" alt="Hình ảnh cửa hàng 1" style="max-width: 100%; height: auto;">
                </div>
            </section>
        </div>
        <div class="col-md-4">
            <section class="about_section layout_padding2-top layout_padding-bottom">
                <div class="img-box">
                    <img src="upload/banner6.png" alt="Hình ảnh cửa hàng 2" style="max-width: 100%; height: auto;">
                </div>
            </section>
        </div>
        <div class="col-md-4">
            <section class="about_section layout_padding2-top layout_padding-bottom">
                <div class="img-box">
                    <img src="upload/banner5.jpg" alt="Hình ảnh cửa hàng 3" style="max-width: 100%; height: auto;">
                </div>
            </section>
        </div>
        
    </div>
</div>




  
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