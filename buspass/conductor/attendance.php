
<?php include('head.php');?>
<?php include('header1.php');?>
<?php include('sidebar.php');

 ?>


        <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> Today Scan QR Attendance</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Today Scan QR Attendance</li>
                    </ol>
                </div>
            </div>
            
          <div class="card">
                            <div class="card-body">
                                <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Gender</th>
                                                <th>Birth Date</th>
                                                <th>Contact No.</th>
                                                <th>photo</th>
                                                <th>Created Date & Time</th>
   </tr>
                                        </thead>
                                        <tbody>
                                           <?php 
                                    include '../connect.php';
                                    date_default_timezone_set('Asia/Kolkata');
$current_date = date('Y-m-d');

                                    $sql = "SELECT * FROM `tbl_attendance` where addded_date='".$current_date."' order by id desc ";
                                     $result = $conn->query($sql);
$i=0;
                                   while($row1 = $result->fetch_assoc()) { 
                                    $sql1 = "SELECT * FROM `tbl_student` where id='".$row1['student_id']."' ";
                                     $result1 = $conn->query($sql1);
                                     $row = $result1->fetch_assoc();
                                      ?>
                                            <tr>
                                                <td><?php echo $row['sfname']; ?></td>
                                                <td><?php echo $row['slname']; ?></td>
                                                <td><?php echo $row['semail']; ?></td>
                                                <td><?php echo $row['sgender']; ?></td>
                                                <td><?php echo $row['sdob']; ?></td>
                                                <td><?php echo $row['scontact']; ?></td>
                                                <td><img src="../uploadImage/student/<?php echo $row['image1']; ?>" width="100" height="100" value="<?php echo $row['image1']; ?>"/></td>
                                                <td><?php echo $row1['created_date_time']; ?></td>
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
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
 
  $('#scan').click(function(){
    //alert(1);
    $('#scan_qr').addClass('popup--visible');
    //alert(0);
    setInterval('scan()',1000);
 
  });
  function scan(){
      
    if (($('#result').html() != '- scanning -') && ($('#result').html() != ''))
    {      
        //alert($('#result').html());
      var scan_data=$('#result').html();
      scan_data = scan_data.replace('<b>','');
      scan_data = scan_data.replace('<br>','');
      scan_data = scan_data.replace('</b>','');
      scan_data = scan_data.replace('<br>','');
      scan_data = scan_data.replace('<br>','');
      $('#scan_data').val(scan_data);
      $('#scan_qr').removeClass('popup--visible');
      $('#submit_barcode').submit();
       }
  }
</script>
<script type="text/javascript" src="https://webqr.com/llqrcode.js"></script>
<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
<script type="text/javascript" src="https://webqr.com/webqr.js"></script> 

<script src='https://webqr.com/llqrcode.js'></script>
<script  src="script.js"></script>

<script type="text/javascript">
  setwebcam();
</script>
<style type="text/css">
    
#main{
    margin: 15px auto;
    background:white;
    overflow: auto;
  width: 100%;
}
#header{
    background:white;
    margin-bottom:15px;
}
#mainbody{
    background: white;
    width:100%;
  display:none;
}
#footer{
    background:white;
}
#v{
    width:100%;
    height:480px;
}
#qr-canvas{
    display:none;
}
#qrfile{
    width:1600px;
    height:1200px;
}
#mp1{
    text-align:center;
    font-size:35px;
}
#imghelp{
    position:relative;
    left:0px;
    top:-160px;
    z-index:100;
    font:18px arial,sans-serif;
    background:#f0f0f0;
  margin-left:35px;
  margin-right:35px;
  padding-top:10px;
  padding-bottom:10px;
  border-radius:20px;
}
.selector{
    margin:0;
    padding:0;
    cursor:pointer;
    margin-bottom:-5px;
}
#outdiv
{
    width:100%;
    height:480px;
  border: solid;
  border-width: 3px 3px 3px 3px;
}
#result{
    border: solid;
  border-width: 1px 1px 1px 1px;
  padding:20px;
  width:100%;
  text-align:center;
}

#footer a{
  color: black;
}
.tsel{
    padding:0;
}
</style>