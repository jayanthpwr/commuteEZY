
<?php include('head.php');?>

<?php include('header.php');?>
<?php include('sidebar.php');?>

 <?php
 include('connect.php');
 date_default_timezone_set('Asia/Kolkata');
 $current_date = date('Y-m-d');
if(isset($_POST["btn_update"]))
{
    extract($_POST);
    $q1="UPDATE `tariff` SET `stopfromto`='$stopfromto',`monthly`='$monthly',`quartly`='$quartly',`halfyearly`='$halfyearly',`yearly`='$yearly'  WHERE `id`='".$_GET['id']."'";
   
    if ($conn->query($q1) === TRUE) {
      $_SESSION['success']=' Record Successfully Updated';
     ?>
<script type="text/javascript">
window.location="view_tariff.php";
</script>
<?php
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="view_tariff.php";
</script>
<?php
}

}
?>

<?php
$que="SELECT * from `tariff` WHERE id='".$_GET["id"]."'";
$query=$conn->query($que);
while($row=mysqli_fetch_array($query))
{
 
    extract($row);
$fname = $row['classname'];

}

?> 

        <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Tariff Management</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Edit Tariff Management</li>
                    </ol>
                </div>
            </div>
          
            <div class="container-fluid">
               
                
             
                <div class="row">
                    <div class="col-lg-8" style="    margin-left: 10%;">
                        <div class="card">
                           
                            <div class="card-body">
                                <div class="input-states">
                                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" name="classform">

                                   <input type="hidden" name="currnt_date" class="form-control" value="<?php echo $currnt_date;?>">
<?php $que1="SELECT * from `route` WHERE id='".$route."'";
$query1=$conn->query($que1);
$row1=mysqli_fetch_array($query1); ?>
                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Route</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="" class="form-control" placeholder="From" id="event"  required="" value="<?php echo $row1['start'].'-'.$row1['end']; ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">StopFromTo</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="stopfromto" class="form-control" placeholder="To" id="event"  required="" value="<?php echo $stopfromto; ?>" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Monthly</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="monthly" class="form-control" placeholder="To" id="event"  required="" value="<?php echo $monthly; ?>" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Quarterly</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="quartly" class="form-control" placeholder="To" id="event"  required="" value="<?php echo $quartly; ?>" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Half Yearly</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="halfyearly" class="form-control" placeholder="To" id="event"  required="" value="<?php echo $halfyearly; ?>" >
                                                </div>
                                            </div>
                                        </div>
<div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label"> Yearly</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="yearly" class="form-control" placeholder="To" id="event"  required="" value="<?php echo $yearly; ?>" >
                                                </div>
                                            </div>
                                        </div>
                                       


                                       

                                         <button type="submit" name="btn_update" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
              
<?php include('footer.php');?> 