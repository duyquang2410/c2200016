<?php


$nvname = $_POST["staff_name"];
$nvsdt = $_POST["staff_phone"];
$nvemail = $_POST["staff_email"];
$nvad = $_POST["staff_address"];

$nvpass = $_POST["staff_pass"];
$nvrepass = $_POST["staff_repass"];

$nvvaitro = $_POST["staff_vaitro"];
$nvbirth = date_create($_POST["staff_birth"]);




if($nvpass != $nvrepass){
  $message = "Mật khẩu nhập lại không đúng!";
  echo "<script type='text/javascript'>alert('$message');</script>";
  header('Refresh: 0;url=add_staff.php'); 
} else {

  require 'connect.php';

  $check = "select Ten_NV from NHANVIEN where Ten_NV = '".$nvname."'";
  $rs_check = $conn->query($check);
  if ($rs_check->num_rows > 0) {
    $message = "Tên đăng nhập đã được sử dụng, vui lòng dùng tên khác!";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header('Refresh: 0;url=add_staffs.php');

  } else 
  {
      $target_dir = "../assets/img/staff_img/";
      $target_file = $target_dir . basename($_FILES["staffImg"]["name"]);
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      $uploadOk = 1;
      
      // Check if image file is a actual image or fake image
      if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["staffImg"]["tmp_name"]);
        if($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
        } else {
          echo "File is not an image.";
          $uploadOk = 0;
        }
      }
      
      // Check if file already exists
      $new_name = basename($_FILES["staffImg"]["name"]);
      if (file_exists($target_file)){
          $count=1;
          $name = strtolower(pathinfo($new_name,PATHINFO_FILENAME));
          while(file_exists($target_file)){
              $new_name = "";
              $new_name = $name."-".$count.".".$imageFileType;
              $target_file = $target_dir.$new_name; 
              $count++;
              echo $count;
          }
      }
      
      
      // Check file size
      if ($_FILES["staffImg"]["size"] > 5000000) {
        echo "Dung lượng file quá lớn";
        $uploadOk = 0;
      }
      
   
      //Lấy id lớn nhất
      $sql = "select max(Ma_NV) as max_id from NHANVIEN";
      $result = $conn -> query($sql);
      if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $nv_max_id = $row["max_id"];
      }
      
      $nvid = $nv_max_id+1;
    //   if($nvvaitro == $_POST["staff_vaitro"]){

    //   }
      
      $nvid = $nv_max_id+1;

      $sql = "insert into NHANVIEN
              values ($nvid ,".$nvvaitro." ,'".$nvname."' ,'".$nvbirth->format('y-m-d')."' ,'".$nvsdt."','".$nvad."', '".$nvpass."','".$nvemail."')";
             
      
      if ($conn->query($sql) == TRUE) {
          $message = "Thêm nhân viên " .$nvname. " thành công";
          echo "<script type='text/javascript'>alert('$message');</script>";
          header('Refresh: 0;url=staffs.php');
      } else {
        echo "<br>Error: " . $sql . "<br>" . $conn->error;
      }
       
      $conn->close();
    } 
  } 
?>