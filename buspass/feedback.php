
<?php include('head.php');?>
<?php include('header1.php');?>

<?php include('stud_sidebar.php');?>   
<?php
 date_default_timezone_set('Asia/Kolkata');
 $current_date = date('Y-m-d');

 $sql_currency = "select * from manage_website"; 
             $result_currency = $conn->query($sql_currency);
             $row_currency = mysqli_fetch_array($result_currency);
?>    

        <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Give Feedback</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Give Feedback</li>
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
                                    <form class="form-horizontal" method="POST" action="pages/give_feedback.php" name="studentform" enctype="multipart/form-data">

                                   <input type="hidden" name="currnt_date" class="form-control" value="<?php echo $currnt_date;?>">
                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Subject</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="subject" class="form-control"  id="" placeholder="Subject" required="">
                                                        </div>
                                            </div>
                                        </div>
<div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Feedback</label>
                                                <div class="col-sm-9">
                                                    <textarea type="text" name="feedback" class="form-control"  id="" placeholder="Feedback" required="" style="height: 200px;"></textarea>
                                                     </div>
                                            </div>
                                        </div>
                                        

                                        

  
 
                                          
                                        <button type="submit" name="btn_save" class="btn btn-sucess btn-flat m-b-30 m-t-30" id="0">Submit</button>
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