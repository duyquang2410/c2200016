
<?php
    $db="";
    $hd="";
    $dh="";
    $kh="";
    $nv="";
    $tnv="";
    $nh="";
    $dvvc="";
    $dvc="";
    $sp="";
    $tsp="";
    $dg="";
    $tt="";
    $tttk="";
    $dm="";
    switch ($active){
        case 'db':
            $db = "active bg-gradient-primary";
            break;
        case 'hd':
            $hd = "active bg-gradient-primary";
            break;
        case 'dh':
            $dh = "active bg-gradient-primary";
            break;
        case 'kh':
            $kh = "active bg-gradient-primary";
            break;
        case 'nv':
            $nv = "active bg-gradient-primary";
            break;
        case 'tnv':
            $tnv = "active bg-gradient-primary";
            break;
        case 'nh':
            $nh = "active bg-gradient-primary";
            break;
        case 'dvvc':
            $dvvc = "active bg-gradient-primary";
            break;
        case 'dvc':
            $dvc = "active bg-gradient-primary";
            break;
        case 'sp':
            $sp = "active bg-gradient-primary";
            break;
        case 'tsp':
            $tsp = "active bg-gradient-primary";
            break;
        case 'dg':
            $dg = "active bg-gradient-primary";
            break;
        case 'tt':
            $tt = "active bg-gradient-primary";
            break;
        case 'tttk':
            $tttk = "active bg-gradient-primary";
            break;
        case 'dm':
            $dm= "active bg-gradient-primary";
            break;
    }
?>


<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3  bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
       <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i> 
      <a class="navbar-brand m-0" href="../admin/dashboard.php" target="_blank">
        <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">Cửa hàng Hoàn kim</span>
      </a>
    </div>
     <hr class="horizontal light mt-0 mb-2">
     <!-- <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">  -->
      <ul class="navbar-nav">
			<li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6" style="color: white;">Tổng quan</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?php echo $db ?>" href="../admin/dashboard.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10"></i>
            </div>
          
          </a>
        </li>
				<li class="nav-item">
          <a class="nav-link text-white <?php echo $kh ?>" href="../admin/custommer.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Khách hàng</span>
          </a>
        </li>
				<li class="nav-item">
          <a class="nav-link text-white <?php echo $dh ?>" href="../admin/product_waits.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Đơn hàng</span>
          </a>
        </li>
				<li class="nav-item">
          <a class="nav-link text-white <?php echo $hd ?>" href="../admin/billing.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Hóa đơn</span>
          </a>
        </li>
				<li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6" style="color: white;">Quản lý sản phẩm</h6>
        </li>
				<li class="nav-item">
          <a class="nav-link text-white  <?php echo $sp ?>" href="../admin/products.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Sản phẩm</span>
          </a>
        </li>

				<li class="nav-item">
          <a class="nav-link text-white  <?php echo $tsp ?>" href="../admin/add_products.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Thêm sản phẩm mới</span>
          </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link text-white  <?php echo $dm ?>" href="../admin/categorys.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Danh mục</span>
          </a>
        </li>
        
			
				<li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6" style="color: white;">Quản lý nhân viên</h6>
        </li>
				<li class="nav-item">
          <a class="nav-link text-white  <?php echo $nv ?>" href="../admin/staffs.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Nhân viên</span>
          </a>
        </li>
				<li class="nav-item">
          <a class="nav-link text-white  <?php echo $tnv ?>" href="../admin/add_staffs.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Thêm nhân viên</span>
          </a>
        </li>

				<li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6" style="color: white;">Quản lý đối tác</h6>
        </li>
				<li class="nav-item">
          <a class="nav-link text-white  <?php echo $nh ?>" href="../admin/source.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Nguồn hàng</span>
          </a>
        </li>
				

			

        
      </ul>
    </div>
   
  </aside>

  
