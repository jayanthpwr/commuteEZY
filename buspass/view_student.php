
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');

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
      <a href="del_student.php?id=<?php echo $_GET['id']; ?>" class="button button--success" data-for="js_success-popup">Yes</a>
      <a href="view_student.php" class="button button--error" data-for="js_success-popup">No</a>
    </p>
  </div>
</div>
<?php } ?>


        <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> View User</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">View User</li>
                    </ol>
                </div>
            </div>
            
          <div class="card">
                            <div class="card-body">
                            <a href="add_student.php"><button class="btn btn-primary">Add User</button></a>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
<!--                                               <th>Barcode</th>
 -->                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Gender</th>
                                                <th>Birth Date</th>
                                                <th>Contact No.</th>
                                                <th>photocopy</th>
                                                <th>Bonafide</th>
                                               <th>Address</th>

                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php 
                                    include 'connect.php';
                                    $sql = "SELECT * FROM `tbl_student` order by id desc";
                                     $result = $conn->query($sql);
$i=0;
                                   while($row = $result->fetch_assoc()) { 
                                                          $qrcodetxt =$row['id'];

                                      ?>
                                            <tr>
<!--                                               <td><a href="view_barcode.php?id=<?=$row['id'];?>">View Barcode</a></td>
 -->                                                <td><?php echo $row['sfname']; ?></td>
                                                <td><?php echo $row['slname']; ?></td>
                                                <td><?php echo $row['semail']; ?></td>
                                                <td><?php echo $row['sgender']; ?></td>
                                                <td><?php echo $row['sdob']; ?></td>
                                                <td><?php echo $row['scontact']; ?></td>
                                                <td><img src="uploadImage/student/<?php echo $row['image1']; ?>" width="100" height="100" value="<?php echo $row['image1']; ?>"/></td>
                                                <td><img src="uploadImage/student/<?php echo $row['image2']; ?>" width="100" height="100" value="<?php echo $row['image2']; ?>"/></td>
                                               
                                                <td><?php echo $row['saddress']; ?></td>
                                                
                                                <td>
                                                <a href="edit_student.php?id=<?=$row['id'];?>"><button type="button" class="btn btn-xs btn-primary" ><i class="fa fa-pencil" data-toggle="tooltip" title="Edit"></i></button></a>
                                                <a href="view_student.php?id=<?=$row['id'];?>"><button type="button" class="btn btn-xs btn-danger" ><i class="fa fa-trash" data-toggle="tooltip" title="Delete"></i></button></a>
                                                <a href="viewpassstudenta.php?id=<?=$row['id'];?>"><button type="button" class="btn btn-xs btn-primary" data-toggle="tooltip" title="View Pass"><i class="fa fa-sticky-note-o"></i></button></a>
                                               
                                               
                                                 <a href="viewpayementrecipta.php?id=<?=$row['id'];?>"><button type="button" class="btn btn-xs btn-primary" data-toggle="tooltip" title="Payment Recipt" ><i class="fa fa-inr"></i></button></a>












                                                 <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#modal">QR Code</button>
                                            <div class="modal fade" id="modal" tabindex="-1" role="dialog">
                                        <div class="modal-dialog modal-lg" role="document" id="">
                                            <div class="modal-content">
                                                <form method="POST">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">QR Code</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
<!--                                                         <span aria-hidden="true">&times;</span>
 -->                                                    </button>
                                                </div>
                                    <div class="modal-body">
                                      <center id="img-<?php echo $row['id'];?>">
                                                    <div id='printarea'>

                                      <h1> <img src="qrcode/qr_img.php?d=<?php echo$qrcodetxt; ?>" width="200" height="200" value="<?php echo $row['image1']; ?>"></h1></div>                              </center>
            <a href="#"><button class="btn btn-primary" id='btn' value='Print' onclick='printDiv();'>Print</button></a>
                                    </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default waves-effect " data-dismiss="modal" aria-hidden="true" onclick="CloseModalPopup();">Close</button>
                                                    <!-- <button type="submit" class="btn btn-primary waves-effect waves-light " name="save">Save changes</button>
                                               -->  </div>
                                            </form>
                                         </div>
                                        </div>
                                    </div>

                                               
                                                </td>
                                            </tr>
                                          <?php  $i++;} 
                                          ?>

                                        </tbody>
                                    </table>
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
    <script >function printFunc() {
    var divToPrint = document.getElementById('printarea');
    /*var htmlToPrint = '' +
        '<style type="text/css">' +
        'table th, table td {' +
        'border:1px solid #000;' +
        'padding;0.5em;' +
        '}' +
        '</style>';
    htmlToPrint += divToPrint.outerHTML;*/
    htmlToPrint = divToPrint.outerHTML;
    newWin = window.open("");/*
    newWin.document.write("<h3 align='center'>SRI RAMAKRISHNA COLLEGE OF ARTS AND SCIENCE</h3>");*/
    newWin.document.write(htmlToPrint);
    newWin.print();
    newWin.close();
    }
 function CloseModalPopup() {  

            $("#modal").modal('hide');
location.reload();
    }
</script>
<script type="text/javascript">
            function printSection(el){
                var divToPrint=document.getElementById(el);

  var newWin=window.open('','Print-Window');

  newWin.document.open();

  newWin.document.write('<html><body onload="window.print()"><style>img{ width:100%; }</style>'+divToPrint.innerHTML+'</body></html>');

  newWin.document.close();

  setTimeout(function(){newWin.close();},10);
            }
        </script>
  </script>
   <script type="text/javascript">
  function printDiv()
{

    var divToPrint=document.getElementById('printarea');

 var newWin=window.open('','Print-Window');

 newWin.document.open();

 newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

 newWin.document.close();

 
}
</script>