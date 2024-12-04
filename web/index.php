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
    <link href="css/index.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
    <script src="navbar.js"></script>
  
  <style>
   .price_section .price_container .box .img-box img {
    width: 250px;
  }
  .img-box {
    float: left; /* Dịch chuyển hình ảnh sang trái */
    margin-right: 20px; /* Tạo khoảng cách giữa hình ảnh và phần nội dung */
}
.img-box img {
    max-width: 500px; /* Đặt kích thước tối đa cho hình ảnh */
    height: 90; /* Đảm bảo tỷ lệ khung hình bảo toàn */
}
.item_container {
    border-radius: 20px; 
    overflow: hidden; 
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
    line-height: 0.7;
    text-rendering: auto;
    padding-top: 14px;
    padding-left: none;
}




.icons a {
    margin-right: 29px; /* Khoảng cách giữa các phần tử */
}


   
    
    </style>

</head>
<body >
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
                                <a class="nav-link dropdown-toggle" href="products.php" id="navbarDropdown"
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
    <!-- slider section -->
    <section class=" slider_section position-relative">
      
      <div class="slider_number-container d-none d-md-block">
        <div class="number-box">
          
        </div>
      </div>
      <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail_box">
                    <h2>
                      <span> Bộ Sưu Tập Mới</span>
                      <hr>
                    </h2>
                    <h1>
                      Trang Sức
                    </h1>
                    <p>Khám phá những kiệt tác vàng mới nhất trong bộ sưu tập của chúng tôi. Từ những thiết kế thanh lịch và tinh tế đến những mẫu trang sức vô cùng sang trọng.</p>
        
                    <div>
                      <a href="jewellery1.php">Khám Phá Ngay</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="images/slider-img.png" alt="">
                  </div>
                </div>
              </div>
            </div>
      

          </div>
        </div>
      </div>

    </section>
    <!-- end slider section -->
  </div>


  

  <!-- end item section -->
 
  <!-- about section -->
  <div class="item_section layout_padding2">
    <div class="container">
    <h2>Sự lựa chọn hàng đầu</h2>
        <div id="bannerCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php
                // Kết nối cơ sở dữ liệu
                require_once "conn.php"; 

                // Thực hiện truy vấn SQL để lấy dữ liệu sản phẩm
                $sql = "SELECT * FROM danhmuc WHERE Ten_DM LIKE '%Trang%' OR Ten_DM LIKE '%Quà%' "; // Giả sử lấy tất cả sản phẩm

                // Thực hiện truy vấn
                $result = mysqli_query($conn, $sql);

                // Kiểm tra kết quả truy vấn và lặp qua từng dòng kết quả
                $count = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($count % 3 == 0) {
                       
                        $active_class = ($count == 0) ? 'active' : ''; // Xác định lớp active cho slide đầu tiên
                        echo '<div class="carousel-item ' . $active_class . '">';
                        echo '<div class="item_container d-flex flex-wrap">';
                    }
                    ?>
                    
                    <div class="box col-md-3"> <!-- Thêm class col-md-3 để mỗi sản phẩm chiếm 1/4 chiều rộng của container -->
                        <div class="price">
                            <h6></h6>
                        </div>
                        <h5><a href="products.php?id=<?php echo $row['Ma_DM']; ?>" style="color: black;"></h5>
                        <div class="img-box">
                            <img src="<?php echo $row['HinhAnh_DM']; ?>" alt="<?php echo $row['Ten_DM']; ?>">
                        </div>
                        <div class="name">
                            <h5><?php echo $row['Ten_DM']; ?></h5>
                        </div>
                    </div>
                    <?php
                    $count++;
                    if ($count % 3 == 0) {
                        
                        echo '</div>';
                        echo '</div>';
                    }
                }

                // Kiểm tra xem còn sản phẩm nào không
                if ($count % 3 != 0) {
                  
                    echo '</div>';
                    echo '</div>';
                }

                // Đóng kết nối
             
                ?>
            </div>

            <!-- Nút điều khiển trước -->
            <a class="carousel-control-prev" href="#bannerCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>

            <!-- Nút điều khiển sau -->
            <a class="carousel-control-next" href="#bannerCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>





  <!-- end about section -->

  <!-- price section -->

  <section class="price_section layout_padding">
    <div class="container">
        <div class="heading_container">
            <h2>Các sản phẩm đặc trưng</h2>
        </div>
        <div class="price_container">
            <?php
            // Thực hiện truy vấn SQL
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
                    WHERE sanpham.Ten_SP LIKE '%Vàng%' LIMIT 6";
            $result = mysqli_query($conn, $sql);

            // Kiểm tra kết quả truy vấn
            if ($result && mysqli_num_rows($result) > 0) {
                // Lặp qua từng dòng kết quả
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <div class="box">
                        <div class="name">
                            <h6><?php echo $row['Ten_SP']; ?></h6>
                        </div>
                        <div class="img-box">
                            <img src="<?php echo $row['HinhAnh_SP']; ?>" alt="">
                        </div>
                        <div class="detail-box">
                            <h5><span><?php echo number_format($row['Gia_SP']); ?>đ</span></h5>
                            <a href="chitiet.php?id=<?php echo $row['Ma_SP']; ?>">Mua Ngay</a>
                        </div>
                    </div>
            <?php
                }
            } else {
                // Hiển thị thông báo nếu không có sản phẩm
                echo "Không có sản phẩm nào được tìm thấy.";
            }
            
       
            ?>
        </div>
        <div class="d-flex justify-content-center">
            <a href="jewellery1.php" class="price_btn">Xem thêm</a>
        </div>
    </div>
