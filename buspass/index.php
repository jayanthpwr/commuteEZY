<?php include('head.php');?>
<?php include('header.php');?>

<?php include('sidebar.php');?>   
<?php
 date_default_timezone_set('Asia/Kolkata');
 $current_date = date('Y-m-d');
?>    
      
        <div class="page-wrapper">
            
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <?php $sql="select fname from  admin where id = '".$_SESSION["id"]."'";
                                $res = $conn->query($sql);
                                $row=mysqli_fetch_array($res);?> 
                    <h3 class="text-primary">Dear <?php echo "$fname ".""."$lname ";?>, Welcome to Online Bus Management System !</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            
            <div class="container-fluid">
                
        
                      <!-- <div class="row">
               
                  <div class="col-md-4">
                        <div class="card bg-primary1 p-20">
                            <div class="media widget-ten">
                                <div class="media-left meida media-middle">
                                    <span><i class="ti-comment f-s-40"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                <?php $sql="SELECT COUNT(*) FROM `tbl_student`";
                                $res = $conn->query($sql);
                                $row=mysqli_fetch_array($res);?>
                                    <h2 class="color-white"><?php echo $row[0];?></h2>
                                    <p class="m-b-0">Total Student</p>
                                </div>
                            </div>
                        </div>
                    </div>
               
            </div> -->
             <div class="container-fluid">
                <!-- Start Page Content -->
        

                      <div class="row">
                    <div class="col-md-4">
                        <div class="card bg-primary p-20">
                            <div class="media widget-ten">
                                <div class="media-left meida media-middle">
                                    <span><i class="ti-user f-s-40"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                   <?php $sql="SELECT COUNT(*) FROM `tbl_student` where sgender='Male'";
                                $res = $conn->query($sql);
                                while($row=mysqli_fetch_array($res)){?>
                               
                                    <h2 class="color-white"><?php echo $row[0];?></h2>
                                    <?php } ?>
                                    <p class="m-b-0">No. of Male Users
</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-pink p-20">
                            <div class="media widget-ten">
                                <div class="media-left meida media-middle">
                                    <span><i class="ti-face-smile f-s-40"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                              <?php $sql="SELECT COUNT(*) FROM `tbl_student` where sgender='Female'";
                                $res = $conn->query($sql);
                                while($row=mysqli_fetch_array($res)){?>
                               
                                    <h2 class="color-white"><?php echo $row[0];?></h2>
                                     <?php } ?>
                                    <p class="m-b-0">No. of Female Users
</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-danger p-20">
                            <div class="media widget-ten">
                                <div class="media-left meida media-middle">
                                    <span><i class="ti-map-alt f-s-40"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <?php $sql="SELECT COUNT(*) FROM `route`";
                                $res = $conn->query($sql);
                                while($row=mysqli_fetch_array($res)){?>
                              
                                    <h2 class="color-white"><?php echo $row[0];?></h2>
                                     <?php } ?>
                                    <p class="m-b-0">No. of Routes
</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-warning p-20">
                            <div class="media widget-ten">
                                <div class="media-left meida media-middle">
                                    <span><i class="ti-receipt f-s-40"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <?php $sql="SELECT COUNT(*) FROM `tariff`";
                                $res = $conn->query($sql);
                                while($row=mysqli_fetch_array($res)){?>
                              
                                    <h2 class="color-white"><?php echo $row[0];?></h2>
                                     <?php } ?>
                                    <p class="m-b-0">No. of  Tariff
</p>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="col-md-4">
                        <div class="card bg-success p-20">
                            <div class="media widget-ten">
                                <div class="media-left meida media-middle">
                                    <span><i class="ti-share f-s-40"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                  <?php $sql="SELECT COUNT(*) FROM `applypass` where request='0'";
                                $res = $conn->query($sql);
                               while($row=mysqli_fetch_array($res)){?>
                              
                                    <h2 class="color-white"><?php echo $row[0];?></h2>
                                     <?php } ?>
                                    <p class="m-b-0">No. of Pass Request
</p>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="col-md-4">
                        <div class="card bg-primary p-20">
                            <div class="media widget-ten">
                                <div class="media-left meida media-middle">
                                    <span><i class="ti-credit-card f-s-40"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                   <?php $sql="SELECT COUNT(*) FROM `applypass` where request='1'";
                                $res = $conn->query($sql);
                                while($row=mysqli_fetch_array($res)){?>
                              
                                    <h2 class="color-white"><?php echo $row[0];?></h2>
                                     <?php } ?>
                                    <p class="m-b-0">No. of of Approved Passes
</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive m-t-40">
                         <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> Recent Pass Approval Request</h3> </div>
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>SR.No</th>
                                                <th>User Name</th>
                                                <th>Route</th>
                                                <th>StopFromTo</th>
                                                <th>Duration & Fees</th>
                                                <th>Accept</th>
                                                 <th>Decline</th>

                                             </tr>
                                        </thead>
                                        <tbody>
                                    <?php 
                                    include 'connect.php';
                                  $sql1 = "SELECT * FROM  `applypass` where request='0'";
                                   $result1 = $conn->query($sql1);
                                   while($row = $result1->fetch_assoc()) { 
                                    
                                     $no+=1;

                                      ?>
                                            <tr>
                                                  <td><?php echo $no; ?></td>
                                                  <td><?php
                           $sql2="select * from tbl_student where id='".$row['studentid']."'";
                                   $result2 = $conn->query($sql2);

                                    $row1 = $result2->fetch_assoc();

 
                                                  echo $row1['sfname'].$row1['slname']; ?></td>

                                            <td><?php
$sql2="select * from route where id='".$row['route']."'";
                                   $result2 = $conn->query($sql2);

                                    $row1 = $result2->fetch_assoc();



                                                 echo $row1['start'].'-'.$row1['end'];?>
                                                                    </td>
                                                <td><?php
$sql4="select * from tariff where id='".$row['stopfromto']."'";
                                   $result4 = $conn->query($sql4);

                                    $row4 = $result4->fetch_assoc();



                                                 echo $row4['stopfromto']; ?></td>
                                                <td><?php


                                                 echo $row['durationfees']; ?></td>
                                                
                                                
                                              
                                                <td>
                                                <?php 
                                                                           
                                                                              if($row['request']=='0')
                                                                            {
                                                                           
                                                                           ?>
                                                                              <a href="updatestatusp.php?id=<?php echo$row['id'] ;?>">
                                                                       <button class="btn btn-mat waves-effect waves-light btn-success " name="btn_update">Accept Pass</button></a>
                                                                       <?php } ?>


                                                                <?php
                                                               

                                                                 if($row['request']=='1')
                                                                            
                                                                           {
                                                                           ?>
                                                                          
                                                                       <button class=" "  readonly>Approved Pass</button></a>
                                                                


<?php } ?>

</td>



                                                                                                             </td>


                                                                     <td>
          <?php 
                                                                           
                                          if($row['request']=='0')
                                                                            {
                                                                           
                                                                           ?>
                                                  <a href="updatestatusp1.php?id=<?php echo$row['id'] ;?>">
                                                     <button class="btn btn-mat waves-effect waves-light btn-danger  " name="update">Declined Pass</button></a>
                                                                       <?php } ?>


                                         <?php
                                                               

                                if($row['request']=='2')
                                                                          
                                                                           {
                                                                           ?>
                                                                          
                               <button class=" "  readonly>Decline Pass</button>
                                                                


<?php } ?></td>





                                                                                                             </td>
                                           
                                            </tr>
                                          <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                </div>   
                <!-- End PAge Content -->


            </div>
        </div>
            
            <?php include('footer.php');?>