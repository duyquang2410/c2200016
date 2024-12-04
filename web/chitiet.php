<?php 
// Gắn kết nối tới cơ sở dữ liệu
require_once "conn.php"; // Đường dẫn tới file kết nối
require_once "cay_menu.php"; 
$css_path = "css/chitiet1.css";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- slider stylesheet -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $css_path; ?>">
    <link rel="stylesheet" type="text/css" href="css/sina-nav.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan|Poppins:400,600,700&display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style1.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
    <script src="navbar.js"></script>

  


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
               
                <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="category.php" id="navbarDropdown" role="button"
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
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>

  <?php
// Kiểm tra xem 'id' đã được truyền trong URL và có giá trị không
if (isset($_GET['id'])) {
    $sp_id = $_GET['id'];

    // Thực hiện truy vấn để lấy thông tin về sản phẩm được chọn
    $sql_sp = "SELECT sanpham.*, danhmuc.Ma_DM, danhmuc.Ten_DM
                FROM sanpham 
                INNER JOIN danhmuc ON sanpham.Ma_DM = danhmuc.Ma_DM
                WHERE sanpham.Ma_SP = $sp_id";
    $result_sp = mysqli_query($conn, $sql_sp);

    // Kiểm tra xem có dòng nào trả về không
    if (mysqli_num_rows($result_sp) > 0) {
        $sp = mysqli_fetch_assoc($result_sp);

        // Lấy thông tin số lượng sản phẩm còn lại
        $remaining_quantity = $sp['soluong_sp'];

        // Thực hiện truy vấn SQL để lấy thông tin chi tiết sản phẩm từ cơ sở dữ liệu với id nhận được
        $sql = "SELECT 
                    sanpham.Ma_SP, 
                    sanpham.HinhAnh_SP, 
                    sanpham.Ten_SP, 
                    sanpham.TrongLuong_Sp, 
                    sanpham.MoTa_SP, 
                    sanpham.soluong_sp,
                    don_gia.gia, 
                    danhmuc.Ten_DM, 
                    chatlieu.Loai_CL 
                FROM 
                    sanpham 
                JOIN 
                    don_gia ON sanpham.Ma_SP = don_gia.Ma_SP 
                JOIN 
                    danhmuc ON sanpham.Ma_DM = danhmuc.Ma_DM 
                JOIN 
                    chitietchatlieu ON sanpham.Ma_SP = chitietchatlieu.Ma_SP 
                JOIN 
                    chatlieu ON chitietchatlieu.Ma_CL = chatlieu.Ma_CL
                WHERE sanpham.Ma_SP = $sp_id";
        $result = mysqli_query($conn, $sql);

        // Kiểm tra xem có dòng nào trả về không
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            // Hiển thị sản phẩm và kiểm tra số lượng
            ?>
            <section>
                <div class="container flex">
                    <!-- Hiển thị thông tin sản phẩm -->
                    <div class="left">
                        <div class="main_image">
                            <!-- Đặt một liên kết xung quanh ảnh sản phẩm chính để nhấp vào sẽ chuyển đến chi tiết sản phẩm -->
                            <a href="chitiet_sp.php?id=<?php echo $sp_id; ?>">
                                <img src="<?php echo $row['HinhAnh_SP']; ?>" class="slide" width="100%">
                            </a>
                        </div>
                    </div>

                    <div class="right">
                        <h3><?php echo $row['Ten_SP']; ?></h3>
                        <p class="description"><?php echo $row['MoTa_SP']; ?></p>
                        <h5>Trọng Lượng: <span class="trongluong"><?php echo $row['TrongLuong_Sp']; ?> g</span></h5>
                        <h5>Chất Liệu: <span class="chatlieu"><?php echo $row['Loai_CL']; ?></span></h5>
                        <h5>Danh Mục: <span class="danhmuc"> <?php echo $row['Ten_DM']; ?></span> </h5>
                        <h5>Giá: <span class="gia"><?php echo number_format($row['gia']); ?> VND </span></h5>
                        <div class="product-in-stock">
                            <h5>Còn lại: <span><?php echo $row["soluong_sp"]; ?></span></h5>
                        </div>
                        
                        <!-- Form để thêm sản phẩm vào giỏ hàng -->
                        <form action="add_cart.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $sp_id; ?>">
    <label for="quantity" require >Số lượng:</label>
    <input type="number" name="quantity" id="quantity" min="1" value="1" max="<?php echo $remaining_quantity; ?>" required>
    <a id="addToCartBtn" href="add_cart.php?id=<?php echo $sp_id; ?>&quantity=" class="btn btn-primary">Thêm vào giỏ hàng</a>
</form>

                    </div>
                </div>
            </section>
            <?php
        } else {
            echo "Không có thông tin chi tiết sản phẩm.";
        }
    } else {
        echo "Không tìm thấy sản phẩm với ID này.";
    }
} else {
    echo "ID sản phẩm không được cung cấp.";
}
?>

 
 <?php