</section>

  <!-- end price section --><div class="banner_section layout_padding">
   <div class="container-fluid">
    <div class="row">
        <div style="text-align: center; width: 100%;">
            <img src="upload/1.png" alt="Banner" style="height: auto; width: 100%; max-width: 100%; display: block; margin: 0 auto;">
        </div>
    </div>
</div>


  

<section class="ring_section layout_padding" style="padding-top: 20px;">
<h2 >Sản phẩm có thể bạn thích</h2>
<div class="container">
      <div class="ring_container layout_padding2">
        <div class="row">
            <div class="col-md-5">
                <div class="detail-box">
                    <h4>Đặc biệt</h4>
                    <p >Khám phá những sản phẩm đặc biệt, tinh tế  mà chúng tôi đề xuất dành riêng cho bạn. Từ những thiết kế ấn tượng đến các sản phẩm cổ điển, chúng tôi có một loạt các lựa chọn phong phú để bạn có thể lựa chọn.</p>

                    <a href="jewellery1.php">Mua ngay</a>
                </div>
            </div>
            <div class="col-md-7">
                <div class="img-box">
                    <img src="images/ring-img.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Thêm một phần để cuộn -->
<section class="ring_section layout_padding">

<h2>Thiết kế sang trọng</h2>
<div class="container">
   
   
    <section class="ring_section layout_padding">
        <div class="ring_container layout_padding2">
            <div class="row">
                <div class="col-md-5 order-md-2"> <!-- Thay đổi thứ tự hiển thị của cột để hình ảnh qua chữ -->
                    <div class="detail-box">
                        <h4>
                            độc đáo
                        </h4>
                        <p >Khám phá những thiết kế độc đáo và tinh tế của chúng tôi - một tập hợp các sản phẩm cao cấp được chọn lọc cẩn thận từ những nguyên liệu chất lượng nhất.</p>
                        <a href="jewellery1.php">
                            Mua ngay
                        </a>
                    </div>
                </div>
                <div class="col-md-7 order-md-1"> <!-- Thay đổi thứ tự hiển thị của cột để chữ qua hình ảnh -->
                    <div class="img-box">
                        <img src="upload/2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

  <div class="banner_section layout_padding">
    <div class="container-fluid">
        <div class="row">
            <div style="text-align: center; width: 100%;">
                <img src="upload/1.jpg" alt="Banner" style="height: auto; max-width: 100%; display: block; margin: 0 auto;">
            </div>
        </div>
    </div>
</div>


  <!-- end ring section -->

  <!-- client section -->
  
  

  

