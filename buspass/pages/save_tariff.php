<?php
date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');
include('../connect.php');
extract($_POST);

   $sql = "INSERT INTO `tariff`( `route`, `stopfromto`, `monthly`, `quartly`, `halfyearly`, `yearly`)  VALUES ('$route','$stopfromto','$monthly','$quartly','$halfyearly','$yearly')";
 if ($conn->query($sql) === TRUE) {
      $_SESSION['success']=' Record Successfully Added';
     ?>
          <script>alert(' Record Successfully Added');</script>

<script type="text/javascript">
window.location="../view_tariff.php";
</script>
<?php
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="../view_tariff.php";
</script>
<?php } ?>



