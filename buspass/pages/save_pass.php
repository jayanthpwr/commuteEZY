<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');
include('../connect.php');

extract($_POST);
$sid=$_SESSION["id"];
   $sql = "INSERT INTO `applypass`( `studentid`,`route`, `stopfromto`, `durationfees`)  VALUES ('$sid','$route','$stopfromto','$df')";

 if ($conn->query($sql) === TRUE) {
      $_SESSION['success']=' Record Successfully Added';
     ?>
          <script>alert(' Apply For Pass Successfully');</script>

<script type="text/javascript">
window.location="../view_pass.php";
</script>
<?php
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="../view_pass.php";
</script>
<?php } ?>



