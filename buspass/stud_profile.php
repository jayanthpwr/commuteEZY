<?php include('head.php');?>
<?php include('header1.php');?>

<?php include('stud_sidebar.php');?>   

 <?php
 include('connect.php');
if(isset($_POST["btn_update"]))
{
  extract($_POST);

  $target_dir = "uploadImage/Profile/";
  $image1 = basename($_FILES["image"]["name"]);
  if($_FILES["image"]["tmp_name"]!=''){
    $image = $target_dir . basename($_FILES["image"]["name"]);
   if (move_uploaded_file($_FILES["image"]["tmp_name"], $image)) {
    
       @unlink("uploadImage/Profile/".$_POST['old_image']);
    
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
  
  }
  else {
     $image1 =$_POST['old_image'];
  }
  
   //$q1="UPDATE `admin` SET `fname`='$fname',`lname`='$lname',`email`='$email',`contact`='$contact',`dob`='$dob',`gender`='$gender',`image`='$image1' where id = '".$_SESSION["id"]."'";
  
  $q1="UPDATE `tbl_student` SET `stud_id`='$stud_id',`regno`='$regno',`sfname`='$sfname',`slname`='$slname',`semail`='$semail',`sgender`='$sgender',`sdob`='$sdob',`scontact`='$scontact',`saddress`='$saddress',`session`='$session',`image`='$image1' where id='".$_SESSION['id']."'";

    if ($conn->query($q1) === TRUE) {
   
      $_SESSION['success']='Record Successfully Updated';
      ?>
      <script type="text/javascript">
        window.location = "stud_profile.php";
      </script>
      <?php

} else {
   
      $_SESSION['error']='Something Went Wrong';
}


  ?>
  <script>
 
  </script>
  <?php
}

?>

<?php
$que="select * from  tbl_student where id = '".$_SESSION["id"]."'";

//SELECT `id`, `stud_id`, `regno`, `sfname`, `slname`, `classname`, `semail`, `password`, `sgender`, `sdob`, `scontact`, `saddress`, `session` FROM `tbl_student` where id = '".$_SESSION["id"]."'";
$query=$conn->query($que);
while($row=mysqli_fetch_array($query))
{
 
  extract($row);
   $stud_id = $row['stud_id'];
   $regno = $row['regno'];
   $sfname = $row['sfname'];
   $slname = $row['slname'];
   $classname = $row['classname'];
   $semail = $row['semail'];
   $password = $row['password'];
   $sgender = $row['sgender'];
   $sdob = $row['sdob'];
   $scontact = $row['scontact'];
  $saddress = $row['saddress'];
    $session = $row['session'];
 
}


?> 
   

        <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> Profile</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>
           
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-lg-8" style="margin-left: 10%;">
                        <div class="card">
                            <div class="card-title">
                               
                            </div>
                            <div class="card-body">
                                <div class="input-states">
                                    <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                                                                                    <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Bonafide No</label>
                                                <div class="col-sm-9">
                                                  <input type="text" value="<?php echo $regno;?>" name="regno" class="form-control" placeholder=" Reg No" id="event" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">First Name</label>
                                                <div class="col-sm-9">
                                                  <input type="text" value="<?php echo $sfname;?>" name="sfname" class="form-control" placeholder="First Name" id="event" onkeydown="return alphaOnly(event);" required="">
                                                </div>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Last Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text"  value="<?php echo $slname;?>" name="slname" id="lname" class="form-control" id="event" onkeydown="return alphaOnly(event);" placeholder="Last Name" required="">
                                                </div>
                                            </div>
                                        </div>
                                          

                                     
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="text" value="<?php echo $semail;?>" name="semail" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  placeholder="Email" required>
                                                </div>
                                            </div>
                                        </div>
                                      
                                  

                                       
                                          <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Gender</label>
                                                <div class="col-sm-9">
                                                   <input type="text" value="<?php echo $sgender;?>" name="sgender" id="gender" class="form-control" required="">
                                                
                                                   
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                              <div class="row">
                                                <label class="col-sm-3 control-label">Date Of Birth</label>
                                                <div class="col-sm-9">
                                                  <input type="date" value="<?php echo $sdob;?>" name="sdob" class="form-control" placeholder="Birth Date">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Parents Contact</label>
                                                <div class="col-sm-9">
                                                    <input type="text" value="<?php echo $scontact;?>" name="scontact" class="form-control" placeholder="Parents Contact Number" id="tbNumbers" minlength="10" maxlength="10" onkeypress="javascript:return isNumber(event)" required="">
                                                </div>
                                            </div>
                                        </div>

                                       
                                         <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Session</label>
                                                <div class="col-sm-9">
                                                  <input type="text" value="<?php echo $session;?>" name="session"  class="form-control" placeholder="session" id="event" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label">Image</label>
                                                <div class="col-sm-9">
                                  <image class="profile-img" src="uploadImage/Profile/<?=$image?>" style="height:100px;width:auto;">
                  <input type="hidden" value="<?=$image?>" name="old_image">
                          <input type="file" class="form-control" name="image">
                                                </div>
                                            </div>
                                        </div>


                                        <button type="submit" name="btn_update" class="btn btn-primary btn-flat m-b-30 m-t-30">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>

<?php include('footer.php');?>

<link rel="stylesheet" href="popup_style.css">
<?php if(!empty($_SESSION['success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Success 
    </h1>
    <p><?php echo $_SESSION['success']; ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["success"]);  
} ?>
<?php if(!empty($_SESSION['error'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error 
    </h1>
    <p><?php echo $_SESSION['error']; ?></p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["error"]);  } ?>
    <script>
      var addButtonTrigger = function addButtonTrigger(el) {
  el.addEventListener('click', function () {
    var popupEl = document.querySelector('.' + el.dataset.for);
    popupEl.classList.toggle('popup--visible');
  });
};

Array.from(document.querySelectorAll('button[data-for]')).
forEach(addButtonTrigger);
    </script>