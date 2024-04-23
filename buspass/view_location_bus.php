
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');

 ?>


        <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> View Live Location</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">View Live Location</li>
                    </ol>
                </div>
            </div>
            
            <div class="container-fluid">
               
                 <div class="card">
                            <div class="card-body">
                                <div class="table-responsive m-t-40">
                                    <?php 
                                    include 'connect.php';
                                  $sql1 = "SELECT * FROM  `tbl_assign_conductor` order by id desc";
                                   $result1 = $conn->query($sql1);
                                   while($row = $result1->fetch_assoc()) { 
                                    
                                     $no+=1;

                                      ?>
                                           
                                                 <?php
                           $sql2="select * from tbl_conductor where id='".$row['conductor']."'";
                                   $result2 = $conn->query($sql2);

                                    $row1 = $result2->fetch_assoc();

 
                                                  //echo $row1['url']?>
                                                  <iframe src="<?php echo $row1['url']; ?>" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
 <!-- <iframe align="center" width="100%" height="100%" src="<?php echo $row1['url']; ?>"  
  frameborder="yes" scrolling="yes" name="myIframe" id="myIframe"> </iframe>
  -->
                                               
                                                                                                             </td>
                                           
                                          <?php } ?>
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