// Kiểm tra nếu đã được chọn một danh mục cụ thể
if(isset($_GET['id'])) {
    $category_id = $_GET['id'];

    // Truy vấn để lấy danh mục sản phẩm dựa trên id
    $sql_category = "SELECT Ma_DM FROM sanpham WHERE Ma_SP = $category_id";
    $result_category = mysqli_query($conn, $sql_category);
    $category_id_row = mysqli_fetch_assoc($result_category);
    $category_id = $category_id_row['Ma_DM'];

    // Truy vấn để lấy tên danh mục dựa trên id danh mục
    $sql_category_name = "SELECT Ten_DM FROM danhmuc WHERE Ma_DM = $category_id";
    $result_category_name = mysqli_query($conn, $sql_category_name);
    $category_name_row = mysqli_fetch_assoc($result_category_name);
    $category_name = $category_name_row['Ten_DM'];

    // Truy vấn để lấy sản phẩm trong danh mục (loại bỏ sản phẩm hiện tại)
    $sql_products = "SELECT sanpham.Ma_SP, 
    sanpham.HinhAnh_SP, 
    sanpham.Ten_SP, 
    sanpham.TrongLuong_Sp, 
    sanpham.MoTa_SP, don_gia.gia 
    FROM sanpham  
    JOIN don_gia ON sanpham.Ma_SP = don_gia.Ma_SP 
    WHERE sanpham.Ma_DM = $category_id AND sanpham.Ma_SP != $sp_id"; // Loại bỏ sản phẩm hiện tại
    $result_products = mysqli_query($conn, $sql_products);
?>

<section class="price_section layout_padding">
    <div class="container">
        <div>
            <h2><?php echo $category_name_row['Ten_DM']; ?></h2>
            <!-- Hiển thị tên danh mục -->
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
                            <h6><?php echo $row['Ten_SP']; ?></h6>
                        </div>
                        <div class="img-box">
                            <img src="<?php echo $row['HinhAnh_SP']; ?>" alt="">
                        </div>
                        <div class="detail-box">
                            <h5><span><?php echo number_format($row['gia']); ?></span></h5> <!-- Hiển thị giá của sản phẩm từ bảng đơn giá -->
                            <a href="chitiet.php?id=<?php echo $row['Ma_SP']; ?>">Mua Ngay</a> <!-- Điều hướng đến trang chi tiết sản phẩm với mã sản phẩm -->
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

<?php
}
?>

<script>
    // Khai báo biến JavaScript để lưu trữ giá trị của $sp_id
    var spId = <?php echo json_encode($sp_id); ?>;

    document.addEventListener("DOMContentLoaded", function() {
        var quantityInput = document.getElementById("quantity");
        var addToCartBtn = document.getElementById("addToCartBtn");

        // Xử lý sự kiện khi người dùng thay đổi số lượng
        quantityInput.addEventListener("input", function() {
            updateAddToCartUrl();
        });

        // Hàm cập nhật URL của nút "Thêm vào giỏ hàng" dựa trên số lượng sản phẩm
        function updateAddToCartUrl() {
            var quantity = quantityInput.value;
            addToCartBtn.href = "add_cart.php?id=" + spId + "&quantity=" + quantity;
        }

        // Gọi hàm cập nhật URL khi trang được tải
        updateAddToCartUrl();
    });
</script>

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
  <script>
    // Khai báo biến JavaScript để lưu trữ giá trị của $sp_id
    var spId = <?php echo json_encode($sp_id); ?>;

    document.addEventListener("DOMContentLoaded", function() {
        var minusBtn = document.getElementById("minus");
        var plusBtn = document.getElementById("plus");
        var quantityLabel = document.getElementById("quantity");

        // Xử lý sự kiện khi người dùng click nút trừ
        minusBtn.addEventListener("click", function() {
            var currentQuantity = parseInt(quantityLabel.textContent);
            if (currentQuantity > 1) {
                quantityLabel.textContent = (currentQuantity - 1).toString();
                updateAddToCartUrl();
            }
        });

        // Xử lý sự kiện khi người dùng click nút cộng
        plusBtn.addEventListener("click", function() {
            var currentQuantity = parseInt(quantityLabel.textContent);
            quantityLabel.textContent = (currentQuantity + 1).toString();
            updateAddToCartUrl();
        });

        // Hàm cập nhật URL của nút "Thêm vào giỏ hàng" dựa trên số lượng sản phẩm
        function updateAddToCartUrl() {
            var addToCartBtn = document.getElementById("addToCartBtn");
            var quantity = document.getElementById("quantity").textContent;
            addToCartBtn.href = "add_cart.php?id=" + spId + "&quantity=" + quantity;
        }

        // Gọi hàm cập nhật URL khi trang được tải
        updateAddToCartUrl();
    });
</script>

</body>

</html>
