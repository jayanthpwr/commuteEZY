<?php
date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');
include('../connect.php');
extract($_POST);

   $sql = "INSERT INTO `route`( `start`, `end`, `astatus`)  VALUES ('$from','$to','$astatus')";
 if ($conn->query($sql) === TRUE) {
      $_SESSION['success']=' Record Successfully Added';
     ?>
          <script>alert(' Route Inserted Successfully');</script>

<script type="text/javascript">
window.location="../view_route.php";
</script>
<?php
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="../view_route.php";
</script>
<?php } ?>



