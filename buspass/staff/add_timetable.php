
<?php include('head.php');?>
<?php include('header1.php');?>

<?php include('sidebar.php');?>   
<?php
 date_default_timezone_set('Asia/Kolkata');
 $current_date = date('Y-m-d');

 $sql_currency = "select * from manage_website"; 
             $result_currency = $conn->query($sql_currency);
             $row_currency = mysqli_fetch_array($result_currency);
?> 
<?php if(isset($_POST['save']))
             {
//echo "string";
//echo$service = mysqli_num_rows($_POST['route']);
 extract($_POST); 

$checkbox1=$_POST['route'];  
$chk="";  
    foreach($_POST['route'] as $row => $value)          
   {  
     // $chk .= $chk1;  
     $c1 = "SELECT * FROM `tbl_timetable` where time='".$time[$row]."' and  route='".$route[$row]."' ";
$result = mysqli_query($conn,$c1);
    $row1 = mysqli_fetch_array($result);
         $count=mysqli_num_rows($result);

                                                            if ($count==0) {



    // extract($_POST);
  $sql = "INSERT INTO `tbl_timetable`(`bus_no`, `route`, `time`, `status`, `user_id`) VALUES ('$bus_no','$route[$row]','$time[$row]','$status','".$_SESSION['id']."')";
      $conn->query($sql);
      $_SESSION['success']=' Record Successfully Added';
     ?>
               <script>alert(' Timetable Added Successfully');</script>

<script type="text/javascript">
window.location="view_timetable.php";
</script>
<?php
} else {
     // $_SESSION['error']='Something Went Wrong';
?>
          <script>alert(' This Route  Already Assigned To This Time !');</script>

<!-- <script type="text/javascript">
window.location="view_timetable.php";
</script>
 --><?php
}
}
}
?>

        <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Add Timetable</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add Timetable</li>
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
                                           <input type="text" name="bus_no" class="form-control" value="">
   </div>
                                            </div>
                                        </div>

                                        
 <div class="form-group row control-group after-add-more subdiv">
                    <div class="col">
                      
                            <label>Route: </label>
 <select type="text" name="route[]" class="form-control"  id="class_id" placeholder="Class" required="">
                                                        <option value="">--Select Route--</option>
                                                            <?php  
                                                            $c1 = "SELECT * FROM `route`";
                                                            $result = $conn->query($c1);

                                                            if ($result->num_rows > 0) {
                                                                while ($row = mysqli_fetch_array($result)) {?>
                                                                    <option value="<?php echo $row["id"];?>">
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
                    <div class="col">
                       
                            <label>Time: </label>
                              <input type="time" name="time[]" class="form-control" value="">
                    
                   
                        </div>
                         
               
                    <div class="col">
                                                  <label>Action </label><br>

                                            <button class="btn btn-success add-more" type="button"><i class="fa fa-plus"></i></button>

                      </div>
   </div>
                                        

  <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Status:</label>
                                                <div class="col-sm-9">
                                           <select type="text" name="status" class="form-control" value="">
                                            <option value="Active">Active</option>
                                            <option value="Deactive">Deactive</option>
                                           </select>
   </div>
                                            </div>
                                        </div>

 
                                          
                                        <button type="submit" name="save" class="btn btn-sucess btn-flat m-b-30 m-t-30" id="0">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                                                      </form>

                </div>
                  <div class="copy hide" style="display:none;">
 <div class="form-group row control-group  subdiv">
                    <div class="col">
                      
                            <label>Route: </label>
 <select type="text" name="route[]" class="form-control"  id="class_id" placeholder="Class" required="">
                                                        <option value="">--Select Route--</option>
                                                            <?php  
                                                            $c1 = "SELECT * FROM `route`";
                                                            $result = $conn->query($c1);

                                                            if ($result->num_rows > 0) {
                                                                while ($row = mysqli_fetch_array($result)) {?>
                                                                    <option value="<?php echo $row["id"];?>">
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
                    <div class="col">
                       
                            <label>Time: </label>
                              <input type="time" name="time[]" class="form-control" value="">
                    
                   
                        </div>
                         
               
                    <div class="col">
                                                    <label> </label><br>

                     <button class="btn btn-danger remove" type="button"><i class="fa fa-minus"></i></button>

                      </div>
   </div>
                                        
  
  
 

                      </div>

<?php include('footer.php');?>
<script type="text/javascript">
      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });   
</script>
<script type="text/javascript">
    
</script>
<script type="text/javascript">
  $(".add-more").on('click',function(){ 
          var html = $(".copy").html();
          $(".after-add-more").after(html);
          show_no();
      });  

      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
          //show_no();
      });
function show_no()
{
    var row_cnt=0;
  $( ".sr_no" ).each(function() {
      row_cnt++;
    $( this ).html(row_cnt);
    });
}
</script>

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