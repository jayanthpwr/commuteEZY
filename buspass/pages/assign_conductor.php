<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');
include('../connect.php');

extract($_POST);
$sid=$_SESSION["id"];
$c1 = "SELECT * FROM `tbl_assign_conductor` where conductor='".$conductor."' ";
$result = mysqli_query($conn,$c1);
    $row  = mysqli_fetch_array($result);
         $count=mysqli_num_rows($result);

                                                            if ($count==0) {

   $sql = "INSERT INTO `tbl_assign_conductor`(`conductor`, `bus_no`, `user_id`)  VALUES ('$conductor','$bus_no','$sid')";
$result=$conn->query($sql);

 
      $_SESSION['success']=' Record Successfully Added';
     ?>
          <script>alert(' Assign Conductor Successfully');</script>

<script type="text/javascript">
window.location="../view_assign_conductor.php";
</script>
<?php
} else {
      //$_SESSION['error']='Something Went Wrong';
?>
          <script>alert(' This Conductor already assigned !');</script>

<script type="text/javascript">
window.location="../view_assign_conductor.php";
</script>
<?php } ?>



