

<?php 

//echo "string";
include('head.php');?>
<?php include('header1.php');?>

<?php include('sidebar.php');?>   
<?php
 date_default_timezone_set('Asia/Kolkata');

 $sql_currency = "select * from manage_website"; 
             $result_currency = $conn->query($sql_currency);
             $row_currency = mysqli_fetch_array($result_currency);
?>    
                   <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                   <?php $sql="select * from  tbl_conductor where id = '".$_SESSION["id"]."'";
                                $res = $conn->query($sql);
                                $row=mysqli_fetch_array($res);?> 
                    <h3 class="text-primary">Welcome <?php echo "$fname ".""."$lname ";?>!</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Conductor Dashboard</li>
                    </ol>
                    
                </div>
            </div>
                                   
             <div class="col-md-5 align-self-center">
                                            
            </div>
            <?php include('footer.php');?>