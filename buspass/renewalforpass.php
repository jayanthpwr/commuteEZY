<?php include('head.php');?>
<?php include('header1.php');?>

<?php include('stud_sidebar.php');?> 
<?php if(isset($_GET['id']))
{ ?>
<div class="popup popup--icon -question js_question-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Sure
    </h1>
    <p>Are You Sure To Delete This Record?</p>
    <p>
      <a href="del_pass.php?id=<?php echo $_GET['id']; ?>" class="button button--success" data-for="js_success-popup">Yes</a>
      <a href="view_pass.php" class="button button--error" data-for="js_success-popup">No</a>
    </p>
  </div>
</div>
<?php } ?>

<?php
 date_default_timezone_set('Asia/Kolkata');
 $current_date = date('Y-m-d');
 include('connect.php');

 $sql_currency = "select * from manage_website"; 
             $result_currency = $conn->query($sql_currency);
             $row_currency = mysqli_fetch_array($result_currency);
?> 

      
        <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Renewal For Pass</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
             
            <div class="container-fluid">                    
               <div class="card">
               <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>SR.No</th>
                                                <th>User Name</th>
                                                <th>Pass Id</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>                                                <th>Request For Renewal </th>
                                           
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php 
                                    include 'connect.php';
                                    $current_date = date('Y-m-d');

                                    
                                        $sql2="select * from applypass where studentid='".$_SESSION['id']."' and enddate<'".$current_date."' and request='1'";
                                   $result = $conn->query($sql2);

                                    
                                     while($row= $result->fetch_assoc()) { 
                                
                                 $no+=1;
                                $row['studentid'];
                                      ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php
                           $sql2="select * from tbl_student where id='".$row['studentid']."'";
                                   $result2 = $conn->query($sql2);

                                    $row1 = $result2->fetch_assoc();

 
                                                  echo $row1['sfname'].$row1['slname']; ?></td>

                                            <td>
                                              <h4>Pass ID</h4><?php

                                             echo $row['id'];
?>                                                                    </td>
                                                <td><?php


                                                 echo $row['startdate']; ?></td>
                                                <td><?php


                                                 echo $row['enddate']; ?></td>
                                                
                                                 <td>
                                              
                                                                           
                                                                              
                                                                              <a href="updatestatusp2.php?id=<?php echo$row['id'] ;?>">
                                                                       <button class="btn btn-mat waves-effect waves-light btn-primary " name="btn_update">Request For Renewal</button></a>
                                                                       

                                                </td>
                                              
                                                 
                                                </tr>
                                          <?php } ?>
                                        </tbody>
                                    </table>
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