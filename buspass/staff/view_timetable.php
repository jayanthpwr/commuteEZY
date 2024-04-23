
<?php include('head.php');?>
<?php include('header1.php');?>
<?php include('sidebar.php');
session_start();
 if(isset($_GET['id']))
{ ?>
<div class="popup popup--icon -question js_question-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Sure
    </h1>
    <p>Are You Sure To Delete This Record?</p>
    <p>
      <a href="del_timetable.php?id=<?php echo $_GET['id']; ?>" class="button button--success" data-for="js_success-popup">Yes</a>
      <a href="view_timetable.php" class="button button--error" data-for="js_success-popup">No</a>
    </p>
  </div>
</div>
<?php } ?>


        <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> View Timetable</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">View Timetable</li>
                    </ol>
                </div>
            </div>
            
          <div class="card">
              <a href="add_timetable.php"><button class="btn btn-primary">Add Timetable</button></a><br>

                            <div class="card-body">

                                <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Bus No</th>
                                                <th>Route</th>
                                                <th>Time</th>
                                                <th>Status</th>
                                                <th>Action</th>
   </tr>
                                        </thead>
                                        <tbody>
                                           <?php 
                                    include '../connect.php';
                                    date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');

                                    $sql = "SELECT * FROM `tbl_timetable` where user_id='".$_SESSION["id"]."' order by id desc ";
                                     $result = $conn->query($sql);
$i=0;
                                   while($row = $result->fetch_assoc()) { 
                                   $sql1 = "SELECT * FROM `route` where id='".$row['route']."' ";
                                     $result1 = $conn->query($sql1);
                                     $row1 = $result1->fetch_assoc();
                                      ?>
                                            <tr>
                                                <td><?php echo $row['bus_no']; ?></td>
                                                <td><?php echo $row1['start'].'-'.$row1['end'];?></td>
                                                <td><?php
echo date('h:i A', strtotime($row['time']));


                                                  ?></td>
                                                <td><?php echo $row['status']; ?></td>
                                                <td>                                                <a href="edit_timetable.php?id=<?=$row['id'];?>"><button type="button" class="btn btn-xs btn-primary" ><i class="fa fa-pencil"></i></button></a>
                                                <a href="view_timetable.php?id=<?=$row['id'];?>"><button type="button" class="btn btn-xs btn-danger" ><i class="fa fa-trash"></i></button></a>
                                                </td>


                                                                  </td>
                                                </tr>



                                            
                                          <?php  $i++; }
                                          ?>

                                        </tbody>
                                    </table>
                               <br>
                              
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
      <link rel="stylesheet" href="popup_style.css">

<div class="popup" id="scan_qr">
    <div class="popup__background"></div>
    <div class="popup__content" style="height:750px;overflow:overlay;">
      <h3 class="popup__content__title">
        <b>Result</b>
      </h3><hr>
      <p>
        <div id="main">
            <div id="header">
            <div id="mainbody">
            <table class="tsel" border="0" width="50%">
            <tr>
            <td valign="top" align="center" width="50%">
            <table class="tsel" border="0">
            <tr>
            <td><img class="selector" id="webcamimg" src="https://webqr.com/vid.png" onclick="setwebcam()" align="left" style="display:none;"/></td>
            <td><img class="selector" id="qrimg" src="https://webqr.com/cam.png" onclick="setimg()" align="right" style="display:none;"/></td></tr>
            <tr><td colspan="2" align="center">
            <div id="outdiv"></div>
          </td></tr>
            </table>
            </td>
            </tr>
            
            <tr><td colspan="3" align="center">
            <div id="result" style="display:none ;"></div>
            <div id="tmp"></div>
            </td></tr>
            </table>
            
            <!-- webqr_2016 -->
            
            </div>&nbsp;
            
            </div>
            <canvas id="qr-canvas" width="100" height="10px"></canvas>

      </p>
      <p>
        <a href="" class="btn btn-success" data-for="js_success-popup">Close</a>
      </p>
    </div>
  </div>  
            
                        <!-- content ends here -->
                    </div>
                </div>
            </div>
