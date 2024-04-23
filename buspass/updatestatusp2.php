
 <?php
 include('connect.php');

 date_default_timezone_set('Asia/Kolkata');
 $current_date = date('Y-m-d');


$q1="UPDATE `applypass` SET `request`='0'  WHERE `id`='".$_GET['id']."'";
   
    if ($conn->query($q1) === TRUE) {
      $_SESSION['success']=' Record Successfully Updated';
     ?>
<script type="text/javascript">
window.location="renewalforpass.php";
</script>
<?php
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="renewalforpass.php";
</script>
<?php


}
?>
