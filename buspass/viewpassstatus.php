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
                    <h3 class="text-primary">View Status Of Pass</h3> </div>
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
                                              
                                                <th>                                                <center><h4>Pass Status </center></h4></th> 
                                            </tr>

                                        </thead>

                                        <tbody>
                                    <?php 
                                    include 'connect.php';
                                        $sql2="select * from applypass where studentid='".$_SESSION['id']."'";
                                   $result = $conn->query($sql2);

                                    
                                     while($row= $result->fetch_assoc()) { 
                                
                                 $no+=1;
                                      ?>
                                            <tr>
                                                <td> <?php

                                            if( $row['request']=='1'){
                                            ?> 

                                                <div style="background-color: green">
                                                                             <center>      <h2  style="color:  #FFFFFF;

">Your Pass is Approved by Admin and it is Activated.</h2></center>
                                               </div>
                                                 <?php 
                                    }?>
                                            
<?php
                                            if($row['request']=='2'){
                                            ?>
                                          <div style="background-color: red">
                                          
                                                 <center><h2  style="color:  #FFFFFF;

">Sorry Your Bus Pass is Declined by Admin. Kindly, COntact our Office.</h2></center></div><?php 
                                    }?>
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