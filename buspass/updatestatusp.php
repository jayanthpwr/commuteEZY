
 <?php
 include('connect.php');

 date_default_timezone_set('Asia/Kolkata');
 $current_date = date('Y-m-d');
$que="SELECT * FROM `applypass` WHERE `id`='".$_GET['id']."'";

$result = $conn->query($que);
$record = $result->fetch_assoc();
$duration=explode('-',$record['durationfees']);
if($duration[0]=='Monthly')
{
	$start_date=date('Y-m-d');
	$end_date=date('Y-m-d',strtotime('+30 day'));
}
else if($duration[0]=='Half Yearly')
{
	$start_date=date('Y-m-d');
	$end_date=date('Y-m-d',strtotime('+180 day'));
}
else if($duration[0]=='Quarterly')
{
	$start_date=date('Y-m-d');
	$end_date=date('Y-m-d',strtotime('+90 day'));
}
else if($duration[0]=='Yearly')
{
	$start_date=date('Y-m-d');
	$end_date=date('Y-m-d',strtotime('+365 day'));
}


 $q1="UPDATE `applypass` SET `request`='1',startdate='".$start_date."',enddate='".$end_date."'  WHERE `id`='".$_GET['id']."'"; 
   
    if ($conn->query($q1) === TRUE) {
      $_SESSION['success']=' Record Successfully Updated';
     ?>
<script type="text/javascript">
window.location="viewrequest.php";
</script>
<?php
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="viewapprovedlist.php";
</script>
<?php


}
?>