<section class="client_section">
    <div>
        <div class="text-center">
            <h2 style="margin-bottom: 0px;">Tin Tức</h2>
        </div>

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="client_container">
                        <div class="client-id">
                            <div class="img-box">
                                <img src="upload/tintuc.jpg" alt="">
                            </div>

                        </div>
                        <div class="detail-box">
                            <div class="name">
                                <h2>Quá trình kết tinh đá quý là gì & những lợi ích mà đá quý mang đến cho bạn</h2>
                                <h6></h6>
                            </div>
                            <p>
                                Đầu tiên, chúng ta cần hiểu kết tinh là gì. Đây là hiện tượng hóa cứng các phân tử hoặc
                                nguyên tử trong một chất tạo thành dạng tinh thể có cấu trúc cao hơn. Ngoài ra, kết tinh
                                còn được biết là kỹ thuật dùng để tách chất lỏng với rắn. Điều này có nghĩa là dung
                                dịch ở trạng thái lỏng sang rắn và ở dạng tinh thể. Có rất nhiều cách để có được
                                tinh thể: kết tủa trong dung dịch, sự lắng đọng của chất khí hoặc đông đặc của chất.
                                Sự kết tinh xuất hiện còn phụ thuộc vào một số yếu tố như: áp suất không khí, nhiệt
                                độ và thời điểm. Một sự thật thú vị rằng, các loại đá quý được kết tinh ở các hệ
                                tinh thể khác nhau; đây cũng là đặc điểm để chúng ta phân biệt được khoáng vật này
                                với khoáng vật khác. Các hệ tinh thể bao gồm: lập phương, 4 phương, 3 phương, trục
                                thoi, một nghiêng và tinh hệ 3 nghiêng.<a
                                    href="https://www.pnj.com.vn/blog/qua-trinh-ket-tinh-da-quy-la-gi-nhung-loi-ich-ma-da-quy-mang-den-cho-ban/"> Đọc
                                    thêm</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
    <div class="client_container">
        <div class="client-id">
            <div class="img-box" style="max-width: 450px;">
                <img src="upload/tintucb.jpg" alt="">
            </div>
        </div>
        <div class="detail-box">
            <div class="name">
                <h2>Kim cương rời là gì? Có nên mua kim cương rời tại cửa hàng ?</h2>
                <h6></h6>
            </div>
            <p>
                Theo như nhiều chia sẻ, kim cương rời là những viên kim cương không được gắn lên sản phẩm, không có giấy tờ chứng minh nguồn gốc xuất xứ và không có giấy kiểm định. Hiểu thêm một cách khác, đây là dòng sản phẩm được khai thác từ thiên nhiên và được nhập về bán nhưng không có một đơn vị nào thẩm định. Với những lý do trên, kim cương rời thường có chi phí thấp hơn. <a href="https://www.pnj.com.vn/blog/kim-cuong-roi-la-gi-co-nen-mua-kim-cuong-roi-tai-pnj/"> Đọc thêm</a>
            </p>
        </div>
    </div>
</div>
<div class="carousel-item">
    <div class="client_container">
        <div class="client-id">
            <div class="img-box" style="max-width: 450px;">
                <img src="upload/tinb.jpg" alt="">
            </div>
        </div>
        <div class="detail-box">
            <div class="name">
                <h2>Hiểu về đá Morganite – viên đá đẹp đến nao lòng</h2>
            </div>
            <p>
                Năm 1910, Morganite lần đầu được tìm thấy tại khu vực Madagascar và được gọi là Pink Beryl. Không lâu sau đó, viên đá ánh hồng được đổi tên thành Morganite – cái tên gắn liền với JP Morgan, một nhà tài chính nổi tiếng có sở thích sưu tập đá quý. Điều khiến viên đá này được yêu mến rộng rãi chính là vẻ đẹp tinh khôi, ngọt ngào và tinh tế mà khó có thể miêu tả bằng lời. Dancing Stone – Đá Nhảy: Viên đá kỳ diệu trong ngành kim hoàn. <a href="https://www.pnj.com.vn/blog/hieu-ve-da-morganite-vien-da-dep-den-nao-long/"> Đọc thêm</a>
            </p>
        </div>
    </div>
</div>

          
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
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