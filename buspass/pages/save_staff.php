
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
 $target_dir = "../uploadImage/conductor/";
  $image1 = basename($_FILES["image"]["name"]);
  if($_FILES["image"]["tmp_name"]!=''){
    $image = $target_dir . basename($_FILES["image"]["name"]);
   if (move_uploaded_file($_FILES["image"]["tmp_name"], $image)) {
    
       @unlink("../uploadImage/conductor/".$_POST['old_image']);
    
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
  
  }
  else {
     $image1 =$_POST['old_image'];
  }
  	$sql = "INSERT INTO `tbl_staff`(`fname`, `lname`, `email`, `password`, `gender`, `dob`, `contact`, `address`, `image`) VALUES ('$fname', '$lname',  '$email','$pass', '$gender', '$dob', '$contact', '$address','$image1')";
	if ($conn->query($sql) === TRUE) {
      $_SESSION['success']=' Record Successfully Added';
     ?>
          <script>alert(' Record Inserted Successfully');</script>

<script type="text/javascript">
window.location="../view_staff.php";
</script>
<?php
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="../view_staff.php";
</script>
<?php } ?>


 