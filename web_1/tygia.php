<?php
// Hàm để tải và phân tích dữ liệu từ URL XML
function fetchAndParseXML($xmlUrl) {
    if (empty($xmlUrl)) {
        // Xử lý nếu đường dẫn rỗng
        return null;
    }
    
    // Thực hiện tải dữ liệu từ URL XML
    $content = @file_get_contents($xmlUrl);
    
    // Kiểm tra xem liệu dữ liệu có được tải thành công hay không
    if ($content !== false) {
        // Phân tích XML thành đối tượng SimpleXML
        $xml = simplexml_load_string($content);
        return $xml; // Trả về đối tượng SimpleXML
    } else {
        // Xử lý lỗi nếu không thể tải được dữ liệu
        return null;
    }
}

// Gọi hàm để tải dữ liệu từ URL XML
$xmlUrl = 'tygiavang.xml'; // Đường dẫn tương đối đến file XML
$data = fetchAndParseXML($xmlUrl);
?>


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
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
    <script src="navbar.js"></script>

    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

h2 {
    text-align: center;
}

table {
    width: 100%;
    border-collapse: collapse;
   
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 10px;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #ddd;
}

tr:first-child {
    background-color: #ffc107;
    font-weight: bold;
}

td:first-child {
    text-transform: capitalize;
}

td:nth-child(2), td:nth-child(3), td:nth-child(4) {
    text-align: left;
}

@media screen and (max-width: 600px) {
    table {
        border: 0;
    }

    table thead {
        display: none;
    }

    table tr {
        margin-bottom: 10px;
        display: block;
        border: 1px solid #ddd;
    }

    table td {
        display: block;
        text-align: right;
    }

    table td:nth-child(1) {
        background-color: #ffc107;
        font-weight: bold;
    }
}
.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
    margin-top: 0;
    margin-bottom: .5rem;
    font-weight: 500;
    line-height: 3;
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

    <h2>Tỷ giá vàng</h2>
    <table border="1">
        <tr bgcolor="yellow">
            <td>Thành phố</td>
            <td>Type</td>
            <td>Sell</td>
            <td>Buy</td>
        </tr>

        <?php if ($data): ?>
            <?php foreach ($data->ratelist->city as $city): ?>
                <?php $items = $city->item; ?>
                <tr>
                    <td rowspan="<?php echo count($items) + 1 ?>"><?php echo $city['name']; ?></td>
                    <td><?php echo $items[0]['type']; ?></td>
                    <td><?php echo $items[0]['sell']; ?></td>
                    <td><?php echo $items[0]['buy']; ?></td>
                </tr>
                
                <?php for ($i = 1; $i < count($items); $i++): ?>
                    <tr>
                        <td><?php echo $items[$i]['type']; ?></td>
                        <td><?php echo $items[$i]['sell']; ?></td>
                        <td><?php echo $items[$i]['buy']; ?></td>
                    </tr>
                <?php endfor; ?>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">Không có dữ liệu</td>
            </tr>
        <?php endif; ?>
    </table>

    

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
