<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');
include('../connect.php');

extract($_POST);
$sid=$_SESSION["id"];
   $sql = "INSERT INTO `tbl_feedback`(`student_id`, `subject`, `feedback`)  VALUES ('$sid','$subject','$feedback')";

 if ($conn->query($sql) === TRUE) {
      $_SESSION['success']=' Record Successfully Added';
     ?>
          <script>alert('Feedback Added Successfully');</script>

<script type="text/javascript">
window.location="../feedback.php";
</script>
<?php
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="../feedback.php";
</script>
<?php } ?>



