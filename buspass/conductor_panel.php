

<?php include('head.php');?>
<?php include('conductor_header.php');?>

<?php include('conductor_sidebar.php');?>   
<?php
 date_default_timezone_set('Asia/Kolkata');

 $sql_currency = "select * from manage_website"; 
             $result_currency = $conn->query($sql_currency);
             $row_currency = mysqli_fetch_array($result_currency);
?>    
                   <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                   <?php $sql="select fname from  tbl_student where id = '".$_SESSION["id"]."'";
                                $res = $conn->query($sql);
                                $row=mysqli_fetch_array($res);?> 
                    <h3 class="text-primary">Welcome Dear <?php echo "$sfname ".""."$slname ";?>!</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Student Dashboard</li>
                    </ol>
                    
                </div>
            </div>
                                   
             <div class="col-md-5 align-self-center">
                  <?php 
                                    include 'connect.php';
                                        $sql2="select * from applypass where studentid='".$_SESSION['id']."'";
                                   $result = $conn->query($sql2);
 $current_date = date('Y-m-d');

                                    
                                     $row= $result->fetch_assoc(); 
                                 $no+=1;
                                 $sql1 = "SELECT * FROM  `applypass` where request='1'  and  enddate<'".$current_date."' and studentid='".$_SESSION['id']."'";
                                   $result1 = $conn->query($sql1);
                                                                       $row1= $result1->fetch_assoc(); 
                                $startdate=$row['startdate'];
                                $enddate=$row['enddate'];
                                      ?>
                                      <?php

                                            if( $row['request']=='1'){
                                            ?> 
            
<h2>Your Online Pass Status is : <span style="color: red; background-color:yellow;" >Active</span></h2> </div>
<?php 
                                    }
                                      elseif( $row['request']=='0'){
                                            ?> 
            
<h2>Your Online Pass Status is : <span style="color: red; background-color:yellow;" >Applied</span></h2> </div>
<?php 
                                    }
                                    
                                   elseif($row['request']=='1' and $startdate >= $enddate ){

                                   ?> 
            
<h2>Your Online Pass Status is : <span style="color: red; background-color:yellow;" > Expired</span></h2> </div>
<?php 
                                    }
 
                                    
                                    ?>
                                            
            </div>
            <?php include('footer.php');?>