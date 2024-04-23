
<?php include('head.php');?>
<?php include('header1.php');?>

<?php include('sidebar.php');?>   
<?php
 date_default_timezone_set('Asia/Kolkata');
 $current_date = date('Y-m-d');

 $sql_currency = "select * from manage_website"; 
             $result_currency = $conn->query($sql_currency);
             $row_currency = mysqli_fetch_array($result_currency);


if(isset($_POST['update']))
             {
                extract($_POST);
                      echo$q1="UPDATE `tbl_timetable` SET  `status`='$status' WHERE `id`='".$_GET['id']."'";
                   if ($conn->query($q1) === TRUE) {
      $_SESSION['success']=' Record Successfully Updated';
     ?>
               <script>alert(' Updated Successfully');</script>

<script type="text/javascript">
window.location="view_timetable.php";
</script>
<?php
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="view_timetable.php";
</script>
<?php
}
}
?>
<?php
$que="SELECT * FROM `tbl_timetable` WHERE id='".$_GET["id"]."'";
$query=$conn->query($que);
while($row=mysqli_fetch_array($query))
{
    
    extract($row);
}

?> 

        <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Update Timetable</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Update Timetable</li>
                    </ol>
                </div>
            </div>
            
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-lg-8" style="    margin-left: 10%;">
                        <div class="card">
                            <div class="card-title">
                               
                            </div>
                            <div class="card-body">
                                <div class="input-states">
                                    <form class="form-horizontal" method="POST" action="" name="studentform" enctype="multipart/form-data">

                                   <input type="hidden" name="currnt_date" class="form-control" value="<?php echo $currnt_date;?>">
                                   <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Bus No:</label>
                                                <div class="col-sm-9">
                                          <input type="text" name="" class="form-control" value="<?php echo $bus_no;?>" readonly>
  </div>
                                            </div>
                                        </div>

                                        
<div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Route</label>
                                                <div class="col-sm-9">
                                                <select type="text" name="route[]" class="form-control"  id="class_id" placeholder="Class" required="" readonly>
                                                        <option value="">--Select Route--</option>
                                                            <?php  
                                                            $c1 = "SELECT * FROM `route`";
                                                            $result = $conn->query($c1);

                                                            if ($result->num_rows > 0) {
                                                                while ($row = mysqli_fetch_array($result)) {?>
                                                                    <option value="<?php echo $row["id"];?>"<?php if($route==$row['id']){ echo "selected"; }?>>
                                                                        <?php echo $row['start'].'-'.$row['end'];?>
                                                                    </option>
                                                                    <?php
                                                                }
                                                            } else {
                                                            echo "0 results";
                                                                }
                                                            ?>
                                                    </select>
                                                                    
                         
   </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Time</label>
                                                <div class="col-sm-9">
                                                <input type="text" name="currnt_date" class="form-control" value="<?php echo $time;?>" placholder="Time" readonly>
  </div>
                                            </div>
                                        </div>

                                        
<div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Status:</label>
                                                <div class="col-sm-9">
                                           <select type="text" name="status" class="form-control" value="">
                                            <option value="Active" <?php if($status=="Active"){ echo "selected"; }?>>Active</option>
                                            <option value="Deactive" <?php if($status=="Deactive"){ echo "selected"; }?>>Deactive</option>
                                           </select>
   </div>
                                            </div>
                                        </div>

                                        

  
 
                                          
                                        <button type="submit" name="update" class="btn btn-sucess btn-flat m-b-30 m-t-30" id="0">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>

<?php include('footer.php');?>
<script>
  var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'NOT Matching';
  }
}
</script>
<script type="text/javascript">1
 $('#class_id').change(function(){
    var class_capacity=$('#class_id').find(':selected').attr('data-capacity');
    $('#class_capacity').val(class_capacity);
    $("#subject_id").val('');
    $("#subject_id").children('option').hide();
    var class_id=$(this).val();
    $("#subject_id").children("option[data-id="+class_id+ "]").show();
    
  });
</script>
<script type="text/javascript">
 $('#subject_id').change(function(){
    $("#exam_id").val('');
    $("#exam_id").children('option').hide();
    var subject_id=$(this).val();
    $("#exam_id").children("option[data-id="+subject_id+ "]").show();

    
  });

</script>