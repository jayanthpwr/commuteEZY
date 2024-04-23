
<?php
date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');
include('../connect.php');
$passw = hash('sha256', $_POST['password']);
function createSalt()
{
    return '2123293dsj2hu2nikhiljdsd';
}
$salt = createSalt();
$pass = hash('sha256', $salt . $passw);
extract($_POST);
 $target_dir = "../uploadImage/student/";
  $image1 = basename($_FILES["image"]["name"]);
  if($_FILES["image"]["tmp_name"]!=''){
    $image = $target_dir . basename($_FILES["image"]["name"]);
   if (move_uploaded_file($_FILES["image"]["tmp_name"], $image)) {
    
       @unlink("../uploadImage/student/".$_POST['old_image']);
    
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
  
  }
  else {
     $image1 =$_POST['old_image'];
  }
  $target_dir = "../uploadImage/student/";
  $image2 = basename($_FILES["image2"]["name"]);
  if($_FILES["image2"]["tmp_name"]!=''){
    $image = $target_dir . basename($_FILES["image2"]["name"]);
   if (move_uploaded_file($_FILES["image2"]["tmp_name"], $image)) {
    
       @unlink("../uploadImage/student/".$_POST['old_image']);
    
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
  
  }
  else {
     $image1 =$_POST['old_image'];
  }
  $imagenew='1.png';

  

	$sql = "INSERT INTO `tbl_student`(`stud_id`,`sfname`, `slname`, `semail`,`password`, `sgender`, `sdob`, `scontact`, `saddress`,`regno`,`session`,`image1`,`image2`,`image`) VALUES ('$stud_id','$sfname', '$slname',  '$semail','$pass', '$sgender', '$sdob', '$scontact', '$saddress', '$regno', '$sessionn','$image1','$image2','$imagenew')";
	if ($conn->query($sql) === TRUE) {
      $_SESSION['success']=' Record Successfully Added';
     ?>
          <script>alert(' Record Inserted Successfully');</script>

<script type="text/javascript">
window.location="../view_student.php";
</script>
<?php
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="../view_student.php";
</script>
<?php } ?>


 